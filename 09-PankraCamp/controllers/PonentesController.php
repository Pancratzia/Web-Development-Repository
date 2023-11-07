<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Ponente;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;

class PonentesController
{


    public static function index(Router $router)
    {

        if(!is_admin()){
            header('Location: /login');
        }

        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

        if(!$pagina_actual || $pagina_actual < 1){
            header('Location: /admin/ponentes?page=1');
        }

        $registros_por_pagina = 5;

        $total_registros = Ponente::total();

        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total_registros);

        $ponentes = Ponente::all();

        $router->render('admin/ponentes/index', [
            'titulo' => 'Nuestros Ponentes / Conferencistas',
            'ponentes' => $ponentes,
            'paginacion' => $paginacion->paginacion()
        ]);
    }

    public static function crear(Router $router)
    {
        if(!is_admin()){
            header('Location: /login');
        }
        $alertas = [];
        $ponente = new Ponente;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin()){
                header('Location: /login');
            }

            if (!empty($_FILES['imagen']['tmp_name'])) {
                $carpeta_imagenes = '../public/img/speakers';
                if (!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0755, true);
                }

                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('png', 80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('webp', 80);
                $imagen_avif = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('avif', 80);

                $nombre_imagen = md5(uniqid(rand(), true));

                $_POST['imagen'] = $nombre_imagen;
            }

            $_POST['redes'] = json_encode($_POST['redes'], JSON_UNESCAPED_SLASHES);

            $ponente->sincronizar($_POST);

            $alertas = $ponente->validar();

            if (empty($alertas)) {
                $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . '.png');
                $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . '.webp');
                $imagen_avif->save($carpeta_imagenes . '/' . $nombre_imagen . '.avif');

                $resultado = $ponente->guardar();

                if ($resultado) {
                    header('Location: /admin/ponentes');
                }
            }
        }

        $router->render('admin/ponentes/crear', [
            'titulo' => 'Registrar Ponente / Conferencista',
            'alertas' => $alertas,
            'ponente' => $ponente,
            'redes' => json_decode($ponente->redes)
        ]);
    }

    public static function editar(Router $router)
    {
        if(!is_admin()){
            header('Location: /login');
        }

        $alertas = [];

        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if (!$id) {
            header('Location: /admin/ponentes');
        }

        $ponente = Ponente::find($id);

        if (empty($ponente)) {
            header('Location: /admin/ponentes');
        }

        $ponente->imagen_actual = $ponente->imagen;

        $redes = json_decode($ponente->redes);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if(!is_admin()){
                header('Location: /login');
            }

            if (!empty($_FILES['imagen']['tmp_name'])) {

                $carpeta_imagenes = '../public/img/speakers';
                if (!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0755, true);
                }

                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('png', 80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('webp', 80);
                $imagen_avif = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 800)->encode('avif', 80);

                $nombre_imagen = md5(uniqid(rand(), true));

                $_POST['imagen'] = $nombre_imagen;
            } else {
                $_POST['imagen'] = $ponente->imagen_actual;
            }

            $_POST['redes'] = json_encode($_POST['redes'], JSON_UNESCAPED_SLASHES);
            $ponente->sincronizar($_POST);
            $alertas = $ponente->validar();

            if (empty($alertas)) {

                if (isset($nombre_imagen)) {
                    $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . '.png');
                    $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . '.webp');
                    $imagen_avif->save($carpeta_imagenes . '/' . $nombre_imagen . '.avif');
                }

                $resultado = $ponente->guardar();

                if($resultado) {
                    header('Location: /admin/ponentes');
                }
            }
        }

        $router->render('admin/ponentes/editar', [
            'titulo' => 'Actualizar Ponente / Conferencista',
            'alertas' => $alertas,
            'ponente' => $ponente,
            'redes' => $redes
        ]);
    }

    public static function eliminar(){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            if(!is_admin()){
                header('Location: /login');
            }
            
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            $ponente = Ponente::find($id);

            if(!isset($ponente)){
                header('Location: /admin/ponentes');
            }

            $resultado = $ponente->eliminar();

            if($resultado){
                header('Location: /admin/ponentes');
            }
            
        }
    }
}
