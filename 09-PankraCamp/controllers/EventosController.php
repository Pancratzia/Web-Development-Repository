<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Categoria;
use Model\Dia;
use Model\Evento;
use Model\Hora;
use Model\Ponente;
use MVC\Router;

class EventosController
{


    public static function index(Router $router)
    {

        if (!is_admin()) {
            header('Location: /login');
            return;
        }

        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);


        if (!$pagina_actual || $pagina_actual < 1) {
            header('Location: /admin/eventos?page=1');
            return;
        }

        $registros_por_pagina = 15;

        $total_registros = Evento::total();

        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total_registros);

        if($paginacion->total_paginas() == 0){
            
        } else if ($paginacion->total_paginas() < $pagina_actual) {
            header('Location: /admin/eventos?page=1');
            return;
        }

        $eventos = Evento::paginar($registros_por_pagina, $paginacion->offset());

        foreach ($eventos as $evento) {
            $evento->categoria = Categoria::find($evento->categoria_id);
            $evento->dia = Dia::find($evento->dia_id);
            $evento->hora = Hora::find($evento->hora_id);
            $evento->ponente = Ponente::find($evento->ponente_id);
        }

        $router->render('admin/eventos/index', [
            'titulo' => 'Conferencias y Workshops',
            'eventos' => $eventos,
            'paginacion' => $paginacion->paginacion()
        ]);
    }

    public static function crear(Router $router)
    {

        if (!is_admin()) {
            header('Location: /login');
            return;
        }

        $alertas = [];
        $evento = new Evento;
        $categorias = Categoria::all("ASC");
        $dias = Dia::all("ASC");
        $horas = Hora::all("ASC");

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (!is_admin()) {
                header('Location: /login');
                return;
            }

            $evento->sincronizar($_POST);
            $alertas = $evento->validar();

            if (empty($alertas)) {
                $resultado = $evento->guardar();
                if ($resultado) {
                    header('Location: /admin/eventos');
                    return;
                }
            }
        }

        $router->render('admin/eventos/crear', [
            'titulo' => 'Crear Conferencia / Workshop',
            'alertas' => $alertas,
            'categorias' => $categorias,
            'dias' => $dias,
            'horas' => $horas,
            'evento' => $evento
        ]);
    }

    public static function editar(Router $router)
    {
        if (!is_admin()) {
            header('Location: /login');
            return;
        }

        $alertas = [];

        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if (!$id) {
            header('Location: /admin/eventos');
            return;
        }
        $categorias = Categoria::all("ASC");
        $dias = Dia::all("ASC");
        $horas = Hora::all("ASC");
        $evento = Evento::find($id);

        if (empty($evento)) {
            header('Location: /admin/eventos');
            return;
        }


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (!is_admin()) {
                header('Location: /login');
                return;
            }

            $evento->sincronizar($_POST);
            $alertas = $evento->validar();

            if (empty($alertas)) {
                $resultado = $evento->guardar();
                if ($resultado) {
                    header('Location: /admin/eventos');
                    return;
                }
            }
        }

        $router->render('admin/eventos/editar', [
            'titulo' => 'Editar Conferencia / Workshop',
            'alertas' => $alertas,
            'categorias' => $categorias,
            'dias' => $dias,
            'horas' => $horas,
            'evento' => $evento
        ]);
    }

    public static function eliminar()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (!is_admin()) {
                header('Location: /login');
                return;
            }

            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            $evento = Evento::find($id);

            if (!isset($evento)) {
                header('Location: /admin/eventos');
                return;
            }

            $resultado = $evento->eliminar();

            if ($resultado) {
                header('Location: /admin/eventos');
                return;
            }
        }
    }
}
