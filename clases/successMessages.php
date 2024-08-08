<?php

class SuccessMessages {
    const SUCCESS_ADMIN_NEWCATEGORY_EXISTS = '247403164fd409cc2437dadbd4982a3a';
    const SUCCESS_CREATE_USER = '3fbf4183d01463807ea8c620475f266b';
    
    private $successList = [];

    public function __construct() {
        $this->successList = [
            self::SUCCESS_ADMIN_NEWCATEGORY_EXISTS => "El nombre de la categoría ya existe.",
            self::SUCCESS_CREATE_USER => "¡Usuario creado con exito!.   "
        ];
    }

    public function get($hash) {
        return isset($this->successList[$hash]) ? $this->successList[$hash] : "Código de éxito desconocido.";
    }

    public function existsKey($key) {
        return array_key_exists($key, $this->successList);
    }
}
