<?php
include 'includes/config.php';
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $error = "";
    $select = mysqli_query($conn, "select * from tbl_employee where email = '" . $email . "' and password = '" . md5($password) . "'");
    if ($row = mysqli_fetch_array($select)) {
        session_start();
        $_SESSION['login'] = $row['employee_id'];
        $_SESSION['fname'] = $row['fname'];
        $_SESSION['lname'] = $row['lname'];
        header('location:dashboard-employee.php');
    } else {
        $error .= "<span class='error'>Ooops! Email or password is incorrect...!</span>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="images/favicon.jpeg" type="image/jpeg">
    <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>
    <div class="main">
        <center>
            <fieldset>
                <legend>Login</legend>
                <span class="error">
                    <?php echo $error; ?>
                </span>
                <h2>Hospital Management System</h2>

                <form method="post">
                    <input type="email" name="email" id="" placeholder="Enter Your Email" required autofocus>
                    <div class="password">
                        <input type="password" name="password" id="" placeholder="Enter Your Password" required>
                        <img src="images/visible.png" alt="">
                    </div>
                    <div class="btn">
                        <input type="submit" value="Login" name="submit">
                        <input type="reset" value="Reset">
                    </div>
                    <span>Don't have an account yet? <a href="register.php">Register</a></span>
                    <span>Wanna login as an admin? <a href="admin">Click here</a></span>
                </form>
            </fieldset>
        </center>
    </div>
    <script src="assets/js/login.js"></script>