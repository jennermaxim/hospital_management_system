<?php
include 'includes/config.php';
$delete = mysqli_query($conn, "delete from tbl_patient where p_id = '".$_GET['p']."'");
if ($delete){
    header('location:view-patient.php');
} else {
    echo "<span class='error'>Failed to Delete...!</span>";
}
?>