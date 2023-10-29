<?php

namespace Controllers;

use MVC\Router;

class LoginController{

    public static function login(Router $router){
        echo "Desde login";

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

        }

        $router->render('auth/login', [

        ]);
    }

    public static function logout(){
        echo "Desde logout";
    }

    public static function crear(Router $router){
        echo "Desde crear";

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
        }

        $router->render('auth/crear', [

        ]);
    }

    public static function olvide(Router $router){
        echo "Desde olvide";

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
        }

        $router->render('auth/olvide', []);
    }

    public static function reestablecer(Router $router){
        echo "Desde reestablecer";

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
        }

        $router->render('auth/reestablecer', []);
    }

    public static function mensaje(Router $router){
        echo "Desde mensaje";

        $router->render('auth/mensaje', []);
    }

    public static function confirmar(Router $router){
        echo "Desde confirmar";

        $router->render('auth/confirmar', []);
    }

}