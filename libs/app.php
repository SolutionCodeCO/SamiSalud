<?php

class App {
    function __construct() {
        $url = isset($_GET["url"]) ? $_GET["url"] : null;

        $url = rtrim($url, "/");
        $url = explode("/", $url);

        // Obtener mensajes de éxito y error de los parámetros GET
        $successMessage = isset($_GET['success']) ? $_GET['success'] : null;
        $errorMessage = isset($_GET['error']) ? $_GET['error'] : null;

        if (empty($url[0])) {
            error_log('APP::construct-> No hay controlador especificado.');
            $archivoController = 'controllers/login.php';
            require_once $archivoController;
            $controller = new Login();

            // Pasar mensajes al controlador de Login
            $controller->loadModel('login');
            $controller->render($successMessage, $errorMessage);
            return false;
        }

        $archivoController = 'controllers/' . $url[0] . '.php';
        if (file_exists($archivoController)) {
            require_once $archivoController;

            $controller = new $url[0];
            $controller->loadModel($url[0]);

            if (isset($url[1])) {
                if (method_exists($controller, $url[1])) {
                    if (isset($url[2])) {
                        // # de parametros
                        $nParam = count($url) - 2;

                        // arreglo de parametros
                        $params = [];

                        for ($i = 0; $i < $nParam; $i++) {
                            array_push($params, $url[$i + 2]);
                        }

                        $controller->{$url[1]}($params);
                    } else {
                        // no tiene parametros, se manda a llamar tal cual
                        $controller->{$url[1]}();
                    }
                } else {
                    $this->loadError();
                }
            } else {
                // no hay metodo a cargar, se carga el metodo por default
                $controller->render($successMessage, $errorMessage);
            }
        } else {
            $this->loadError();
        }
    }

    private function loadError() {
        $archivoController = 'controllers/errores.php';
        require_once $archivoController;
        $controller = new Errores();
        $controller->render();
        return false;
    }
}
