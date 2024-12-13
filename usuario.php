<?php

// Importar conexion
require 'includes/app.php';
$db = conectarDB();

// Crear Email y password
$email = 'correo@gmail.com';
$password = '123456';

// Hash al password
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

// Query para crear el usuario
$query = "INSERT INTO usuarios (email, password) VALUES ( '$email', '$passwordHash');";

// Agregarlos a la base de datos
mysqli_query($db, $query);
