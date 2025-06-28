<?php
require_once '../../Controller/rentalController.php';
$controller = new RentalController();
if (!isset($_GET['rental_id'])) {
    header("Location: rental.php");
    exit;
}
$data = $controller->edit($_GET['rental_id']);
if (!$data['rental']) {
    echo "Rental not found!";
    exit;
}
?>
<!DOCTYPE html>   
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental System</title>
    <link rel="stylesheet" href="../../Style/edit.css">
</head>
<body>
    <h1>Edit Rental</h1>
    <form action="../../Public/process.php?action=editRental&rental_id=<?= $data["rental"]["rental_id"] ?>" method="post">
    <label for="customer">Rental : </label>
            <select name="customer_id" id="customer">
            <?php 
                foreach ($data['customer'] as $customer) :
            ?>
                <option value="<?= $customer['customer_id'] ?>" <?= ($customer['customer_id'] == $data['rental']['customer_id']) ? 'selected' : '' ?> ><?=  $customer["full_name"] ?></option>
            <?php
                endforeach;
            ?>
            </select><br>        
        <label for="car">Car : </label>
            <select name="car_id" id="car">
            <?php 
                foreach ($data['car'] as $car) :
            ?>
                <option value="<?= $car['car_id'] ?>" <?= ($car['car_id'] == $data['rental']['car_id']) ? 'selected' : '' ?> ><?=  $car["display_name"]?></option>
            <?php
                endforeach;
            ?>
            </select><br>
        <label for="start_date">Start Date : </label>
            <input type="date" name="start_date" id="start_date" value="<?= htmlspecialchars($data['rental']['start_date']) ?>"><br>
        <label for="end_date">End Date : </label>
            <input type="date" name="end_date" id="end_date" value="<?= htmlspecialchars($data['rental']['end_date']) ?>"><br>
        <label for="returned_date">Returned Date : </label>
            <input type="date" name="returned_date" id="returned_date" value="<?= htmlspecialchars($data['rental']['returned_date']) ?>"><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>