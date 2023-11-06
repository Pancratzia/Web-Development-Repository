<?php

namespace Controllers;

use Model\Ponente;
use MVC\Router;

class PonentesController {
    

    public static function index(Router $router){


        $router->render('admin/ponentes/index', [
            'titulo' => 'Nuestros Ponentes / Conferencistas'
        ]);
    }

    public static function crear(Router $router){
        
        $alertas = [];
        $ponente = new Ponente;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $ponente->sincronizar($_POST);
            $alertas = $ponente->validar();
        }

        $router->render('admin/ponentes/crear', [
            'titulo' => 'Registrar Ponente / Conferencista',
            'alertas' => $alertas,
            'ponente' => $ponente
        ]);
    }
}