<?php
require_once '../../Controller/carController.php';
$controller = new CarController();
if (!isset($_GET['car_id'])) {
    header("Location: car.php");
    exit;
}
$data = $controller->edit($_GET['car_id']);
if (!$data) {
    echo "Car not found!";
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
    <h1>Edit Car</h1>
    <form action="../../Public/process.php?action=editCar&car_id=<?=urlencode($_GET['car_id'])?>"method="post">
        <label for="car_id">Car ID : </label><br>
            <input type="text" name="car_id" value="<?= $data['car_id']?>" readonly><br>
        <label for="BPKB_number">BPKB Number: </label><br>
            <input type="text" name="BPKB_number" value="<?= $data['BPKB_number']?>"><br>
        <label for="plated_number">Plated Number : </label><br>
            <input type="text" name="plated_number" value="<?= $data['plated_number']?>"><br>
        <label for="type">Type : </label><br>
        <select name="type" id="type">
            <option value="Toyota" <?= $data['type'] == 'Toyota' ? 'selected' : '' ?>>Toyota</option>
            <option value="Honda" <?= $data['type'] == 'Honda' ? 'selected' : '' ?>>Honda</option>
            <option value="Wuling" <?= $data['type'] == 'Wuling' ? 'selected' : '' ?>>Wuling</option>
            <option value="Daihatsu" <?= $data['type'] == 'Daihatsu' ? 'selected' : '' ?>>Daihatsu</option>
            <option value="Mazda" <?= $data['type'] == 'Mazda' ? 'selected' : '' ?>>Mazda</option>
        </select><br>
        <label for="model">Model : </label><br>
            <input type="text" name="model" value="<?= $data['model'] ?>"><br>
        <label for="year">Year : </label><br>
            <input type="number" name="year" value="<?= $data['year']?>"><br>
        <label for="rental_price">Rental Price : </label><br>
            <input type="text" name="rental_price" value="<?= $data['rental_price']?>"><br>
        <input type="submit" value="Edit">
    </form>
</body>
</html>