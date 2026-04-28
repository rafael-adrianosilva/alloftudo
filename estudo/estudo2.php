<?php

$user = 'root';
$host = 'localhost';
$db = 'sistema';
$pass = '';
$port = 3306;

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$db", $user, $pass);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo ("Conexão Feita!");
} catch (PDOException $e) {
    echo ("Erro na conexão: " . $e->getMessage());
}

?>