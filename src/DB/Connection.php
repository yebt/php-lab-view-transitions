<?php

declare(strict_types=1);

namespace App\DB;

use PDO;
use PDOException;

class Connection
{
    private static ?PDO $instance = null;

    private function __construct()
    {
        // Evitamos la instanciación directa
    }

    /**
     * Devuelve la instancia única de PDO.
     *
     * @return PDO
     */
    public static function getInstance(): PDO
    {
        if (self::$instance === null) {
            self::initialize();
        }

        return self::$instance;
    }

    /**
     * Inicializa la conexión a la base de datos.
     *
     * @return void
     * @throws PDOException
     */
    private static function initialize(): void
    {
        $config = require __DIR__ . '/../../config/db.php';

        if (!isset($config['dsn'], $config['username'], $config['password'])) {
            throw new PDOException("Database configuration is incomplete.");
        }

        self::$instance = new PDO(
            $config['dsn'],
            $config['username'],
            $config['password'],
            $config['options'] ?? [],
        );

        // Configurar atributos adicionales, como errores y emulación de preparaciones
        self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    private function __clone()
    {
        // Evitamos la clonación
    }

    private function __wakeup()
    {
        // Evitamos la deserialización
    }
}
