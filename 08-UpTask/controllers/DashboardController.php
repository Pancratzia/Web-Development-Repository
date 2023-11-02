<?php

namespace Controllers;

use Model\Proyecto;
use Model\Usuario;
use MVC\Router;

class DashboardController
{

    public static function index(Router $router)
    {

        if (!isset($_SESSION)) {
            session_start();
        }

        isAuth();

        $id = $_SESSION['id'];

        $proyectos = Proyecto::belongsTo('propietarioid', $id);

        $router->render('dashboard/index', [
            'titulo' => 'Proyectos',
            'proyectos' => $proyectos
        ]);
    }

    public static function proyecto(Router $router)
    {

        if (!isset($_SESSION)) {
            session_start();
        }

        isAuth();

        $token = $_GET['url'];

        if (!$token) {
            header('Location: /dashboard');
        }

        $proyecto = Proyecto::where('url', $token);
        if($proyecto->propietarioid !== $_SESSION['id']) {
            header('Location: /dashboard');
        }


        $router->render('dashboard/proyecto', [
            'titulo' => $proyecto->proyecto,
        ]);
    }

    public static function crear_proyecto(Router $router)
    {

        if (!isset($_SESSION)) {
            session_start();
        }

        isAuth();
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $proyecto = new Proyecto($_POST);
            $alertas = $proyecto->validarProyecto();

            if (empty($alertas)) {

                $proyecto->url = md5(uniqid());
                $proyecto->propietarioid = $_SESSION['id'];

                $proyecto->guardar();

                header('Location: /proyecto?url=' . $proyecto->url);
            }
        }

        $router->render('dashboard/crear-proyecto', [
            'titulo' => 'Crear Proyecto',
            'alertas' => $alertas
        ]);
    }

    public static function perfil(Router $router)
    {

        if (!isset($_SESSION)) {
            session_start();
        }

        isAuth();
        $alertas = [];
        $usuario = Usuario::find($_SESSION['id']);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validar_perfil();

            if (empty($alertas)) {
                $usuario->guardar();

                Usuario::setAlerta('exito', 'Guardado Correctamente');

                $alertas = Usuario::getAlertas();

                $_SESSION['nombre'] = $usuario->nombre;

            }
        }

        $router->render('dashboard/perfil', [
            'titulo' => 'Perfil',
            'alertas' => $alertas,
            'usuario' => $usuario
        ]);
    }
}
