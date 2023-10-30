<?php

namespace Controllers;

use MVC\Router;

class LoginController{

    public static function login(Router $router){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

        }

        $router->render('auth/login', [
            'titulo' => 'Iniciar Sesión'
        ]);
    }

    public static function logout(){
        echo "Desde logout";
    }

    public static function crear(Router $router){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
        }

        $router->render('auth/crear', [
            'titulo' => 'Crea tu Cuenta en UpTask'
        ]);
    }

    public static function olvide(Router $router){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
        
        }

        $router->render('auth/olvide', [
            'titulo' => 'Reestablece tu Password'
        ]);
    }

    public static function reestablecer(Router $router){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
        }

        $router->render('auth/reestablecer', [
            'titulo' => 'Reestablece tu Password'
        ]);
    }

    public static function mensaje(Router $router){

        $router->render('auth/mensaje', [
            'titulo' => 'Mensaje de Confirmación'
        ]);
    }

    public static function confirmar(Router $router){

        $router->render('auth/confirmar', [
            'titulo' => 'Cuenta Confirmada'
        ]);
    }

}