<?php

namespace Controllers;

use Model\Categoria;
use Model\Dia;
use Model\Evento;
use Model\Hora;
use MVC\Router;

class EventosController {
    

    public static function index(Router $router){

        if(!is_admin()){
            header('Location: /login');
        }

        $router->render('admin/eventos/index', [
            'titulo' => 'Conferencias y Workshops'
        ]);
    }

    public static function crear(Router $router){
        
        if(!is_admin()){
            header('Location: /login');
        }

        $alertas = [];
        $evento = new Evento;
        $categorias = Categoria::all("ASC");
        $dias = Dia::all("ASC");
        $horas = Hora::all("ASC");

        $router->render('admin/eventos/crear', [
            'titulo' => 'Crear Conferencia / Workshop',
            'alertas' => $alertas,
            'categorias' => $categorias,
            'dias' => $dias,
            'horas' => $horas,
            'evento' => $evento
        ]);
    }


}