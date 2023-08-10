<?php include 'includes/header.php'; ?>
<div class="main">
    <?php include 'includes/sidebar.php'; ?>
    <div class="workspace">
        <center>
            <h1>ADD DOCTOR</h1>
            <hr>
            <?php
            if (isset($_POST['submit'])) {
                $doctor = $_POST['doctor'];
                $specialization = $_POST['specialization'];
                $gender = $_POST['gender'];
                $location = $_POST['location'];
                $insert = mysqli_query($conn, "insert into tbl_doctor(doc_id, doctor, g_id, l_id, specialization) values(null, '" . $doctor . "', '" . $gender . "', '" . $location . "', '" . $specialization . "')");
                if ($insert) {
                    echo "<span class='success'>Inserted Successfully</span>";
                } else {
                    echo "<span class='error'>Failed to insert...!</span>";
                }
            }
            ?>
            <form method="post">
                <input type="text" name="doctor" id="" autofocus required placeholder="Enter Name">
                <input type="text" name="specialization" id="" placeholder="Enter Specialization">
                <select name="gender" id="">
                    <option value="">Select Gender</option>
                    <?php
                    $select = mysqli_query($conn, "select * from tbl_gender");
                    while ($row = mysqli_fetch_assoc($select)) {
                        ?>
                        <option value="<?php echo $row['g_id'] ?>"><?php echo $row['gender'] ?></option>
                        <?php
                    }
                    ?>
                </select>
                <select name="location" id="">
                    <option value="">Select Location</option>
                    <?php
                    $select = mysqli_query($conn, "select * from tbl_location");
                    while ($row = mysqli_fetch_assoc($select)) {
                        ?>
                        <option value="<?php echo $row['l_id'] ?>"><?php echo $row['location'] ?></option>
                        <?php
                    }
                    ?>
                </select>
                <input type="submit" value="Add Doctor" name="submit" class="btn">
            </form>
            <br>
            <table width="80%" border="2px" style="border-collapse: collapse;">
                <th colspan="6" style="padding: 15px; background-color: #fff;">LIST OF ADDED DOCTORS</th>
                <tr style="background-color: rgb(229, 224, 224); padding: 10px">
                    <th style="padding: 10px">#</th>
                    <th style="padding: 10px">Doctor</th>
                    <th style="padding: 10px">Specialization</th>
                    <th style="padding: 10px">Gender</th>
                    <th style="padding: 10px">Location</th>
                    <th style="padding: 10px">Action</th>
                </tr>
                <?php
                $select = mysqli_query($conn, "select * from tbl_doctor, tbl_gender, tbl_location where(tbl_doctor.g_id = tbl_gender.g_id and tbl_doctor.l_id = tbl_location.l_id) order by(doc_id) desc limit 3");
                $count = 0;
                while ($row = mysqli_fetch_array($select)) {
                    $count++;
                    ?>
                    <tr style="padding: 10px; background-color: #fff;">
                        <td style="padding: 10px">
                            <?php echo $count; ?>
                        </td>
                        <td style="padding: 10px">
                            <?php echo $row['doctor']; ?>
                        </td>
                        <td style="padding: 10px">
                            <?php echo $row['specialization']; ?>
                        </td>
                        <td style="padding: 10px">
                            <?php echo $row['gender']; ?>
                        </td>
                        <td style="padding: 10px">
                            <?php echo $row['location']; ?>
                        </td>
                        <td style="padding: 10px; text-align: center"><a
                                href="delete-doctor.php?doc=<?php echo $row['doc_id']; ?>"
                                onclick="return confirm('Are you sure you wanna delete <?php echo $row['doctor']; ?>')">
                                Delete
                            </a>
                            <a href="update-doctor.php?doc=<?php echo $row['doc_id']; ?>">Update</a></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </center>
    </div>
</div>
<?php include 'includes/footer.php'; ?>