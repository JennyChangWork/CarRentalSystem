<?php
require_once '../../Controller/customerController.php';
$controller = new CustomerController();
if (!isset($_GET['customer_id'])) {
    header("Location: customer.php");
    exit;
}
$data = $controller->edit($_GET['customer_id']);
if (!$data) {
    echo "Customer not found!";
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
    <h1>Edit Customer</h1>
    <form action="../../Public/process.php?action=editCustomer&customer_id=<?=urlencode($_GET['customer_id'])?>"method="post">
        <label for="customer_id">Customer ID : </label><br>
            <input type="number" name = customer_id value="<?= $data['customer_id']?>" readonly><br>
        <label for="full_name">Full Name : </label><br>
            <input type="text" name="full_name" value="<?= $data['full_name']?>"><br>
        <label for="email">Email : </label><br>
            <input type="text" name="email" value="<?= $data['email']?>"><br>
        <label for="phone_number">Phone Number : </label><br>
            <input type="text" name="phone_number" value="<?= $data['phone_number']?>"><br>
        <label for="KTP_number">KTP Number : </label><br>
            <input type="text" name="KTP_number" value="<?= $data['KTP_number'] ?>" readonly><br>
        <label for="SIM_number">SIM Number : </label><br>
            <input type="text" name="SIM_number" value="<?= $data['SIM_number']?>"><br>
        <label for="address">Address : </label><br>
            <input type="text" name="address" value="<?= $data['address']?>"><br>
        <input type="submit" value="Edit">
    </form>
</body>
</html>