<?php

declare(strict_types=1);

use App\DB\Connection;

require_once __DIR__ . "/../vendor/autoload.php";

try {
    // Obtén la instancia de PDO desde la clase Connection
    $db = Connection::getInstance();

    // Cargar el archivo db.sql
    $sqlFilePath = __DIR__ . "/../database/base.sql";
    if (!file_exists($sqlFilePath)) {
        throw new RuntimeException(
            "El archivo db.sql no se encuentra en la ruta esperada: {$sqlFilePath}"
        );
    }

    $sql = file_get_contents($sqlFilePath);
    if ($sql === false) {
        throw new RuntimeException("No se pudo leer el archivo db.sql.");
    }

    // Ejecutar las instrucciones SQL
    $db->exec($sql);

    echo "Base de datos inicializada correctamente.\n";
} catch (Exception $e) {
    echo "Error al inicializar la base de datos: " . $e->getMessage() . "\n";
    exit(1);
}
