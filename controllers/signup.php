<?php
class Signup extends sessionController{
    function __construct(){
        parent::__construct();
    }

    function render(){
        $this->view->render("login/signup", []);
    }

    function newUser(){
        if($this->existPOST(['usuario', 'contraseña'])){
            $usuario = $this->getPost('usuario');
            $contraseña = $this->getPost('contraseña');

            if($usuario == '' || empty($usuario) || $contraseña == '' || empty($contraseña)){
                $this->redirect('signup', ['error' => ErrorMessages::ERROR_SIGNUP_NEWUSER_EMPTY]);
            }

            $usuario = new EmpleadosModel();
            $usuario -> setUsuario($usuario);
            $contraseña -> setContraseña($contraseña);
            $usuario -> setId_rol('empleado');

            if($usuario->exist($usuario)){
                $this->redirect('signup', ['error' => ErrorMessages::ERROR_SIGNUP_NEWUSER_EXISTS]);
            }else if($usuario->save()){
                $this->redirect('', ['success' => SuccessMessages::SUCCESS_CREATE_USER]);
            }else{
                $this->redirect('signup', ['error' => ErrorMessages::ERROR_SIGNUP_NEWUSER]);
            }
        }else{
            $this->redirect('signup', ['error' => ErrorMessages::ERROR_SIGNUP_NEWUSER]);
        }
    }
}