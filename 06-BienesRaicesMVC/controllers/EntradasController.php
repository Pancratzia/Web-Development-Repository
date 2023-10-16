<?php

namespace Controllers;

use MVC\Router;
use Model\Entrada;
use Model\Vendedor;
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
        $id = validarORedireccionar('/admin');

        $entrada = Entrada::find($id);
        $vendedores = Vendedor::all();

        $errores = Entrada::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $args = $_POST['entrada'];

            $entrada->sincronizar($args);

            $errores = $entrada->validar();

            $extension = pathinfo($_FILES['entrada']['name']['imagen'], PATHINFO_EXTENSION);
            $nombreImagen = md5(uniqid(rand(), true)) . '.' . $extension;

            if ($_FILES['entrada']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['entrada']['tmp_name']['imagen'])->fit(800, 600);
                $entrada->setImagen($nombreImagen);
            }

            if (empty($errores)) {

                if ($_FILES['entrada']['tmp_name']['imagen']) {
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }

                $entrada->guardar();
            }
        }

        $router->render('entradas/actualizar', [
            'entrada' => $entrada,
            'errores' => $errores,
            'vendedores' => $vendedores
        ]);
    }

    public static function eliminar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if ($id) {

                $tipo = $_POST['tipo'];


                if (validarTipoContenido($tipo)) {
                    $entrada = Entrada::find($id);
                    $entrada->eliminar();
                }
            } else {
                header('Location: ../admin');
            }
        }
    }
}
