<?php

function contectarDB() : mysqli {
    $db = mysqli_connect('localhost', 'root', '', 'bienesraices_crud');

    if(!$db){
        echo "Error: No se pudo conectar a MySQL.";
        exit;
    }

    return $db;
}