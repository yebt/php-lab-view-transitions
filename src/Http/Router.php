<?php

declare(strict_types=1);

namespace App\Http;

class Router
{
    private $routes = [];
    private $errorFiles = [];

    /**
     * Add a route to the routers list
     * @param string $path
     * @param string $file
     */
    public function add($path, $file)
    {
        // Convert parameter to regular expressions
        $path = trim($path, "/");
        $path = preg_replace("/\//", "\/", $path);
        $regexPath = preg_replace(
            "/\{([a-zA-Z_][a-zA-Z0-9_]*)\}/",
            '(?P<$1>[^\\/]+)',
            trim($path, "/")
        );
        $this->routes["/^" . $regexPath . "$/"] = $file;
    }

    /**
     * Add specific error file for each error code
     * @param int $code
     * @param string $file
     */
    public function addError($code, $file)
    {
        $this->errorFiles[$code] = $file;
    }

    /**
     * Dispatch the router
     * @return file
     */
    public function dispatch()
    {
        $requestUri = trim(
            parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH),
            "/"
        );
        foreach ($this->routes as $routePattern => $file) {
            if (preg_match($routePattern, $requestUri, $matches)) {
                if (file_exists($file)) {
                    // Extract and capture vars and make them available
                    $params = array_filter(
                        $matches,
                        "is_string",
                        ARRAY_FILTER_USE_KEY
                    );
                    extract($params);

                    require $file;
                    return;
                } else {
                    http_response_code(500);
                    echo "Error: El archivo asociado no existe.";
                    return;
                }
            }
        }

        // Manejo de rutas no encontradas
        http_response_code(404);
        echo "Error 404: Ruta no encontrada.";
    }
}
