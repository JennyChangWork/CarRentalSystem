<?php
class Database {
    private $connection;
    private $host = "localhost";
    private $username = "root"; 
    private $port = 3306;
    private $password = "";
    private $database = "car_rental";
    public function __construct () {
        try {
        $this->connection = new PDO("mysql:host=$this->host:$this->port;dbname=$this->database", $this->username, $this->password);
        } catch (PDOException $exception) {
        echo "Failed connect to database " . $exception->getMessage();
        }
    }
    public function getConnection () {
        return $this->connection;
    }
}
?>