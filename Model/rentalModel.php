<?php
require_once __DIR__ . '/../Config/connection.php';
require_once __DIR__ . '/model.php';
class Rental extends Model {
    
    public function __construct (Database $db) {
        parent::__construct($db, 'rental');
    }

    public function getPrimaryKey() {
        return 'rental_id';
    }

}
?>