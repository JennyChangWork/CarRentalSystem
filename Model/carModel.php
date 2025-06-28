<?php
require_once __DIR__ . '/../Config/connection.php';
require_once __DIR__ . '/model.php';
class Car extends Model{
    public function __construct (Database $db) {
        parent::__construct($db, 'car');
    }

    public function getPrimaryKey() {
        return 'car_id';
    }

    public function getAvailableCar($exception_id = 0) {
        $statement = $this->connection->prepare("SELECT * FROM {$this->table} WHERE car_id NOT IN (SELECT car_id FROM rental WHERE returned_date IS NULL ) OR car_id = ?");
        $statement->execute([$exception_id]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function displayName($car)
    {
        return $car['type'] . " " . $car['model'] . " " . $car['plated_number'];
    }
    
}
?>