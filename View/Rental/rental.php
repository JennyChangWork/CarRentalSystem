<?php
require_once '../../Controller/rentalController.php';
$controller = new RentalController();
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
            <li><a href="../Car/car.php" class="menu-link">Cars</a></li>
        </ul>
    </div>
    <?php if (isset($_GET['success'])): ?>
        <script>alert("Rental added successfully")</script>
    <?php elseif (isset($_GET['error'])): ?>
        <script>alert("Failed to add rental, please try again")</script>
    <?php endif; ?>
    <h1>Rental Data</h1>
    <a href="addRental.php">Add Rental</a>
    <?php ?>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Customer</th>
                <th>Car</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Returned Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            if (!empty($data)) :
                foreach ($data as $rental) :
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($rental['customer']['full_name'])?></td>
                <td><?= htmlspecialchars($rental['car']['display_name'])?></td>
                <td><?= htmlspecialchars($rental['start_date'])?></td>
                <td><?= htmlspecialchars($rental['end_date'])?></td>
                <td><?= htmlspecialchars($rental['returned_date'])?></td>
                <td>
                    <div>
                        <a href="editRental.php?rental_id=<?=$rental['rental_id']?>">Edit</a>
                    </div>
                    </td>
            </tr>
            <?php
                endforeach;
            else :
                echo "<tr><td colspan='7'>No rentals found</td></tr>";
            endif;
            ?>
        </tbody>
    </table>
</body>
</html>