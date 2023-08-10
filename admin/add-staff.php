<?php include 'includes/header.php'; ?>
<div class="main">
    <?php include 'includes/sidebar.php'; ?>
    <div class="workspace workspacestaff">
        <center>
            <h1>ADD STAFF</h1>
            <hr>
            <?php
            if (isset($_POST['submit'])) {
                $staff = $_POST['staff'];
                $contact = $_POST['contact'];
                $title = $_POST['title'];
                $gender = $_POST['gender'];
                $location = $_POST['location'];
                $insert = mysqli_query($conn, "insert into tbl_staff(s_id, name, contact, title, g_id, l_id) values(null, '" . $staff . "', '" . $contact . "', '" . $title . "', '" . $gender . "', '" . $location . "')");
                if ($insert) {
                    echo "<span class='success'>Inserted Successfully</span>";
                } else {
                    echo "<span class='error'>Failed to insert...!</span>";
                }
            }
            ?>
            <form method="post">
                <input type="text" name="staff" id="" autofocus required placeholder="Enter Name">
                <input type="tel" name="contact" id="" placeholder="Enter Phone Number">
                <input type="text" name="title" id="" placeholder="Enter Title">
                <select name="gender" id="">
                    <option value="" name="gender">Select Gender</option>
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
                <input type="submit" value="Add Staff" name="submit" class="btn">
            </form>
            <br>
            <table width="80%" border="2px" style="border-collapse: collapse;">
                <th colspan="7" style="padding: 15px; background-color: #fff;">LIST OF ADDED STAFFS</th>
                <tr style="background-color: rgb(229, 224, 224); padding: 10px">
                    <th style="padding: 10px">#</th>
                    <th style="padding: 10px">Name</th>
                    <th style="padding: 10px">Contact</th>
                    <th style="padding: 10px">Title</th>
                    <th style="padding: 10px">Gender</th>
                    <th style="padding: 10px">Location</th>
                    <th style="padding: 10px">Action</th>
                </tr>
                <?php
                $select = mysqli_query($conn, "select * from tbl_staff, tbl_gender, tbl_location where(tbl_staff.g_id = tbl_gender.g_id and tbl_staff.l_id = tbl_location.l_id) order by(s_id) desc limit 3");
                $count = 0;
                while ($row = mysqli_fetch_array($select)) {
                    $count++;
                    ?>
                    <tr style="padding: 10px; background-color: #fff;">
                        <td style="padding: 10px">
                            <?php echo $count; ?>
                        </td>
                        <td style="padding: 10px">
                            <?php echo $row['name']; ?>
                        </td>
                        <td style="padding: 10px">
                            <?php echo $row['contact']; ?>
                        </td>
                        <td style="padding: 10px">
                            <?php echo $row['title']; ?>
                        </td>
                        <td style="padding: 10px">
                            <?php echo $row['gender']; ?>
                        </td>
                        <td style="padding: 10px">
                            <?php echo $row['location']; ?>
                        </td>
                        <td style="padding: 10px; text-align: center"><a
                                href="delete-staff.php?s=<?php echo $row['s_id']; ?>"
                                onclick="return confirm('Are you sure you wanna delete <?php echo $row['name']; ?>');">
                                Delete
                            </a>
                            <a href="update-staff.php?s=<?php echo $row['s_id']; ?>">Update</a></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </center>
    </div>
</div>
<?php include 'includes/footer.php'; ?>