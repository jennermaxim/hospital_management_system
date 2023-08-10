<?php include 'includes/header.php'; ?>
<div class="main">
    <?php include 'includes/sidebar.php'; ?>
    <div class="workspace">
        <center>
            <h1>ADD LOCATION</h1>
            <hr>
            <?php
            if (isset($_POST['submit'])) {
                $location = $_POST['location'];
                $insert = mysqli_query($conn, "insert into tbl_location(l_id, location) values(null, '" . $location . "')");
                if ($insert) {
                    echo "<span class='success'>Inserted Successfully!</span>";
                } else {
                    echo "<font color='red' size='10px'>Failed to insert...!</font>" /* .mysqli_error($conn) */;
                }
            }
            ?>
            <form method="post">
                <input type="text" name="location" id="" autofocus required placeholder="Enter Location">
                <input type="submit" value="Add Location" name="submit" class="btn">
            </form>
            <br>
            <table width="80%" border="2px" style="border-collapse: collapse;">
                <th colspan="3" style="padding: 15px; background-color: #fff;">LIST OF ADDED LOCATION</th>
                <tr style="background-color: rgb(229, 224, 224); padding: 10px">
                    <th style="padding: 10px">#</th>
                    <th style="padding: 10px">Location</th>
                    <th style="padding: 10px">Action</th>
                </tr>
                <?php
                $select = mysqli_query($conn, "select * from tbl_location order by(l_id) desc limit 3");
                $count = 0;
                while ($row = mysqli_fetch_array($select)) {
                    $count++;
                    ?>
                    <tr style="padding: 10px; background-color: #fff;">
                        <td style="padding: 10px">
                            <?php echo $count; ?>
                        </td>
                        <td style="padding: 10px">
                            <?php echo $row['location']; ?>
                        </td>
                        <td style="padding: 10px; text-align: center">
                            <a href="delete-location.php?l=<?php echo $row['l_id']; ?>"
                                onclick="return confirm('Are you sure you wanna delete <?php echo $row['location']; ?>');">
                                Delete
                            </a>
                            <a href="update-location.php?l=<?php echo $row['l_id']; ?>">Update</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </center>
    </div>
</div>
<?php include 'includes/footer.php'; ?>