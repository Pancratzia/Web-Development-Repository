<?php

namespace Controllers;

use Model\Entrada;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use PHPMailer\PHPMailer\PHPMailer;
use Dotenv\Dotenv;


class PaginasCrontroller
{


    public static function index(Router $router)
    {
        $propiedades = Propiedad::get(3);
        $entradas = Entrada::get(2);
        $vendedores = Vendedor::all();
        $inicio = true;

        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio,
            'entradas' => $entradas,
            'vendedores' => $vendedores
        ]);
    }

    public static function nosotros(Router $router)
    {

        $router->render('paginas/nosotros');
    }

    public static function propiedades(Router $router)
    {

        $propiedades = Propiedad::all();
        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades
        ]);
    }

    public static function propiedad(Router $router)
    {

        $id = validarORedireccionar('/propiedades');
        $propiedad = Propiedad::find($id);
        $vendedor = Vendedor::find($propiedad->vendedorId);



        $router->render('paginas/propiedad', [
            'propiedad' => $propiedad,
            'vendedor' => $vendedor
        ]);
    }

    public static function blog(Router $router)
    {

        $entradas = Entrada::all();
        $vendedores = Vendedor::all();

        $router->render('paginas/blog', [
            'entradas' => $entradas,
            'vendedores' => $vendedores
        ]);
    }

    public static function entrada(Router $router)
    {

        $id = validarORedireccionar('/blog');
        $entrada = Entrada::find($id);
        $vendedor = Vendedor::find($entrada->vendedorId);

        $router->render('paginas/entrada', [
            'entrada' => $entrada,
            'vendedor' => $vendedor
        ]);
    }

    public static function contacto(Router $router)
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $respuestas = $_POST['contacto'];

            $dotenv = Dotenv::createMutable(__DIR__ . '/../');
            $dotenv->load();

            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Port = 2525;
            $mail->Username = $_ENV['USERNAME'];
            $mail->Password = $_ENV['PASSWORD'];
            $mail->SMTPSecure = 'tls';

            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');
            $mail->Subject = 'Tienes un nuevo mensaje';

            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            $contenido = '<html>';
            $contenido .= '<p>Tienes un nuevo mensaje</p>';
            $contenido .= '<p>Nombre: ' . $respuestas['nombre'] . '</p>';
            $contenido .= '<p>Email: ' . $respuestas['email'] . '</p>';
            $contenido .= '<p>Telefono: ' . $respuestas['telefono'] . '</p>';
            $contenido .= '<p>Mensaje: ' . $respuestas['mensaje'] . '</p>';
            $contenido .= '<p>Vende o Compra: ' . $respuestas['tipo'] . '</p>';
            $contenido .= '<p>Precio: ' . $respuestas['presupuesto'] . '$</p>';
            $contenido .= '<p>Prefiere ser contactado vía: ' . $respuestas['contacto'] . '</p>';
            $contenido .= '<p>Fecha para el contacto: ' . $respuestas['fecha'] . '</p>';
            $contenido .= '<p>Hora para el contacto: ' . $respuestas['hora'] . '</p>';
            $contenido .= '</html>';

            $mail->Body = $contenido;
            $mail->AltBody = 'Tienes un nuevo mensaje sin HTML';

            if ($mail->send()) {
                echo 'El mensaje se envio correctamente';
            } else {
                echo 'El mensaje no se envio';
            }
        }

        $router->render('paginas/contacto', []);
    }
}
