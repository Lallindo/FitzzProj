<?php
// Funcionamento já verificado
$host = 'localhost';
$bd = 'fitzz_db';
$user = 'root';
$password = 'Fatec@123';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$bd;charset=$charset";

// $options = [
//     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//     PDO::ATTR_EMULATE_PREPARES => false
// ];

try {
    $pdo = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int) $e->getCode());
}

?>