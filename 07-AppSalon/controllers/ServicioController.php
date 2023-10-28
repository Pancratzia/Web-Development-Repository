<?php

namespace Controllers;

use MVC\Router;

class ServicioController{

    public static function index(Router $router){
        
        
        $router->render('servicios/index', [
            
        ]);
    }

    public static function crear(Router $router){
        echo "Desde Crear Servicios";

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
        }
    }

    public static function actualizar(Router $router){
        echo "Desde Actualizar Servicios";

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
        }
    }

    public static function eliminar(Router $router){
        echo "Desde Eliminar Servicios";

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
        }
    }

}