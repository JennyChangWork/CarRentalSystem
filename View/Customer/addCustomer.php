<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental System</title>
    <link rel="stylesheet" href="../../Style/add.css">
</head>
<body>
    <h1>Add Customer</h1>
    <form action="../../Public/process.php?action=addCustomer" method="post">
        <label for="full_name">Full Name : </label><br>
            <input type="text" name="full_name" id="full_name"><br>
        <label for="email">Email : </label><br>
            <input type="text" name="email" id="email"><br>
        <label for="phone_number">Phone Number : </label><br>
            <input type="text" name="phone_number" id="phone_number"><br>
        <label for="KTP_number">KTP Number : </label><br>
            <input type="text" name="KTP_number" id="KTP_number"><br>
        <label for="SIM_number">SIM Number : </label><br>
            <input type="text" name="SIM_number" id="SIM_number"><br>
        <label for="address">Address : </label><br>
            <input type="text" name="address" id="address"><br>
        <input type="submit" value="Add">
    </form>
</body>
</html>