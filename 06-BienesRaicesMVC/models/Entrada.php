<?php

namespace Model;

class Entrada extends ActiveRecord
{
    protected static $tabla = 'entradas';
    protected static $columnasDB = ['id', 'titulo', 'fecha', 'vendedorId', 'subtitulo', 'contenido', 'imagen'];

    public $id;
    public $titulo;
    public $fecha;
    public $vendedorId;
    public $subtitulo;
    public $contenido;
    public $imagen;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->fecha = $args['fecha'] ?? date('Y-m-d');
        $this->vendedorId = $args['vendedorId'] ?? '';
        $this->subtitulo = $args['subtitulo'] ?? '';
        $this->contenido = $args['contenido'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
    }

    public function validar()
    {
        if (!$this->titulo) {
            self::$errores[] = "Debes añadir un Titulo";
        }

        if (!$this->subtitulo && $this->subtitulo === '' || strlen($this->subtitulo) > 45) {
            self::$errores[] = "Debes añadir un Subtitulo de Máximo 45 Caracteres";
        }

        if (!$this->contenido || strlen($this->contenido) < 50) {
            self::$errores[] = "Debes añadir un Contenido de Mínimo 50 Caracteres";
        }

        if (!$this->imagen) {
            self::$errores[] = "Debes añadir una Imagen";
        }

        if (!$this->vendedorId || !is_numeric($this->vendedorId) || $this->vendedorId === '') {
            self::$errores[] = "Debes seleccionar un Autor Válido";
        }

        return self::$errores;
    }
}
