<?php

namespace Controllers;

use MVC\Router;
use Model\Entrada;
use Model\Vendedor;
use Model\Propiedad;
use Intervention\Image\ImageManagerStatic as Image;

class EntradasController
{

    public static function crear(Router $router)
    {

      $errores = Entrada::getErrores();
      $entrada = new Entrada;
      $autores = Vendedor::all();
      $router->render("entradas/crear", [
        "errores" => $errores,
        "entrada" => $entrada,
        "autores" => $autores
      ]);
    }

    public static function actualizar(Router $router)
    {
       echo "<h1>Actualizar Entrada</h1>";
    }

    public static function eliminar()
    {
       echo "<h1>Eliminar Entrada</h1>";
    }
}
