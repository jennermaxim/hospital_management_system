<?php include 'includes/config.php';
$delete=mysqli_query($conn, "delete from tbl_location where l_id='".$_GET['l']."'");
if($delete) {
    header('location:add-location.php');
}else{
    echo "<span class='delete'>Failed to delete</span>";
}
?>