<?php

namespace Controllers;

use Model\Registro;
use Model\Usuario;
use Model\Paquete;
use MVC\Router;

class RegistroController
{


    public static function crear(Router $router)
    {

        if (!is_auth()) {
            header('Location: /');
        }

        $registro = Registro::where('usuario_id', $_SESSION['id']);

        if (isset($registro) && $registro->paquete_id === "3") {
            header('Location: /boleto?id=' . urlencode($registro->token));
        }

        $router->render('registro/crear', [
            'titulo' => 'Finaliza tu Registro en PankraCamp',
        ]);
    }

    public static function gratis()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (!is_auth()) {
                header('Location: /login');
            }

            if (isset($registro) && $registro->paquete_id === "3") {
                header('Location: /boleto?id=' . urlencode($registro->token));
            }

            $token = substr(md5(uniqid(rand(), true)), 0, 8);

            $datos = array(
                'paquete_id' => 3,
                'pago_id' => '',
                'token' => $token,
                'usuario_id' => $_SESSION['id']
            );

            $registro = new Registro($datos);
            $resultado = $registro->guardar();

            if ($resultado) {
                header('Location: /boleto?id=' . urlencode($registro->token));
            }
        }
    }

    public static function pagar()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (!is_auth()) {
                header('Location: /login');
            }

            if (empty($_POST)) {
                echo json_encode([]);
                return;
            }

            $datos = $_POST;
            $datos['token'] = substr(md5(uniqid(rand(), true)), 0, 8);
            $datos['usuario_id'] = $_SESSION['id'];


            try {
                $registro = new Registro($datos);
                $resultado = $registro->guardar();
                echo json_encode([
                    'resultado' => $resultado,
                ]);
            } catch (\Throwable $th) {
                echo json_encode([
                    'resultado' => 'error',
                ]);
            }
        }
    }

    public static function boleto(Router $router)
    {

        $id = $_GET['id'];

        if (!$id || strlen($id) !== 8) {
            header('Location: /404');
            return;
        }

        $registro = Registro::where('token', $id);

        if (!$registro) {
            header('Location: /');
            return;
        }

        $registro->usuario = Usuario::find($registro->usuario_id);
        $registro->paquete = Paquete::find($registro->paquete_id);

        $router->render('registro/boleto', [
            'titulo' => 'Asistencia a PankraCamp',
            'registro' => $registro
        ]);
    }
}
