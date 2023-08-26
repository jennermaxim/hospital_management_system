<?php include 'includes/header.php'; ?>
<?php
$error = "";
if (isset($_POST['submit'])) {
    $bloodgroup = $_POST['bloodgroup'];
    $update = mysqli_query($conn, "UPDATE tbl_bloodgroup SET bloodgroup = '" . $bloodgroup . "' WHERE bloodgroup_id = '" . $_GET['bg'] . "'");
    if ($update) {
        header('location:add-bloodgroup.php');
    } else {
        $error .= "<span class='error'>Failed to update bloodgroup...!</span>";
    }
}
?>
<div class="main dashboard">
    <?php include 'includes/sidebar.php' ?>
    <div class="workspace">
        <center>
            <h1>ADD BLOOD GROUP</h1>
            <hr>
            <?php
            $select = mysqli_query($conn, "SELECT * FROM tbl_bloodgroup WHERE bloodgroup_id = '" . $_GET['bg'] . "'");
            $rowb = mysqli_fetch_array($select);
            ?>
            <span class="error">
                <?php echo $error; ?>
            </span>
            <form method="post">
                <input type="text" name="bloodgroup" id="" value="<?php echo $rowb['bloodgroup']; ?>" autofocus
                    required>
                <input type="submit" name="submit" value="Update Blood Group" class="btn">
            </form>
        </center>
    </div>
</div>
<?php include 'includes/footer.php'; ?>