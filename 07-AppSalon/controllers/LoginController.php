<?php

namespace Controllers;

use Classes\Email;
use Model\Usuario;
use MVC\Router;

class LoginController {
    
    public static function login(Router $router) {
        
        $router->render('auth/login', [
            
        ]);
    }

    public static function logout() {
        echo "Desde Logout";
    }

    public static function olvide(Router $router) {
        $router->render('auth/olvide-password', [
            
        ]);
    }

    public static function recuperar() {
        echo "Desde Recuperar";
    }

    public static function crear(Router $router) {

        $usuario = new Usuario();

        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevaCuenta();

            if(empty($alertas)) {

                $resultado = $usuario->existeUsuario();

                if($resultado->num_rows) {
                    $alertas = Usuario::getAlertas();
                } else {

                    $usuario->hashPassword();

                    $usuario->crearToken();

                    $email = new Email( $usuario->email, $usuario->nombre, $usuario->token);

                    $email->enviarConfirmacion();

                    $resultado = $usuario->guardar();

                    if($resultado) {
                        header('Location: /mensaje');
                    }

                }
                
            }

        }

        $router->render('auth/crear-cuenta', [
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }

    public static function confirmarCuenta(Router $router) {
        echo "Desde Confirmar Cuenta";
    }

    public static function mensaje(Router $router) {
        $router->render('auth/mensaje', [
            
        ]);
    }

}

