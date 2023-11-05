<?php

namespace Controllers;

use MVC\Router;

class PonentesController {
    

    public static function index(Router $router){


        $router->render('admin/ponentes/index', [
            'titulo' => 'Nuestros Ponentes / Conferencistas'
        ]);
    }

    public static function crear(Router $router){
        
        $alertas = [];

        $router->render('admin/ponentes/crear', [
            'titulo' => 'Registrar Ponente / Conferencista',
            'alertas' => $alertas
        ]);
    }
}