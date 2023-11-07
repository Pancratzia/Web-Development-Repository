<?php

namespace Controllers;

use Model\Categoria;
use Model\Evento;
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
        $categorias = Categoria::all();
        $router->render('admin/eventos/crear', [
            'titulo' => 'Crear Conferencia / Workshop',
            'alertas' => $alertas,
            'categorias' => $categorias,
            'evento' => $evento
        ]);
    }


}