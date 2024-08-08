<?php

class ErrorMessages {
    const ERROR_ADMIN_NEWCATEGORY_EXISTS = '247403164fd409cc2437dadbd4982a3a';
    const ERROR_SIGNUP_NEWUSER = 'dff02bcacefca5ff5e7a901fe52f32ed';
    const ERROR_SIGNUP_NEWUSER_EMPTY = '2cc90b290f890f1bc918c64494058b5c';
    const ERROR_SIGNUP_NEWUSER_EXISTS = '51826f085db0e49cb352914236c4e526';
    
    private $errorList = [];

    public function __construct() {
        $this->errorList = [
            self::ERROR_ADMIN_NEWCATEGORY_EXISTS => "El nombre de la categoría ya existe.",
            self::ERROR_SIGNUP_NEWUSER => "Oh,oh. Error al procesar la solicitud.",
            self::ERROR_SIGNUP_NEWUSER_EMPTY => "Ningun campo puede quedar vacio.",
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
