<?php include 'includes/header.php'; ?>
<?php
$indicator = "";
if (isset($_POST['submit'])) {
    $bloodgroup = $_POST['bloodgroup'];
    $insert = mysqli_query($conn, "INSERT INTO tbl_bloodgroup (bloodgroup_id, bloodgroup) VALUES(null, '" . $bloodgroup . "')");
    if ($insert) {
        $indicator .= "<span class='success'>Inserted Successfully...!</span>";
    } else {
        $indicator .= "<span class='error'>Failed to insert Blood Group...!</span>";
    }
}
?>
<div class="main dashboard">
    <?php include 'includes/sidebar.php' ?>
    <div class="workspace">
        <center>
            <h1>ADD BLOOD GROUP</h1>
            <hr>
            <?php echo $indicator; ?>
            <form method="post">
                <input type="text" name="bloodgroup" id="" autofocus required placeholder="Enter Blood Group">
                <input type="submit" name="submit" value="Add Blood Group" class="btn">
            </form>
            <br>
            <table>
                <th colspan="3">VIEW ADD BLOOD GROUP</th>
                <tr class="second-th">
                    <th>#</th>
                    <th>Blood Group</th>
                    <th>Action</th>
                </tr>
                <?php
                $select = mysqli_query($conn, "SELECT * FROM tbl_bloodgroup order by bloodgroup_id desc limit 3");
                $count = 0;
                while ($rowb = mysqli_fetch_array($select)) {
                    $count++;
                    ?>
                    <tr>
                        <td>
                            <?php echo $count; ?>
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