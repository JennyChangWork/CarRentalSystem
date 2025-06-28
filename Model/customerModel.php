<?php
require_once __DIR__ . '/../Config/connection.php';
require_once __DIR__ . '/model.php';
class Customer extends Model {
    
    public function __construct (Database $db) {
        parent::__construct($db, 'user');
    }

    public function getPrimaryKey() {
        return 'customer_id';
    }

}
?>