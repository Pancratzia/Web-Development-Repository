<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;

class PaginasCrontroller{


    public static function index(Router $router){
       $propiedades = Propiedad::get(3);
       $inicio = true;
       
        $router->render('paginas/index',[
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }

    public static function nosotros(){
        echo 'Nosotros';
    }

    public static function propiedades(){
        echo 'Propiedades';
    }

    public static function propiedad(){
        echo 'Propiedad';
    }

    public static function blog(){
        echo 'Blog';
    }

    public static function entrada(){
        echo 'Entrada';
    }

    public static function contacto(){
        echo 'Contacto';
    }
}