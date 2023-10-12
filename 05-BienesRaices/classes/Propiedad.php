<?php

namespace App;

class Propiedad extends ActiveRecord
{
    protected static $tabla = 'propiedades';
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'vendedorId'];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedorId;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedorId = $args['vendedorId'] ?? '';
    }

    public function validar()
    {
        if (!$this->titulo) {
            self::$errores[] = "Debes añadir un Titulo";
        }

        if (!$this->precio || !is_numeric($this->precio) || $this->precio <= 0) {
            self::$errores[] = "Debes añadir un Precio Válido";
        }

        if (!$this->descripcion || strlen($this->descripcion) < 50) {
            self::$errores[] = "Debes añadir una Descripción Válida (mínimo 50 caracteres)";
        }

        if (!$this->imagen) {
            self::$errores[] = "Debes añadir una Imagen";
        }

        if (!$this->habitaciones || !is_numeric($this->habitaciones) || $this->habitaciones <= 0) {
            self::$errores[] = "Debes añadir una cantidad de Habitaciones Válida";
        }

        if (!$this->wc || !is_numeric($this->wc) || $this->wc <= 0) {
            self::$errores[] = "Debes añadir una cantidad de Baños Válida";
        }

        if ($this->estacionamiento === '') {
            self::$errores[] = "Debes añadir una cantidad de Estacionamiento Válida";
        } elseif (!is_numeric($this->estacionamiento) || $this->estacionamiento < 0) {
            self::$errores[] = "Debes ingresar un valor numérico no negativo para el Estacionamiento";
        }

        if (!$this->vendedorId || !is_numeric($this->vendedorId) || $this->vendedorId === '') {
            self::$errores[] = "Debes seleccionar un Vendedor";
        }

        return self::$errores;
    }
}
