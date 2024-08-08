<?php
class Controller {
    protected $view;
    protected $model;

    public function __construct() {
        if (class_exists('View')) {
            $this->view = new View();
        } else {
            error_log('Controller::__construct -> La clase View no existe.');
        }
    }

    public function loadModel($model) {
        $url = 'models/' . $model . 'model.php';

        if (file_exists($url)) {
            require_once $url;

            $modelName = ucfirst($model) . 'Model';
            if (class_exists($modelName)) {
                $this->model = new $modelName();
            } else {
                error_log('Controller::loadModel -> La clase ' . $modelName . ' no existe.');
            }
        } else {
            error_log('Controller::loadModel -> El archivo ' . $url . ' no existe.');
        }
    }

    public function existPOST($params) {
        foreach ($params as $param) {
            if (!isset($_POST[$param])) {
                error_log('Controller::existPOST -> No existe el parámetro ' . $param);
                return false;
            }
        }
        return true;
    }

    public function existGET($params) {
        foreach ($params as $param) {
            if (!isset($_GET[$param])) {
                error_log('Controller::existGET -> No existe el parámetro ' . $param);
                return false;
            }
        }
        return true;
    }

    public function getGet($name) {
        return $_GET[$name];
    }

    public function getPost($name) {
        return $_POST[$name];
    }

    public function redirect($url, $mensajes) {
        $data = [];
        $params = '';

        foreach ($mensajes as $key => $mensaje) {
            array_push($data, $key . '=' . $mensaje);
        }
        $params = join('&', $data);

        if ($params != '') {
            $params = '?' . $params;
        }

        header('Location: ' . constant('URL') . '/' . $url . $params);
        exit(); // Asegúrate de que la ejecución se detenga después de la redirección
    }
}
