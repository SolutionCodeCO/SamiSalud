<?php
class Signup extends sessionController {
    public function __construct(){
        parent::__construct();
        error_log("Signup::construct -> Inicio de registro");
    }

    public function render($successMessage = null, $errorMessage = null){
        $messages = [];

        if ($successMessage) {
            $messages[] = (new SuccessMessages())->get($successMessage);
        }

        if ($errorMessage) {
            $messages[] = (new ErrorMessages())->get($errorMessage);
        }

        $this->view->setMessages($messages);
        $this->view->render("login/signup", $messages);
    }

    function newUser(){
        if ($this->existPOST(['usuario', 'contraseña'])){
            $usuario = $this->getPost('usuario');
            $contraseña = $this->getPost('contraseña');

            if ($usuario == '' || empty($usuario) || $contraseña == '' || empty($contraseña)){
                $this->redirect('signup', ['error' => ErrorMessages::ERROR_SIGNUP_NEWUSER_EMPTY]);
                return;
            }

            $usuarioModel = new EmpleadosModel();
            $usuarioModel->setUsuario($usuario);
            $usuarioModel->setContraseña($contraseña);
            $usuarioModel->setId_rol('empleado');

            if ($usuarioModel->exist($usuario)){
                $this->redirect('signup', ['error' => ErrorMessages::ERROR_SIGNUP_NEWUSER_EXISTS]);
            } else if ($usuarioModel->save()){
                $this->redirect('', ['success' => SuccessMessages::SUCCESS_CREATE_USER]);
            } else {
                $this->redirect('signup', ['error' => ErrorMessages::ERROR_SIGNUP_NEWUSER]);
            }
        } else {
            $this->redirect('signup', ['error' => ErrorMessages::ERROR_SIGNUP_NEWUSER]);
        }
    }
}
