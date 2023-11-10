<?php

namespace Model;

class Registro extends ActiveRecord {
    
    protected static $tabla = 'registros';
    protected static $columnasDB = ['id', 'paquete_id', 'pago_id', 'token', 'user_id'];

    public $id;
    public $paquete_id;
    public $pago_id;
    public $token;
    public $user_id;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->paquete_id = $args['paquete_id'] ?? '';
        $this->pago_id = $args['pago_id'] ?? '';
        $this->token = $args['token'] ?? '';
        $this->user_id = $args['user_id'] ?? '';
    }

}