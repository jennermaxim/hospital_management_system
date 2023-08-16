<?php include 'includes/header.php'; ?>

<div class="main dashboard">
    <?php include 'includes/sidebar.php' ?>
    <div class="workspace">
        <center>
            <h1>ADD PATIENT</h1>
            <hr>
            <form method="post">
                <input type="text" name="fname" id="" autofocus required placeholder="Enter Patient First Name">
                <input type="text" name="lname" id="" required placeholder="Enter Patient Last Name">
                <input type="text" name="email" id="" required placeholder="Enter Patient Email">
                <input type="text" name="password" id="" required placeholder="Enter Patient Password">
                <input type="text" name="cpassword" id="" required placeholder="Confirm Patient Password">
                <input type="text" name="contact" id="" required placeholder="Enter Patient Contact">
                <select name="bloodgroup" id="">
                    <option value="">Select Patient Blood Group</option>
                </select>
                <select name="gender" id="">
                    <option value="">Select Patient Gender</option>
                </select>
                <input type="date" name="dateofbirth" id="">
                <select name="location" id="">
                    <option value="">Select Patient Location</option>
                </select>
                <input type="submit" name="submit" value="Add Patient" class="btn">
            </form>
        </center>
    </div>
</div>
<?php include 'includes/footer.php'; ?>