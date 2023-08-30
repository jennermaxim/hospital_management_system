<?php include 'includes/config.php' ?>
<?php
$error = "";
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $location = $_POST['location'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    if ($password === $cpassword) {
        $select = mysqli_query($conn, "select email from tbl_administrator where email = '" . $email . "' ");
        if (mysqli_num_rows($select) > 0) {
            $error .= "$email - This email is already exists!";
        } else {
            $insert = mysqli_query($conn, "insert into tbl_administrator(a_id, admin, contact, l_id, password, email) value(null, '" . $name . "', '" . $contact . "', '" . $location . "', '" . md5($password) . "', '" . $email . "')");
            if ($insert) {
                header('location:index.php');
            } else {
                $error .= "Failed to Insert...!";
            }
        }
    } else {
        $error .= "Password does not match...!";
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
        body {
            background-color: rgb(223, 223, 223);
        }

        fieldset {
            width: 510px;
            margin-top: 5%;
            border-radius: 16px;
            background-color: #fff;
            border: 1px solid #007ee5;
        }

        legend {
            text-align: center;
            padding: 8px;
            background-color: #007ee5;
            margin: 0;
            border-radius: 16px;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="main">
        <center>
            <fieldset>
                <legend>Create an Admin Account</legend>
                <span class="error">
                    <?php echo $error; ?>
                </span>
                <form method="post">
                    <input type="text" name="name" id="" placeholder="Enter Your Name" required autofocus>
                    <input type="tel" name="contact" id="" placeholder="Enter Your Contact" required>
                    <input type="email" name="email" placeholder="Enter your Email" id="" required>
                    <select name="location" id="">
                        <option value="">Enter your location</option>
                        <?php
                        $select = mysqli_query($conn, "select * from tbl_location");
                        while ($rowl = mysqli_fetch_assoc($select)) {
                            ?>
                            <option value="<?php echo $rowl['l_id']; ?>"><?php echo $rowl['location']; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <input type="password" name="password" id="" placeholder="password" required>
                    <input type="password" name="cpassword" id="" placeholder="Confirm Password" required>
                    <input type="submit" value="Sign-Up" name="submit" class="btn">
                    <br><br>
                    Don't have an account yet? <a href="index.php">login</a>
                </form>
            </fieldset>
        </center>
    </div>
</body>
<script>
    let error = document.querySelector(".main fieldset .error");
    setTimeout(() => {
        error.style.display = "none";
    }, 10000);
</script>

</html>