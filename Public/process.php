<?php
require_once __DIR__ . '/../Controller/adminController.php';
require_once __DIR__ . '/../Controller/customerController.php';
require_once __DIR__ . '/../Controller/carController.php';
require_once __DIR__ . '/../Controller/rentalController.php';
if (isset($_GET['action']) && $_GET['action'] == 'login') {
    $controller = new AdminController();
    $admin = $controller->login($_POST);
    if ($admin) {
        header("Location: ../View/dashboard.php"); 
        exit;
    } else {
        header("Location: ../index.php?error=login");
        exit;
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'addCustomer') { 
    $controller = new CustomerController();
    $user = $controller->add($_POST);
    if ($user) {
        header("Location: ../View/Customer/customer.php?success=1");
        exit;
    } else {
        header("Location: ../View/Customer/customer.php?error=1");
        exit;
    }
}   

if (isset($_GET['action']) && $_GET['action'] == 'editCustomer') { 
    $controller = new CustomerController ();
    $user = $controller->update($_GET['customer_id'], $_POST);
    header("Location: ../View/Customer/customer.php");
}

if (isset($_GET['action']) && $_GET['action'] == 'deleteCustomer') { 
    $controller = new CustomerController ();
    $deleted = $controller->delete($_GET['customer_id']);
    if ($deleted) {
        header("Location: ../View/Customer/customer.php?success_delete=1");
    } else {
        header("Location: ../View/Customer/customer.php?error_delete=1");
    }
    exit;
}


if (isset($_GET['action']) && $_GET['action'] == 'addCar') { 
    $controller = new CarController();
    $car = $controller->add($_POST);
    if ($car) {
        header("Location: ../View/Car/car.php?success=1");
        exit;
    } else {
        header("Location: ../View/Car/car.php?error=1");
        exit;
    }
}   

if (isset($_GET['action']) && $_GET['action'] == 'editCar') { 
    $controller = new CarController ();
    $user = $controller->update($_GET['car_id'], $_POST);
    header("Location: ../View/Car/car.php");
}

if (isset($_GET['action']) && $_GET['action'] == 'deleteCar') { 
    $controller = new CarController ();
    $deleted = $controller->delete($_GET['car_id']);
    if ($deleted) {
        header("Location: ../View/Car/car.php?success_delete=1");
    } else {
        header("Location: ../View/Car/car.php?error_delete=1");
    }
    exit;
}


if (isset($_GET['action']) && $_GET['action'] == 'addRental') { 
    $controller = new RentalController();
    $rental = $controller->add($_POST);
    if ($rental) {
        header("Location: ../View/Rental/rental.php?success=1");
        exit;
    } else {
        header("Location: ../View/Rental/rental.php?error=1");
        exit;
    }
} 

if (isset($_GET['action']) && $_GET['action'] == 'editRental') { 
    $controller = new RentalController();
    $rental = $controller->update($_GET['rental_id'], $_POST);
    header("Location: ../View/Rental/rental.php");
    exit;
}
?>