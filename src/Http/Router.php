<?php
declare(strict_types=1);

namespace App\Http;


class Router {
    private $routes = [];
    private $errorFiles = [];

    /**
    * Add a route to the routers list
    * @param string $path
    * @param string $file
    */
    public function add($path, $file) {
        $this->routes[trim($path, '/')] = $file;
    }

    /**
    * Add specific error file for each error code
    * @param int $code
    * @param string $file
    */
    public function addError($code, $file) {
        $this->errorFiles[$code] = $file;
    }

    /**
    * Dispatch the router
    * @return void
    */
    public function dispatch() {
        $requestUri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

        if (array_key_exists($requestUri, $this->routes)) {
            $file = $this->routes[$requestUri];

            if (file_exists($file)) {
                require $file;
                return;
            } else {
                http_response_code(500);
                echo "Error: El archivo asociado no existe.";
                return;
            }
        }

        // Manejo de rutas no encontradas
        http_response_code(404);
        echo "Error 404: Ruta no encontrada.";
    }
}
