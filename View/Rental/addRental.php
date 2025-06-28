<?php
require_once '../../Controller/rentalController.php';
$controller = new RentalController();
$data = $controller->create();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental System</title>
    <link rel="stylesheet" href="../../Style/add.css">
</head>
<body>
    <h1>Add Rental</h1>
    <form action="../../Public/process.php?action=addRental" method="post">
        <label for="customer">Customer : </label>
            <select name="customer_id" id="customer">
            <?php 
                foreach ($data['customer'] as $customer) :
            ?>
                <option value="<?= $customer['customer_id'] ?>"><?=  $customer["full_name"] ?></option>
            <?php
                endforeach;
            ?>
            </select><br>        
        <label for="car">Car : </label>
            <select name="car_id" id="car">
            <?php 
                foreach ($data['car'] as $car) :
            ?>
                <option value="<?= $car['car_id'] ?>"><?=  $car["display_name"]?></option>
            <?php
                endforeach;
            ?>
            </select><br>
        <label for="start_date">Start Date : </label>
            <input type="date" name="start_date" id="start_date"><br>
        <label for="end_date">End Date : </label>
            <input type="date" name="end_date" id="end_date"><br>
        <input type="submit" value="Add">
    </form>
</body>
</html>