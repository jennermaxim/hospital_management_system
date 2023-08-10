<?php include 'includes/config.php';
$delete=mysqli_query($conn, "delete from tbl_staff where s_id='".$_GET['s']."'");
if($delete) {
    header('location:add-staff.php');
}else{
    echo "<span class='delete'>Failed to delete</span>";
}
?>