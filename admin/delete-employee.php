<?php
include 'includes/config.php';
$delete = mysqli_query($conn, "DELETE FROM tbl_employee WHERE employee_id = '" . $_GET['em'] . "'");
if ($delete) {
    header('location:add-employee.php');
} else {
    echo "<span class='error'>Failed to delete...!</span>";
}
?>