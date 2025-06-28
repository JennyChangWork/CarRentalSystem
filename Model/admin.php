<?php
require_once '../Config/connection.php';
class Admin {
    private $connection;
    private $table = 'admin';
    public function __construct (Database $db) {
        $this->connection = $db->getConnection();
    }
    public function getData ($username, $password) {
        $statement = $this->connection->prepare("SELECT * FROM {$this->table} WHERE username = ?");
        $statement->execute([$username]);
        $admin = $statement->fetch();
        if ($admin && password_verify($password, $admin['password'])) {
            return true;
        } else {
            return false;
        }
    }
}   
?>