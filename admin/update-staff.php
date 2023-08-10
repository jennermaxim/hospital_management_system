<?php include 'includes/header.php'; ?>
<div class="main">
    <?php include 'includes/sidebar.php'; ?>
    <div class="workspace workspacestaff">
        <center>
            <h1>UPDATE STAFF</h1>
            <hr>
            <?php
            if (isset($_POST['submit'])) {
                $staff = $_POST['staff'];
                $contact = $_POST['contact'];
                $title = $_POST['title'];
                $gender = $_POST['gender'];
                $location = $_POST['location'];
                $update = mysqli_query($conn, "update tbl_staff set name = '" . $staff . "', contact = '" . $contact . "', title = '" . $title . "', g_id = '" . $gender . "', l_id = '" . $location . "' where s_id = '" . $_GET['s'] . "'");
                if ($update) {
                    header('location:add-staff.php');
                } else {
                    echo "<span class='error'>Failed to Update...!</span>";
                }
            }
            $select = mysqli_query($conn, "select * from tbl_staff, tbl_gender, tbl_location where (tbl_staff.g_id = tbl_gender.g_id and tbl_staff.l_id = tbl_location.l_id and s_id = '" . $_GET['s'] . "')");
            $row = mysqli_fetch_array($select);
            ?>
            <form method="post">
                <input type="text" name="staff" id="" autofocus required value="<?php echo $row['name']; ?>">
                <input type="tel" name="contact" id="" value="<?php echo $row['contact']; ?>">
                <input type="text" name="title" id="" value="<?php echo $row['title']; ?>">
                <select name="gender" id="">
                    <option value="<?php echo $row['g_id']; ?>" name="gender"><?php echo $row['gender']; ?></option>
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
                    <option value="<?php echo $row['l_id']; ?>"><?php echo $row['location']; ?></option>
                    <?php
                    $select = mysqli_query($conn, "select * from tbl_location");
                    while ($rowl = mysqli_fetch_assoc($select)) {
                        ?>
                        <option value="<?php echo $rowl['l_id'] ?>"><?php echo $rowl['location'] ?></option>
                        <?php
                    }
                    ?>
                </select>
                <input type="submit" value="Update Staff" name="submit" class="btn">
            </form>
        </center>
    </div>
</div>
<?php include 'includes/footer.php'; ?>