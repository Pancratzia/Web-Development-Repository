<?php

namespace Controllers;

use Model\Categoria;
use Model\Dia;
use Model\Evento;
use Model\Hora;
use Model\Ponente;
use MVC\Router;

class PaginasController{


    public static function index(Router $router){

        $router->render('paginas/index',[
            'titulo' => 'Inicio'
        ]);
    
    }

    public static function evento (Router $router){
        

        $router ->render('paginas/pankracamp',[
            'titulo' => 'Sobre PankraCamp'
        ]);
    }

    public static function conferencias (Router $router){

        $eventos = Evento::ordenar('hora_id', 'ASC');
        $eventosFormateados = [];
        
        foreach ($eventos as $evento) {

            $evento->categoria = Categoria::find($evento->categoria_id);
            $evento->dia = Dia::find($evento->dia_id);
            $evento->hora = Hora::find($evento->hora_id);
            $evento->ponente = Ponente::find($evento->ponente_id);
            
            if($evento->dia_id === '1' && $evento->categoria_id === '1'){
                $eventosFormateados['conferencias_1'][] = $evento;
            }

            if($evento->dia_id === '2' && $evento->categoria_id === '1'){
                $eventosFormateados['conferencias_2'][] = $evento;
            }

            if($evento->dia_id === '1' && $evento->categoria_id === '2'){
                $eventosFormateados['workshops_1'][] = $evento;
            }

            if($evento->dia_id === '2' && $evento->categoria_id === '2'){
                $eventosFormateados['workshops_2'][] = $evento;
            }

        }

        $router ->render('paginas/conferencias',[
            'titulo' => 'Conferencias & Workshops',
            'eventos' => $eventosFormateados
        ]);
    }

    public static function paquetes (Router $router){
        
        $router ->render('paginas/paquetes',[
            'titulo' => 'Paquetes PankraCamp'
        ]);
    }


}