<?php
include 'includes/config.php';
$delete = mysqli_query($conn, "DELETE FROM tbl_title WHERE title_id = '" . $_GET['title'] . "'");
if ($delete) {
    header('location:add-title.php');
} else {
    echo "<span class='error'>Failed to delete...!</span>";
}
?>