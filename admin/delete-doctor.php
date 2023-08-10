<?php
include 'includes/config.php';
$delete=mysqli_query($conn, "delete from tbl_doctor where doc_id = '".$_GET['doc']."'");
if ($delete){
    header('location:add-doctor.php');
} else{
    echo "<span class='delete'>Failed to delete!</span>";
}
?>