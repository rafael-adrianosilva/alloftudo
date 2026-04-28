<?php

$host = 'localhost';
$usuario = 'root';
$password = '';
$db = 'estudo';
$port = 3306;

$conn = mysqli_connect($host, $usuario, $password, $db, $port);

if (!$conn) {
    die('Erro ao conectar com o banco de dados: ' . mysqli_connect_error());
}

mysqli_set_charset($conn, 'utf8mb4');