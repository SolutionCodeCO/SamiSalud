<?php

class ErrorMessages {
    const ERROR_ADMIN_NEWCATEGORY_EXISTS = '247403164fd409cc2437dadbd4982a3a';
    const ERROR_SIGNUP_NEWUSER = '001';
    const ERROR_SIGNUP_NEWUSER_EMPTY = '00102';
    const ERROR_SIGNUP_NEWUSER_EXISTS = '00103';
    
    private $errorList = [];

    public function __construct() {
        $this->errorList = [
            self::ERROR_ADMIN_NEWCATEGORY_EXISTS => "El nombre de la categoría ya existe.",
            self::ERROR_SIGNUP_NEWUSER => "Oh, oh. Error al procesar la solicitud.",
            self::ERROR_SIGNUP_NEWUSER_EMPTY => "Ningún campo puede quedar vacío.",
            self::ERROR_SIGNUP_NEWUSER_EXISTS => "Lo siento, ya existe ese nombre de usuario.",
        ];
    }

    public function get($hash) {
        return isset($this->errorList[$hash]) ? $this->errorList[$hash] : "Código de error desconocido.";
    }

    public function existsKey($key) {
        return array_key_exists($key, $this->errorList);
    }
}
