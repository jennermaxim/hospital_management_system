<?php
include 'includes/config.php';
if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];
    $location = $_POST['location'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $title = $_POST['title'];
    $error = "";
    if ($password === $cpassword) {
        $select_email = mysqli_query($conn, "select email from tbl_employee where email = '" . $email . "'");
        if (mysqli_num_rows($select_email) > 0) {
            $error .= "$email - This email is already exists!";
        } else {
            $insert = mysqli_query($conn, "insert into tbl_employee(employee_id, fname, lname, contact, g_id, l_id, email, password, title_id) values(null, '" . $fname . "', '" . $lname . "', '" . $contact . "', '" . $gender . "', '" . $location . "', '" . $email . "', '" . md5($password) . "', '" . $title . "')");
            if ($insert) {
                $select = mysqli_query($conn, "select * from tbl_employee where email = '" . $email . "' and password = '" . md5($password) . "'");
                if ($row = mysqli_fetch_array($select)) {
                    session_start();
                    $_SESSION['login'] = $row['employee_id'];
                    $_SESSION['fname'] = $row['fname'];
                    $_SESSION['lname'] = $row['lname'];
                    header('location:dashboard-employee.php');
                } else {
                    header('location:index.php');
                }
            } else {
                $error .= "<span class='error'>Failed to Create your account. Please try again later or try a different Email...!</span>";
            }
        }

    } else {
        $error .= "<span class='error'>Password does not match...!</span>";
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
                <legend>Register</legend>
                <span class="error">
                    <?php echo $error; ?>
                </span>
                <h2>Hospital Management System</h2>

                <form method="post">
                    <input type="text" name="fname" id="" autofocus required placeholder="Enter the First Name">
                    <input type="text" name="lname" id="" required placeholder="Enter the Last Name">
                    <input type="tel" name="contact" id="" required placeholder="Enter Contact">
                    <select name="gender" id="">
                        <option value="">Selet Gender</option>
                        <?php
                        $select = mysqli_query($conn, "select * from tbl_gender");
                        while ($rowg = mysqli_fetch_assoc($select)) {
                            ?>
                            <option value="<?php echo $rowg['g_id']; ?>"><?php echo $rowg['gender']; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <select name="location" id="">
                        <option value="">Select Location</option>
                        <?php
                        $select = mysqli_query($conn, "select * from tbl_location");
                        while ($rowl = mysqli_fetch_assoc($select)) {
                            ?>
                            <option value="<?php echo $rowl['l_id']; ?>"><?php echo $rowl['location']; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <input type="email" name="email" id="" required placeholder="Enter Email">
                    <input type="password" name="password" id="" required placeholder="Enter Password">
                    <input type="password" name="cpassword" id="" required placeholder="Confirm Password">
                    <select name="title" id="">
                        <option value="">Select Title</option>
                        <?php
                        $select = mysqli_query($conn, "select * from tbl_title");
                        while ($rowt = mysqli_fetch_assoc($select)) {
                            ?>
                            <option value="<?php echo $rowt['title_id']; ?>"><?php echo $rowt['title']; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <div class="btn">
                        <input type="submit" name="submit" value="Register">
                        <input type="reset" value="Reset">
                    </div>
                    <span>Do you have an account already? <a href="index.php">Login</a></span>
                </form>
            </fieldset>
        </center>
    </div>
    <script>
        let error = document.querySelector('.error');
        setTimeout(() => {
            error.style.display = 'none';
        }, 10000)
    </script>