<?php include 'includes/header.php'; ?>
<div class="main">
    <?php include 'includes/sidebar.php'; ?>
    <div class="workspace">
        <center>
            <h1>ADD LOCATION</h1>
            <hr>
            <br>
            <?php
            if (isset($_POST['submit'])) {
                $location = $_POST['location'];
                $insert = mysqli_query($conn, "insert into tbl_location(l_id, location) values(null, '" . $location . "')");
                if ($insert) {
                    echo "<font color='green' size='10px'>Inserted Successfully!</font>";
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
                <th colspan="3" style="padding: 15px; background-color: aqua;">LIST OF ADDED LOCATION</th>
                <tr style="background-color: skyblue; padding: 10px">
                    <th style="padding: 10px">#</th>
                    <th style="padding: 10px">Location</th>
                    <th style="padding: 10px">Action</th>
                </tr>
                <?php
                $select = mysqli_query($conn, "select * from tbl_location order by(l_id) desc limit 3");
                while ($row = mysqli_fetch_array($select)) {
                    ?>
                    <tr style="padding: 10px; background-color: beige;">
                        <td style="padding: 10px">
                            <?php echo $row['l_id'] ?>
                        </td>
                        <td style="padding: 10px">
                            <?php echo $row['location'] ?>
                        </td>
                        <td style="padding: 10px; text-align: center"><a href="#">Delete</a> | <a href="#">Update</a></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </center>
    </div>
</div>
<?php include 'includes/footer.php'; ?>