<?php
require_once '../Config/connection.php';
require_once '../Model/admin.php';
class AdminController {
    private $model;
    public function __construct() {
        $database = new Database ();
        $this->model = new Admin ($database);
    } 
    public function login ($data) {
        return $this->model->getData($data['username'], $data['password']);
    }
}
?>