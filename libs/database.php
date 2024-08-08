<?php

class Database
{
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    public function __construct()
    {
        $this->host = defined('HOST') ? constant('HOST') : '';
        $this->db = defined('DB') ? constant('DB') : '';
        $this->user = defined('USER') ? constant('USER') : '';
        $this->password = defined('PASSWORD') ? constant('PASSWORD') : '';
        $this->charset = defined('CHARSET') ? constant('CHARSET') : '';
    }

    public function connect()
    {
        try {
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            $pdo = new PDO($connection, $this->user, $this->password, $options);
            return $pdo;
        } catch (PDOException $e) {
            error_log('Connection error: ' . $e->getMessage());
            throw new Exception('Database connection error'); // Lanza una excepción genérica
        }
    }
}
