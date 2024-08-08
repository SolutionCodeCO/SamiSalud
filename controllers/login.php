<?php

class Login extends Controller {
    public function __construct() {
        parent::__construct();
        error_log("Login::construct -> Inicio de Login");
    }

    public function render($successMessage = null, $errorMessage = null) {
        $messages = [];

        if ($successMessage) {
            $messages[] = (new SuccessMessages())->get($successMessage);
        }

        if ($errorMessage) {
            $messages[] = (new ErrorMessages())->get($errorMessage);
        }

        $this->view->setMessages($messages);
        $this->view->render('login/index', $messages);
    }
}
