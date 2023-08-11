<?php include 'includes/config.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="images/favicon.jpeg" type="image/jpeg">
    <link rel="stylesheet" href="assests/css/form.css" type="text/css">
    <style>
        fieldset {
            width: 60%;
            margin-top: 5%;
            border-radius: 16px;
            background-color: gray;
        }

        legend {
            text-align: center;
            padding: 8px;
            background-color: burlywood;
            width: 50%;
            margin: 0;
            border-radius: 16px;
        }

        .success {
            color: green;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>
    <div class="main">
        <center>
            <fieldset>
                <legend>Create an Admin Account</legend>
                <?php
                if (isset($_POST['submit'])) {
                    $name = $_POST['name'];
                    $contact = $_POST['contact'];
                    $email = $_POST['email'];
                    $location = $_POST['location'];
                    $password = $_POST['password'];
                    $cpassword = $_POST['cpassword'];
                    if ($password === $cpassword) {
                        $insert = mysqli_query($conn, "insert into tbl_administrator(a_id, admin, contact, l_id, password, email) value(null, '" . $name . "', '" . $contact . "', '" . $location . "', '" . md5($password) . "', '" . $email . "')");
                        if ($insert) {
                            header('location:index.php');
                        } else {
                            echo "<span class='error'><legend>Failed to Insert...!</legend></span>";
                        }
                    } else {
                        echo "<span color='red' class='error'><legend>Password does not match...!</legend></span>";
                    }
                }
                ?>
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
<script src="assests/js/script.js"></script>

</html>