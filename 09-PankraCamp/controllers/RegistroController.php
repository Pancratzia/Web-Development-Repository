<?php

namespace Controllers;

use MVC\Router;

class RegistroController {
    

    public static function crear(Router $router){


        $router->render('registro/crear', [
            'titulo' => 'Finaliza tu Registro en PankraCamp',
        ]);
    }

    public static function gratis(){

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_auth()){
                header('Location: /login');
            }

            $token = substr(md5(uniqid(rand(), true)), 0, 8);
        }

    }

}