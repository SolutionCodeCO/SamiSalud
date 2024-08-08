<?php
include_once 'libs/imodel.php';
class Model
{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function query($query){
        try {
            return $this->db->connect()->query($query);
        } catch (PDOException $e) {
            error_log('Query error: ' . $e->getMessage());
            return false;
        }
    }

    public function prepare($query){
        try {
            return $this->db->connect()->prepare($query);
        } catch (PDOException $e) {
            error_log('Prepare error: ' . $e->getMessage());
            return false;
        }
    }
}
