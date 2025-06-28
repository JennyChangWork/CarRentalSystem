<?php 
    class Vehicle {
        public $connection;
        public $table;

        public function __construct (Database $db, $table) {
            $this->connection = $db->getConnection();
            $this->table = $table;
        }

        public function displayName($car) {
            return $car ? $car['plated_number'] : "Kendaraan Bermotor";
        }

    }
?>