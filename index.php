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
                <?php
                if (isset($_POST['submit'])) {
                    // $msg = "First line of text\nSecond line of text";
                
                    // use wordwrap() if lines are longer than 70 characters
                    // $msg = wordwrap($msg, 70);
                
                    // $sent = mail("jennersi1remaxim@gmail.com", "My subject", $msg);
                    // if ($sent) {
                    // }
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $select = mysqli_query($conn, "select * from tbl_employee where email = '" . $email . "' and password = '" . md5($password) . "'");
                    if ($row = mysqli_fetch_array($select)){
                        session_start();
                        $_SESSION['login'] = $row['employee_id'];
                        header('location:dashboard-employee.php');
                    } else {
                        echo "<span class='error'>Ooops! Email or password is incorrect...!</span>";
                    }
                }
                ?>
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
<?php include 'includes/footer.php' ?>