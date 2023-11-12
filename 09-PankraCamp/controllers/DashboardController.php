<?php

namespace Controllers;

use MVC\Router;

class DashboardController {
    

    public static function index(Router $router){
        if(!is_admin()){
            header('Location: /login');
            return;
        }

        $router->render('admin/dashboard/index', [
            'titulo' => 'Admin Dashboard'
        ]);
    }
}