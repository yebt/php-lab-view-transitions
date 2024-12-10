<?php

return [
    'dsn' => 'sqlite:' . __DIR__ . '/../database/app.db', // Ejemplo para SQLite
    'username' => '', // No es necesario para SQLite
    'password' => '', // No es necesario para SQLite
    'options' => [
        PDO::ATTR_PERSISTENT => true, // Conexiones persistentes
        PDO::ATTR_EMULATE_PREPARES => false, // Uso de declaraciones preparadas reales
    ],
];
