<?php 
class View {
    private $data;
    private $messages = [];

    function __construct() {
        // Inicializar mensajes si es necesario
    }

    public function render($nombre, $data = []) {
        $this->data;
        require 'views/' . $nombre . '.php';
    }

    public function setMessages($messages) {
        $this->messages = $messages;
    }

    public function showMessages() {
        foreach ($this->messages as $message) {
            echo "<p>$message</p>";
        }
    }

    public function hasMessages() {
        return !empty($this->messages);
    }
}
