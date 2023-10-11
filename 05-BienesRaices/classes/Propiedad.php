<?php

namespace App;

class Propiedad
{
    protected static $db;

    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'vendedorId'];

    protected static $errores = [];

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
        $this->vendedorId = $args['vendedorId'] ?? '1';
    }

    public static function setDB($database)
    {
        self::$db = $database;
    }

    public function guardar()
    {

        $atributos = $this->sanitizarAtributos();

        $string = join(', ', array_keys($atributos));

        $query = "INSERT INTO propiedades ($string) VALUES ('" . join("', '", array_values($atributos)) . "')";

        $resultado = self::$db->query($query);

        return $resultado;
    }

    public function atributos()
    {
        $atributos = [];

        foreach (self::$columnasDB as $columna) {
            if ($columna === 'id') {
                continue;
            }
            $atributos[$columna] = $this->$columna;
        }

        return $atributos;
    }

    public function sanitizarAtributos()
    {
        $atributos = $this->atributos();
        $sanitizado = [];

        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }

        return $sanitizado;
    }

    public function setImagen($imagen)
    {
        if ($imagen) {
            $this->imagen = $imagen;
        }
    }

    public static function getErrores()
    {
        return self::$errores;
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

        if(!$this->imagen){
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

    public static function all(){
        $query = "SELECT * FROM propiedades";

        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    public static function consultarSQL($query){
        $resultado = self::$db->query($query);

        $array = [];

        while($registro = $resultado->fetch_assoc()){
            $array[] = self::crearObjeto($registro);
        }

        $resultado ->free();

        return $array;
    }

    protected static function crearObjeto($registro){
        $objeto = new self;

        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto ->$key = $value;
            }
        }

        return $objeto;
    }
}
