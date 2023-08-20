<?php
include 'includes/config.php';
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $select = mysqli_query($conn, "select * from tbl_administrator where email = '".$email."' and password = '".md5($password)."'");
    if($row = mysqli_fetch_array($select)){
        session_start();
        $_SESSION['login'] = $row['a_id'];
        $_SESSION['admin'] = $row['admin'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['contact'] = $row['contact'];
        header('location:dashboard.php');
    } else{
            echo "<span color='red' class='error'><legend class='error'>Ooops! Email or Password is incorrect!</legend></span>";
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
    <link rel="stylesheet" href="assets/css/form.css" type="text/css">
    <style>
        body{
            background-color: rgb(223, 223, 223);
        }
        fieldset {
            width: 510px;
            margin-top: 10%;
            border-radius: 16px;
            background-color: #fff;
            border: 1px solid #007ee5;
        }

        legend {
            text-align: center;
            padding: 8px;
            background-color: #007ee5;
            /* width: 10%; */
            margin: 0;
            border-radius: 16px;
            color: #fff;
        }
        .error{
            width: 50%;
        }

        @media screen and (max-width:520px){
            fieldset{
                width: 90%;
            }
        }
    </style>
</head>

<body>
    <div class="main">
        <center>
            <fieldset>
                <legend>LOGIN</legend>
                <form method="post">
                    <input type="email" name="email" placeholder="Enter your Email" id="" required autofocus>
                    <input type="password" name="password" id="" placeholder="password" required>
                    <input type="submit" value="Login" name="submit" class="btn">
                    <br><br>
                    Don't have an account yet? <a href="signup.php">Sign UP</a>
                </form>
            </fieldset>
        </center>
    </div>
</body>

</html>