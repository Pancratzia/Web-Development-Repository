<?php

namespace App;

class Propiedad{
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
        $this->imagen = $args['imagen'] ?? 'imagen.jpg';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedorId = $args['vendedorId'] ?? '';
    }

    public static function setDB($database){
        self::$db = $database;
    }

    public function guardar(){

        $atributos = $this->sanitizarAtributos();

        $string = join(', ', array_keys($atributos));

        $query = "INSERT INTO propiedades ($string) VALUES ('".join("', '", array_values($atributos))."')";

        $resultado = self::$db->query($query);

        debuggear($resultado);

    }

    public function atributos(){
        $atributos = [];

        foreach(self::$columnasDB as $columna){
            if($columna === 'id'){
                continue;
            }
            $atributos[$columna] = $this->$columna;
        }

        return $atributos;
    }

    public function sanitizarAtributos(){
        $atributos = $this->atributos();
        $sanitizado = [];

        foreach($atributos as $key => $value){
            $sanitizado[$key] = self::$db->escape_string($value);
        }

        return $sanitizado;
    }

    public static function getErrores(){
        return self::$errores;
    }

    public function validar(){
        if (!$this->titulo) {
            self::$errores[] = "Debes añadir un Titulo";
        }
    
        if (!$this->precio || !is_numeric($this->precio) || $this->precio <= 0) {
            self::$errores[] = "Debes añadir un Precio Válido";
        }
    
        if (!$this->descripcion || strlen($this->descripcion) < 50) {
            self::$errores[] = "Debes añadir una Descripción Válida (mínimo 50 caracteres)";
        }
    
        $medida = 1000 * 1000;
    
        if (!$this->imagen['name'] || $this->imagen['error']) {
            self::$errores[] = "Debes subir una imagen";
        }
    
        if (!$this->imagen['type'] === 'image/jpeg' && !$this->imagen['type'] === 'image/png') {
            self::$errores[] = "La imagen debe ser JPG o PNG";
        }
    
        if ($this->imagen['size'] > $medida) {
            self::$errores[] = "La imagen es muy pesada";
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
            echo "Debes seleccionar un vendedor";
        }

        return self::$errores;
    }

   
}