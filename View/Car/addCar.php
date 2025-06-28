<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental System</title>
    <link rel="stylesheet" href="../../Style/add.css">
</head>
<body>
    <h1>Add Car</h1>
    <form action="../../Public/process.php?action=addCar" method="post">
        <label for="BPKB_number">BPKB Number: </label><br>
            <input type="text" name="BPKB_number"><br>
        <label for="plated_number">Plated Number : </label><br>
            <input type="text" name="plated_number"><br>
        <label for="type">Type : </label><br>
        <select name="type" id="type">
            <option value="toyota">Toyota</option>
            <option value="honda">Honda</option>
            <option value="wuling">Wuling</option>
            <option value="daihatsu">Daihatsu</option>
            <option value="mazda">Mazda</option>
        </select><br>
        <label for="model">Model : </label><br>
            <input type="text" name="model"><br>
        <label for="year">Year : </label><br>
            <input type="number" name="year"><br>
        <label for="rental_price">Rental Price : </label><br>
            <input type="number" name="rental_price"><br>
        <input type="submit" value="Add">
    </form>
</body>
</html>