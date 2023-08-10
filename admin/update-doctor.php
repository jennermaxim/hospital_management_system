<?php include 'includes/header.php'; ?>
<div class="main">
    <?php include 'includes/sidebar.php'; ?>
    <div class="workspace">
        <center>
            <h1>UPDATE DOCTOR</h1>
            <hr>
            <?php
            if (isset($_POST['submit'])) {
                $doctor = $_POST['doctor'];
                $specialization = $_POST['specialization'];
                $gender = $_POST['gender'];
                $location = $_POST['location'];
                $update=mysqli_query($conn, "update tbl_doctor set doctor='".$doctor."', specialization='".$specialization."', g_id='".$gender."', l_id='".$location."' where doc_id ='".$_GET['doc']."'");
                if ($update) {
                    header('location:add-doctor.php');
                } else {
                    echo "<span class='error'>Failed to Update...!</span>";
                }
            }
            ?>
            <form method="post">
            <?php
            $select=mysqli_query($conn,"select * from tbl_doctor, tbl_gender, tbl_location where(tbl_doctor.g_id=tbl_gender.g_id and tbl_doctor.l_id=tbl_location.l_id and tbl_doctor.doc_id='".$_GET['doc']."')");
            $row=mysqli_fetch_array($select);
            ?>
                <input type="text" name="doctor" id="" autofocus required value="<?php echo $row['doctor']; ?>">
                <input type="text" name="specialization" id="" value="<?php echo $row['specialization']; ?>">
                <select name="gender" id="">
                    <option value="<?php echo $row['g_id']; ?>"><?php echo $row['gender'] ?></option>
                    <?php
                    $selct = mysqli_query($conn, "select * from tbl_gender");
                    while ($rw = mysqli_fetch_assoc($selct)) {
                        ?>
                        <option value="<?php echo $rw['g_id'] ?>"><?php echo $rw['gender'] ?></option>
                        <?php
                    }
                    ?>
                </select>
                <select name="location" id="">
                    <option value="<?php echo $row['l_id']; ?>"><?php echo $row['location']; ?></option>
                    <?php
                    $selec = mysqli_query($conn, "select * from tbl_location");
                    while ($ro = mysqli_fetch_assoc($selec)) {
                        ?>
                        <option value="<?php echo $ro['l_id']; ?>"><?php echo $ro['location'] ?></option>
                        <?php
                    }
                    ?>
                </select>
                <input type="submit" value="Update Doctor" name="submit" class="btn">
            </form>
        </center>
    </div>
</div>
<?php include 'includes/footer.php'; ?>