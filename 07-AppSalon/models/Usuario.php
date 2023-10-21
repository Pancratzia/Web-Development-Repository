<?php

namespace Model;

class Usuario extends ActiveRecord
{
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'email', 'password', 'telefono', 'admin', 'confirmado', 'token'];


    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $password;
    public $telefono;
    public $admin;
    public $confirmado;
    public $token;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->admin = $args['admin'] ?? '0';
        $this->confirmado = $args['confirmado'] ?? '0';
        $this->token = $args['token'] ?? '';
    }

    public function validarNuevaCuenta(){
        if($this->nombre === ''){
            self::$alertas['error'][] = 'El nombre es obligatorio';
        }
        if($this->apellido === ''){
            self::$alertas['error'][] = 'El apellido es obligatorio';
        }
        if($this->telefono === ''){
            self::$alertas['error'][] = 'El teléfono es obligatorio';
        }
        if($this->email === ''){
            self::$alertas['error'][] = 'El email es obligatorio';
        }
        if($this->password === ''){
            self::$alertas['error'][] = 'El password es obligatorio';
        }
        if(strlen($this->password) < 6){
            self::$alertas['error'][] = 'El password debe contener al menos 6 carácteres';
        }

        return self::$alertas;
    }
}
