<?php

namespace Controllers;

use Model\Proyecto;
use Model\Tarea;

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
                echo json_encode($respuesta);
                return;
            }

            
            $tarea = new Tarea($_POST);
            $tarea->proyectoid = $proyecto->id;
            $resultado = $tarea->guardar();

            $respuesta = [
                'tipo' => 'exito',
                'id' => $resultado['id'],
                'mensaje' => 'Tarea creada correctamente',
            ];
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