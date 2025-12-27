<?php
// Conexión a la base de datos
require_once __DIR__ . '/config/database.php';

try {
    // Inserta un usuario de prueba
    $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->execute(['admin', '12345']);

    echo "Usuario de prueba creado: admin / 12345";
} catch (PDOException $e) {
    echo "Error al crear usuario: " . $e->getMessage();
}
