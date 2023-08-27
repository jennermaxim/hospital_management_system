<?php include 'includes/header.php'; ?>
<div class="main">
    <?php include 'includes/sidebar.php'; ?>
    <div class="workspace">
        <center>
            <h1>WIEW EMPLOYEE</h1>
            <hr>
            <br>
            <div class="view-added view">
                <table>
                    <tr class="second-th">
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Contact</th>
                        <th>Gender</th>
                        <th>Location</th>
                        <th>Email</th>
                        <th>Title</th>
                        <th>Created Time</th>
                        <th>Updated Time</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $select = mysqli_query($conn, "select * from tbl_employee, tbl_gender, tbl_location, tbl_title where(tbl_employee.g_id = tbl_gender.g_id and tbl_employee.l_id = tbl_location.l_id and tbl_employee.title_id = tbl_title.title_id) order by employee_id desc");
                    $count = 0;
                    while ($rowe = mysqli_fetch_array($select)) {
                        $count++;
                        ?>
                        <tr>
                            <td>
                                <?php echo $count; ?>
                            </td>
                            <td>
                                <?php echo $rowe['fname']; ?>
                            </td>
                            <td>
                                <?php echo $rowe['lname']; ?>
                            </td>
                            <td>
                                <?php echo $rowe['contact']; ?>
                            </td>
                            <td>
                                <?php echo $rowe['gender']; ?>
                            </td>
                            <td>
                                <?php echo $rowe['location']; ?>
                            </td>
                            <td>
                                <?php echo $rowe['email']; ?>
                            </td>
                            <td>
                                <?php echo $rowe['title']; ?>
                            </td>
                            <td>
                                <?php echo $rowe['create_time']; ?>
                            </td>
                            <td>
                                <?php echo $rowe['update_time']; ?>
                            </td>
                            <td class="delet-update">
                                <a href="#"><img src="images/delete.png" alt=""></a>
                                <a href="#"><img src="images/write.png" alt=""></a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </center>
    </div>
</div>
<?php include 'includes/footer.php'; ?>