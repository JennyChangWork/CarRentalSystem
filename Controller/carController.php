<?php
require_once __DIR__ . '/../Config/connection.php';
require_once __DIR__ . '/../Model/carModel.php';
class CarController {
    private $model;
    public function __construct() {
        $database = new Database ();
        $this->model = new Car ($database);
    } 
    public function index () {
        return $this->model->all(); 
    }
    public function add ($data) {
        return $this->model->create($data);
    }
    public function edit ($car_id) {
        return $this->model->find($car_id);
    }
    public function update ($car_id, $data) {
        return $this->model->update($car_id, $data);
    }
    public function delete ($car_id) {
        return $this->model->remove($car_id);
    }
}
?>  