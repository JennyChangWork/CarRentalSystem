<?php
require_once __DIR__ . '/../Config/connection.php';
require_once __DIR__ . '/../Model/customerModel.php';
class CustomerController {
    private $model;
    public function __construct() {
        $database = new Database ();
        $this->model = new Customer ($database);
    } 
    public function index () {
        return $this->model->all(); 
    }
    public function add ($data) {
        return $this->model->create($data);
    }
    public function edit($customer_id) {
        return $this->model->find($customer_id);
    }
    public function update ($customer_id, $data) {
        return $this->model->update($customer_id, $data);
    }
    public function delete ($customer_id) {
        return $this->model->remove($customer_id);
    }
}
?>  