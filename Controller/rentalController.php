<?php
require_once __DIR__ . '/../Config/connection.php';
require_once __DIR__ . '/../Model/rentalModel.php';
require_once __DIR__ . '/../Model/customerModel.php';
require_once __DIR__ . '/../Model/carModel.php';
class RentalController {
    private $model;
    private $carModel;
    private $customerModel;

    public function __construct() {
        $database = new Database ();
        $this->model = new Rental ($database);
        $this->carModel = new Car ($database);
        $this->customerModel = new Customer ($database);
    } 

    public function index () {
        $rentaldata = $this->model->all();

        $list_rental = [];
        foreach ($rentaldata as $rental) {
            
            $car  = $this->carModel->find($rental['car_id']);
            $car['display_name'] =  $this->carModel->displayName($car);

            $rental['car']  = $car;
            $rental['customer'] = $this->customerModel->find($rental['customer_id']);
            $list_rental[] = $rental;
        }
        
        return $list_rental; 
    }

    public function create() {
        $car  = $this->carModel->getAvailableCar();
        foreach ($car as $key => $cardata) {
            $car[$key]['display_name'] = $this->carModel->displayName($cardata);
        }

        $customer = $this->customerModel->all();
        $data = [
            'car' => $car,
            'customer' => $customer
        ];

        return $data;
    }

    public function add ($data) {
        return $this->model->create($data);
    }
    
    public function edit($rental_id) {
        $customer = $this->customerModel->all();
        $rental = $this->model->find($rental_id);
        
        $car  = $this->carModel->getAvailableCar($rental['car_id']);
        foreach ($car as $key => $cardata) {
            $car[$key]['display_name'] = $this->carModel->displayName($cardata);
        }

        $data = [
            'car' => $car,
            'customer' => $customer,
            'rental' => $rental
        ];

        return $data;
    }

    public function update ($rental_id, $data) {

        if (@$data['returned_date'] == '') {
            $data['returned_date'] = null;
        }

        return $this->model->update($rental_id, $data);
    }
    
}
?>  