<?php

namespace Controllers;

use Classes\Email;
use Model\Usuario;
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

        $usuario = new Usuario;
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $usuario = new Usuario($_POST);
            $alertas = $usuario->validarNuevaCuenta();

            if(empty($alertas)){

                $existeUsuario = Usuario::where('email', $usuario->email);

                if($existeUsuario){
                    Usuario::setAlerta('error', 'El Usuario ya esta registrado');
                    $alertas = $usuario->getAlertas();
                }else{

                    $usuario->hashPassword();
                    unset($usuario->password2);
                    $usuario->crearToken();

                    $resultado = $usuario->guardar();

                    $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
                    $email->enviarConfirmacion();

                    if($resultado){
                        header('Location: /mensaje');
                    }

                }

            }
            
        }

        $router->render('auth/crear', [
            'titulo' => 'Crea tu Cuenta en UpTask',
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }

    public static function olvide(Router $router){
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $usuario = new Usuario($_POST);

            $alertas = $usuario->validarEmail();

            if(empty($alertas)){

                $usuario = Usuario::where('email', $usuario->email);

                if($usuario && $usuario->confirmado){

                    $usuario->crearToken();
                    unset($usuario->password2);
                    $usuario->guardar();

                    $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
                    $email->enviarInstrucciones();

                    Usuario::setAlerta('exito', 'Hemos enviado instrucciones a tu email');

                }else{
                    Usuario::setAlerta('error', 'El Usuario no existe o no está confirmado');
                }


            }
        
        }

        $alertas = Usuario::getAlertas();

        $router->render('auth/olvide', [
            'titulo' => 'Reestablece tu Password',
            'alertas' => $alertas
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

        $token = s($_GET['token']);
        $alertas = [];

        if(!$token){
            header('Location: /');
        }

        $usuario = Usuario::where('token', $token);

        if(empty($usuario)){
            Usuario::setAlerta('error', 'Token No Válido');
        }else{
            $usuario->confirmado = 1;
            $usuario->token = '';
            unset($usuario->password2);
            $usuario->guardar();

            Usuario::setAlerta('exito', '¡Tu cuenta ha sido confirmada!');
        }

        $alertas = Usuario::getAlertas();

        $router->render('auth/confirmar', [
            'titulo' => 'Confirmación de tu Cuenta en UpTask',
            'alertas' => $alertas
        ]);
    }

}