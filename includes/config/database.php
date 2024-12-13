<?php

function conectarDB(): mysqli
{
    $db = mysqli_connect('localhost', 'root', '', 'bienesRaices_crud');

    if (!$db) {
        echo 'No se puso conectar';
        exit;
    }

    return $db;
}
