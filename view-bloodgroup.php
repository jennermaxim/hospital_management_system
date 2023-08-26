<?php include 'includes/header.php'; ?>
<?php
if (isset($_POST['submit'])) {
    $bloodgroup = $_POST['bloodgroup'];
    $insert = mysqli_query($conn, "INSERT INTO tbl_bloodgroup (bloodgroup_id, bloodgroup) VALUES(null, '" . $bloodgroup . "')");
}
?>
<div class="main dashboard">
    <?php include 'includes/sidebar.php' ?>
    <div class="workspace">
        <center>
            <h1>VIEW BLOOD GROUP</h1>
            <hr>
            <br>
            <table>
                <th>#</th>
                <th>Blood Group</th>
                <th>Action</th>
                <?php
                $select = mysqli_query($conn, "SELECT * FROM tbl_bloodgroup");
                while ($rowb = mysqli_fetch_array($select)) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $rowb['bloodgroup_id']; ?>
                        </td>
                        <td>
                            <?php echo $rowb['bloodgroup']; ?>
                        </td>
                        <td class="delete-update">
                            <a href="delete-bloodgroup.php?bg=<?php echo $rowb['bloodgroup_id']; ?>"><img
                                    onclick="confirm('Are you sure you want to delete <?php echo $rowb['bloodgroup']; ?> Blood Group');"
                                    src="images/delete.png" alt=""></a>
                            <a href="update-bloodgroup.php?bg=<?php echo $rowb['bloodgroup_id']; ?>"><img
                                    src="images/pen.png" alt=""></a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </center>
    </div>
</div>
<?php include 'includes/footer.php'; ?>