<?php

class View {
    private $messages = [];

    public function __construct() {}

    public function render($nombre, $data = []) {
        $this->messages = $data;
        require 'views/' . $nombre . '.php';
    }

    public function setMessages($messages) {
        $this->messages = $messages;
    }

    public function showMessages() {
        if (!empty($this->messages)) {
            foreach ($this->messages as $message) {
                echo "<p>{$message}</p>";
            }
        }
    }

    public function getMessages() {
        return $this->messages;
    }
}
