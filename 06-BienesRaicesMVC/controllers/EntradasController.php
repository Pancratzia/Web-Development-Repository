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
      $vendedores = Vendedor::all();

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {

         $entrada = new Entrada($_POST['entrada']);

         $extension = pathinfo($_FILES['entrada']['name']['imagen'], PATHINFO_EXTENSION);

         $nombreImagen = md5(uniqid(rand(), true)) . '.' . $extension;

         if ($_FILES['entrada']['tmp_name']['imagen']) {
             $image = Image::make($_FILES['entrada']['tmp_name']['imagen'])->fit(800, 600);
             $entrada->setImagen($nombreImagen);
         }       
         $errores = $entrada->validar();

         if (empty($errores)) {

             if (!is_dir(CARPETA_IMAGENES)) {
                 mkdir(CARPETA_IMAGENES);
             }

             $image->save(CARPETA_IMAGENES . $nombreImagen);

             $entrada->guardar();
         }
     }

      $router->render("entradas/crear", [
        "errores" => $errores,
        "entrada" => $entrada,
        "vendedores" => $vendedores
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
