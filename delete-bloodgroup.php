<?php
include 'includes/config.php';
$delete = mysqli_query($conn, "DELETE FROM tbl_bloodgroup WHERE bloodgroup_id = '" . $_GET['bg'] . "'");
if ($delete) {
    header('location:add-bloodgroup.php');
} else {
    echo "<span class='error'>Failed to delete bloodgroup...!</span>";
}