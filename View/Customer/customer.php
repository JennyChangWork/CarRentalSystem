<?php
require_once '../../Controller/customerController.php';
$controller = new CustomerController();
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
            <li><a href="../Car/car.php" class="menu-link">Cars</a></li>
            <li><a href="../Rental/rental.php" class="menu-link">Rental</a></li>
        </ul>
    </div>
    <?php if (isset($_GET['success'])): ?>
        <script>alert("Customer added successfully")</script>
    <?php elseif (isset($_GET['error'])): ?>
        <script>alert("Failed to add customer, please try again")</script>
    <?php elseif (isset($_GET['error_delete'])): ?>
        <script>alert("Failed to delete customer, please try again")</script>
    <?php endif; ?>
    <h1>Customer Data</h1>
    <a href="addCustomer.php">Add Customer</a>
    <?php ?>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Customer ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>KTP Number</th>
                <th>SIM Number</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            if (!empty($data)) :
                foreach ($data as $customer) :
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($customer['customer_id'])?></td>
                <td><?= htmlspecialchars($customer['full_name'])?></td>
                <td><?= htmlspecialchars($customer['email'])?></td>
                <td><?= htmlspecialchars($customer['phone_number'])?></td>
                <td><?= htmlspecialchars($customer['KTP_number'])?></td>
                <td><?= htmlspecialchars($customer['SIM_number'])?></td>
                <td><?= htmlspecialchars($customer['address'])?></td>
                <td>
                    <div>
                        <a href="editCustomer.php?customer_id=<?=$customer['customer_id']?>">Edit</a>
                        <a href="../../Public/process.php?action=deleteCustomer&customer_id=<?= $customer['customer_id']?>" onclick="return confirm (`Delete Data ?`)">Delete</a>
                    </div>
                    </td>
            </tr>
            <?php
                endforeach;
            else :
                echo "<tr><td colspan='7'>No Customer found</td></tr>";
            endif;
            ?>
        </tbody>
    </table>
</body>
</html>