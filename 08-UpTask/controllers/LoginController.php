<?php

namespace Controllers;

use Classes\Email;
use Model\Usuario;
use MVC\Router;

class LoginController{

    public static function login(Router $router){

        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $usuario= new Usuario($_POST);
            $alertas = $usuario->validarLogin();

            if(empty($alertas)){
                $usuario = Usuario::where('email', $usuario->email);

                if(!$usuario || !$usuario->confirmado){
                    Usuario::setAlerta('error', 'El usuario no existe o no ha sido confirmado');
                }else{

                    if( password_verify($_POST['password'], $usuario->password)){

                        session_start();
                        $_SESSION['id'] = $usuario->id;
                        $_SESSION['nombre'] = $usuario->nombre;
                        $_SESSION['email'] = $usuario->email;
                        $_SESSION['login'] = true;
                        
                        
                        header('Location: /dashboard');

                    }else{
                        Usuario::setAlerta('error', 'Password Incorrecto');
                    }

                }
            }
        }

        $alertas = Usuario::getAlertas();

        $router->render('auth/login', [
            'titulo' => 'Iniciar Sesión',
            'alertas' => $alertas
        ]);
    }

    public static function logout(){
        if(!isset($_SESSION)) {
            session_start();
        }
        $_SESSION = [];
        header('Location: /');
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

        $token = s($_GET['token']);
        $alertas = [];
        $mostrar = true;

        if(!$token){
            header('Location: /');
        }

        $usuario = Usuario::where('token', $token);

        if(empty($usuario)){
            Usuario::setAlerta('error', 'Token No Válido');
            $mostrar = false;
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $usuario->sincronizar($_POST);

            $alertas = $usuario->validarPassword();

            if(empty($alertas)){
                
                $usuario->hashPassword();
                unset($usuario->password2);
                $usuario->token = '';

                $resultado = $usuario->guardar();

                if($resultado){
                    header('Location: /');
                }

            }
            
        }

        $alertas = Usuario::getAlertas();

        $router->render('auth/reestablecer', [
            'titulo' => 'Reestablece tu Password',
            'alertas' => $alertas,
            'mostrar' => $mostrar
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