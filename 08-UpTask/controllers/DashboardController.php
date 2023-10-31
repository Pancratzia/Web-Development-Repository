<?php

namespace Controllers;

use Model\Proyecto;
use MVC\Router;

class DashboardController
{

    public static function index(Router $router)
    {

        if (!isset($_SESSION)) {
            session_start();
        }

        isAuth();

        $router->render('dashboard/index', [
            'titulo' => 'Proyectos',
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

        $router->render('dashboard/perfil', [
            'titulo' => 'Perfil',
        ]);
    }
}
