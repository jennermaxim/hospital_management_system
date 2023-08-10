<?php include 'includes/header.php'; ?>
<div class="main">
    <?php include 'includes/sidebar.php'; ?>
    <div class="workspace">
        <center>
            <h1>UPDATE DISEASE</h1>
            <hr>
            <?php
            if (isset($_POST['submit'])) {
                $disease = $_POST['disease'];
                $update = mysqli_query($conn, "update tbl_disease set disease = '" . $disease . "' where d_id = '" . $_GET['d'] . "'");
                if ($update) {
                    header('location:add-disease.php');
                } else {
                    echo "<font color='red size='5px'>Failed to Update...!</font>";
                }
            }
            $select = mysqli_query($conn, "select * from tbl_disease where d_id = '" . $_GET['d'] . "'");
            $row = mysqli_fetch_array($select);
            ?>
            <form method="post">
                <input type="text" name="disease" id="" autofocus required value="<?php echo $row['disease']; ?>">
                <input type="submit" value="Update Disease" name="submit" class="btn">
            </form>
        </center>
    </div>
</div>
<?php include 'includes/footer.php'; ?>