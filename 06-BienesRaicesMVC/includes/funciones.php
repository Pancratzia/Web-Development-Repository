<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');

function incluirTemplate(string $nombre, bool $inicio = false)
{
    include TEMPLATES_URL . "/$nombre.php";
}

function estaAutenticado()
{
    session_start();

    if (!$_SESSION['login']) {
        header('Location: /');
    }
}

function debuggear($variable)
{
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

function s($html)
{
    $s = htmlspecialchars($html);
    return $s;
}

function validarTipoContenido($tipo)
{
    $tipos = ['vendedor', 'propiedad'];

    return in_array($tipo, $tipos);
}

function mostrarNotificacion($codigo)
{

    switch ($codigo) {
        case 1:
            $mensaje = 'Registro Creado Correctamente';
            break;
        case 2:
            $mensaje = 'Registro Actualizado Correctamente';
            break;
        case 3:
            $mensaje = 'Registro Eliminado Correctamente';
            break;
        default:
            $mensaje = false;
    }

    return $mensaje;
}

function validarORedireccionar(string $url)
{
    $id = $_GET['id'] ?? null;
    $id = filter_var($id, FILTER_VALIDATE_INT);
    
    if (!$id) {
        header('Location: ' . $url);
        exit;
    }

    return $id;
}
