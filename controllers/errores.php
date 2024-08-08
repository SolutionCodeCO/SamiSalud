<?php

class Errores extends Controller {
    public function __construct() {
        parent::__construct();
        error_log('Errores::construct-> Inicio de errores');
    }

    public function render() {
        $this->view->render('error/index');
    }
}
