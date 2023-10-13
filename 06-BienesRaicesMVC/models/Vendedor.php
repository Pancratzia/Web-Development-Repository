<?php

namespace App;

class Vendedor extends ActiveRecord{

    protected static $tabla = 'vendedores';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono'];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;


    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
    }

    public function validar()
    {
        if (!$this->nombre) {
            self::$errores[] = "Debes añadir un nombre a tu vendedor(a)";
        }

        if (!$this->apellido) {
            self::$errores[] = "Debes añadir un apellido a tu vendedor(a)";
        }

        if (!$this->telefono) {
            self::$errores[] = "Debes añadir un telefono a tu vendedor(a)";
        }

        if(!preg_match('/[0-9]{10}/', $this->telefono)){
            self::$errores[] = "Formato no Válido";
        }

        return self::$errores;
    }
}