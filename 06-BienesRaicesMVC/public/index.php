<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\PropiedadController;
use Controllers\VendedorController;
use Controllers\PaginasCrontroller;

$router = new Router();

$router->get('/admin', [PropiedadController::class, 'index']);
$router->get('/propiedades/crear', [PropiedadController::class, 'crear']);
$router->post('/propiedades/crear', [PropiedadController::class, 'crear']);
$router->get('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/propiedades/eliminar', [PropiedadController::class, 'eliminar']);

$router->get('/vendedores/crear', [VendedorController::class, 'crear']);
$router->post('/vendedores/crear', [VendedorController::class, 'crear']);
$router->get('/vendedores/actualizar', [VendedorController::class, 'actualizar']);
$router->post('/vendedores/actualizar', [VendedorController::class, 'actualizar']);
$router->post('/vendedores/eliminar', [VendedorController::class, 'eliminar']);


//PUBLICO

$router->get("/", [PaginasCrontroller::class, 'index']);
$router->get("/nosotros", [PaginasCrontroller::class, 'nosotros']);
$router->get("/propiedades", [PaginasCrontroller::class, 'propiedades']);
$router->get("/propiedad", [PaginasCrontroller::class, 'propiedad']);
$router->get("/blog", [PaginasCrontroller::class, 'vendedores']);
$router->get("/entrada", [PaginasCrontroller::class, 'entrada']);
$router->get("/contacto", [PaginasCrontroller::class, 'contacto']);
$router->post("/contacto", [PaginasCrontroller::class, 'contacto']);


$router->comprobarRutas();