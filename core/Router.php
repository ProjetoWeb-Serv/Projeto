<?php
// core/Router.php

class Router {
    public function dispatch() {
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $path = trim($path, '/');

        $parts = explode('/', $path);

        $controllerName = $parts[0] ?? 'auth';
        $actionName = $parts[1] ?? 'login';

        $controllerFile = APP_PATH . "/Controllers/{$controllerName}.php";

        if(file_exists($controllerFile)) {
            require_once $controllerFile;
        } else {
            echo "Página não encontrada: $controllerFile";
            exit;
        }

        // chama a função que existe no controller
        if(function_exists($actionName)) {
            $actionName();
        } else {
            echo "Função não encontrada: $actionName";
            exit;
        }
    }
}
