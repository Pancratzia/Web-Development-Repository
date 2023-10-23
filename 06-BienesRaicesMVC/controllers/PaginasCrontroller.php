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

        $mensaje = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $respuestas = $_POST['contacto'];

            $dotenv = Dotenv::createMutable(__DIR__ . '/../');
            $dotenv->load();

            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Port = 465;
            $mail->Username = $_ENV['USERNAME'];
            $mail->Password = $_ENV['PASSWORD'];
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress($_ENV['EMAIL'], 'BienesRaices.com');
            $mail->Subject = 'Tienes un nuevo mensaje';

            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            $contenido = '<html>';
            $contenido .= '<p>Tienes un nuevo mensaje</p>';
            $contenido .= '<p>Nombre: ' . $respuestas['nombre'] . '</p>';

            if ($respuestas['contacto'] === 'telefono') {
                $contenido .= '<p>Eligió ser contactado vía Telefono</p>';
                $contenido .= '<p>Telefono: ' . $respuestas['telefono'] . '</p>';
                $contenido .= '<p>Fecha para el contacto: ' . $respuestas['fecha'] . '</p>';
                $contenido .= '<p>Hora para el contacto: ' . $respuestas['hora'] . '</p>';
            } else {
                $contenido .= '<p>Eligió ser contactado vía Email</p>';
                $contenido .= '<p>Email: ' . $respuestas['email'] . '</p>';
            }

            $contenido .= '<p>Mensaje: ' . $respuestas['mensaje'] . '</p>';
            $contenido .= '<p>Vende o Compra: ' . $respuestas['tipo'] . '</p>';
            $contenido .= '<p>Precio: ' . $respuestas['presupuesto'] . '$</p>';
            $contenido .= '</html>';

            $mail->Body = $contenido;
            $mail->AltBody = $respuestas['mensaje'];

            if ($mail->send()) {
                $mensaje = "Mensaje enviado correctamente";
            } else {
                $mensaje = "Hubo un error al enviar el mensaje";
            }
        }

        $router->render('paginas/contacto', [
            'mensaje' => $mensaje
        ]);
    }
}
