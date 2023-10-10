<?php

session_start();

$_SESSION = [];

session_destroy();

header('Location: /05-BienesRaices/');