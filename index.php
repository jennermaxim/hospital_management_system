<?php include 'includes/config.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="images/favicon.jpeg" type="image/jpeg">
    <link rel="stylesheet" href="assests/css/login.css">
</head>

<body>
    <div class="main">
        <center>
            <fieldset>
                <legend>Login</legend>
                <h2>Hospital Management System</h2>
                <form method="post">
                    <input type="email" name="email" id="" placeholder="Enter Your Email" required autofocus>
                    <input type="password" name="password" id="" placeholder="Enter Your Password" required>
                    <div class="btn">
                        <input type="submit" value="Login" name="submit">
                        <input type="reset" value="Reset">
                    </div>
                </form>
            </fieldset>
        </center>
    </div>
</body>

</html>