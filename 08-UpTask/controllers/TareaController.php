<?php

namespace Controllers;

use Model\Proyecto;

class TareaController
{
    
    public static function index(){

    }

    public static function crear(){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            if(!isset($_SESSION)) {
                session_start();
            }

            $proyecto = Proyecto::where('url', $_POST['proyectoid']);

            if(!$proyecto || $proyecto->propietarioid !== $_SESSION['id']) {
                $respuesta = [
                    'tipo' => 'error',
                    'mensaje' => 'Hubo un error al agregar la tarea'
                ];
            }else{
                $respuesta = [
                    'tipo' => 'exito',
                    'mensaje' => 'Tarea agregada correctamente'
                ];
            }

            echo json_encode($respuesta);
        }
        
    }

    public static function actualizar(){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){}
        
    }

    public static function eliminar(){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){}
        
    }

}