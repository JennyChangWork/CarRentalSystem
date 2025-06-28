<?php
require_once '../../Controller/carController.php';
$controller = new CarController();
$data = $controller->index();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental System</title>
    <link rel="stylesheet" href="../../Style/view.css">
</head>
<body>
    <div class="menu">
        <ul>
            <li><a href="../Customer/customer.php" class="menu-link">Customers</a></li>
            <li><a href="../Rental/rental.php" class="menu-link">Rental</a></li>
        </ul>
    </div>
    <?php if (isset($_GET['success'])): ?>
        <script>alert("Car added successfully")</script>
    <?php elseif (isset($_GET['error'])): ?>
        <script>alert("Failed to add car, please try again")</script>
    <?php elseif (isset($_GET['error_delete'])): ?>
        <script>alert("Failed to delete car, please try again")</script>
    <?php endif; ?>
    <h1>Cars Data</h1>
    <a href="addCar.php">Add Car</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Car ID</th>
                <th>BPKB Number</th>
                <th>Plated Number</th>
                <th>Type</th>
                <th>Model</th>
                <th>Year</th>
                <th>Rental Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            if (!empty($data)) :
                foreach ($data as $car) :
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($car['car_id'])?></td>
                <td><?= htmlspecialchars($car['BPKB_number'])?></td>
                <td><?= htmlspecialchars($car['plated_number'])?></td>
                <td><?= htmlspecialchars($car['type'])?></td>
                <td><?= htmlspecialchars($car['model'])?></td>
                <td><?= htmlspecialchars($car['year'])?></td>
                <td><?= htmlspecialchars($car['rental_price'])?></td>
                <td>
                    <div>
                        <a href="editCar.php?car_id=<?=$car['car_id']?>">Edit</a>
                        <a href="../../Public/process.php?action=deleteCar&car_id=<?= $car['car_id']?>" onclick="return confirm (`Delete Cars ?`)">Delete</a>
                    </div>
                    </td>
            </tr>
            <?php
                endforeach;
            else :
                echo "<tr><td colspan='6'>No users found</td></tr>";
            endif;
            ?>
        </tbody>
    </table>
</body>
</html>