<?php
// Configuración de conexión a la BD
$dbHost = '127.0.0.1';
$dbName = 'gestion_eventos';
$dbUser = 'root';
$dbPass = ''; // XAMPP por defecto

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
} catch (PDOException $e) {
    die('Error de conexión: ' . $e->getMessage());
}
