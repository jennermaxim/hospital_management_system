<?php include 'includes/header.php'; ?>
<div class="main">
    <?php include 'includes/sidebar.php'; ?>
    <div class="workspace">
        <center>
            <h1>ADD EMPLOYEE</h1>
            <hr>
            <?php
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
                if ($password === $cpassword) {
                    $insert = mysqli_query($conn, "insert into tbl_employee(employee_id, fname, lname, contact, g_id, l_id, email, password, title_id) values(null, '" . $fname . "', '" . $lname . "', '" . $contact . "', '" . $gender . "', '" . $location . "', '" . $email . "', '" . md5($password) . "', '" . $title . "')");
                    if ($insert) {
                        echo "<span class='success'>Inserted Successfully!</span>";
                    } else {
                        echo "<span class='error'>Failed to Insert...!</span>";
                    }
                } else {
                    echo "<span class='error'>Password does not match...!</span>";
                }
            }
            ?>
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
                <input type="submit" name="submit" value="Add Empolyee" class="btn">
            </form>
        </center>
    </div>
</div>
<?php include 'includes/footer.php'; ?>