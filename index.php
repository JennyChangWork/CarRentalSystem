<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental System</title>
    <link rel="stylesheet" href="Style/index.css">
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <img src="Style/Image/car.jpg" alt="Car"> 
        </div>
        <?php if (isset($_GET['error'])) : 
        if ($_GET['error']== 'login') : ?>
            <script>alert('Login failed. Incorrect username or password')</script> 
            <?php endif; ?>
            <?php endif; ?>
            <form action="Public/process.php?action=login" method="post">
                <h1 class="form-title">Car Rental System</h1>
                <div class="form-group">
                    <label for="username">Username : </label>
                    <input type="text" name="username" id="username" required placeholder="Enter your username"><br>
                </div>
                <div class="form-group">
                    <label for="password">Password : </label>
                    <input type="password" name="password" id="password" required placeholder="Enter your password"><br>
                </div>
                <button type="submit" class="submit-btn">Login</button>
    </div>
    </form>
</body>
</html> 