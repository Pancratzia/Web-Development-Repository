<?php

namespace Controllers;

use Model\Registro;
use Model\Usuario;
use MVC\Router;

class DashboardController {
    

    public static function index(Router $router){
        if(!is_admin()){
            header('Location: /login');
            return;
        }

        $registros = Registro::get(5);

        foreach($registros as $registro){
            $registro->usuario = Usuario::find($registro->usuario_id);
        }

        $virtuales = Registro::total('paquete_id', 2);
        $presenciales = Registro::total('paquete_id', 1);

        $ingresos = ($virtuales * 47) + ($presenciales * 94.30);

        $router->render('admin/dashboard/index', [
            'titulo' => 'Panel de Administrador',
            'registros' => $registros,
            'ingresos' => $ingresos
        ]);
    }
}