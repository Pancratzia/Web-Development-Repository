<?php

namespace Controllers;

use Model\Entrada;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;

class PaginasCrontroller{


    public static function index(Router $router){
       $propiedades = Propiedad::get(3);
       $inicio = true;

        $router->render('paginas/index',[
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }

    public static function nosotros(Router $router){
       
        $router->render('paginas/nosotros');
    }

    public static function propiedades(Router $router){
        
        $propiedades = Propiedad::all();
        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades
        ]);
    }

    public static function propiedad( Router $router ){
       
        $id = validarORedireccionar('/propiedades');
        $propiedad = Propiedad::find($id);
        $vendedor = Vendedor::find($propiedad->vendedorId);
        


        $router->render('paginas/propiedad', [
            'propiedad' => $propiedad,
            'vendedor' => $vendedor
        ]);
    }

    public static function blog(Router $router){
        
        $entradas = Entrada::all();
        $vendedores = Vendedor::all();

        $router->render('paginas/blog', [
            'entradas' => $entradas,
            'vendedores' => $vendedores
        ]);
    }

    public static function entrada(Router $router){

        $id = validarORedireccionar('/blog');
        $entrada = Entrada::find($id);
        $vendedor = Vendedor::find($entrada->vendedorId);
        
        $router->render('paginas/entrada', [
            'entrada' => $entrada,
            'vendedor' => $vendedor
        ]);
        
    }

    public static function contacto(){
        echo 'Contacto';
    }
}