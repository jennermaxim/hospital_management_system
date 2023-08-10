<?php include 'includes/config.php';
$delete=mysqli_query($conn, "delete from tbl_disease where d_id='".$_GET['d']."'");
if($delete) {
    header('location:add-disease.php');
}else{
    echo "<span class='delete'>Failed to delete</span>";
}
?>