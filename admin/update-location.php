<?php include 'includes/header.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

 ?>
<div class="main">
    <?php include 'includes/sidebar.php'; ?>
    <div class="workspace">
        <center>
            <h1>UPDATE LOCATION</h1>
            <hr>
            <?php
            if (isset($_POST['submit'])) {
                $location = $_POST['location'];
                $update = mysqli_query($conn, "update tbl_location set location = '" . $location . "' where l_id = '".$_GET['l']."'");
                if ($update) {
                    header('location:add-location.php');
                } else {
                    echo "<font color='red' size='10px'>Failed to Update...!</font>" /* .mysqli_error($conn) */;
                }
            }
            ?>
            <?php
            $select = mysqli_query($conn, "select * from tbl_location where l_id='".$_GET['l']."'");
            $row = mysqli_fetch_array($select);
            ?>
            <form method="post">
                <input type="text" name="location" id="" autofocus required value="<?php echo $row['location']; ?>">
                <input type="submit" value="Update Location" name="submit" class="btn">
            </form>
        </center>
    </div>
</div>
<?php include 'includes/footer.php'; ?>