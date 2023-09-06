<?php include 'includes/header.php'; ?>
<div class="main">
    <?php include 'includes/sidebar.php'; ?>
    <div class="workspace">
        <center>
            <h1>VIEW DOCTOR</h1>
            <hr>
            <br>
            <table width="80%" border="2px" style="border-collapse: collapse;">
                <tr style="background-color: #ddd; padding: 10px">
                    <th style="padding: 10px">#</th>
                    <th style="padding: 10px">Doctor</th>
                    <th style="padding: 10px">Specialization</th>
                    <th style="padding: 10px">Gender</th>
                    <th style="padding: 10px">Location</th>
                    <th style="padding: 10px">Action</th>
                </tr>
                <?php
                $select = mysqli_query($conn, "select * from tbl_doctor, tbl_gender, tbl_location where(tbl_doctor.g_id = tbl_gender.g_id and tbl_doctor.l_id = tbl_location.l_id) order by(doc_id) desc limit 3");
                $count = 0;
                while ($row = mysqli_fetch_array($select)) {
                    $count++;
                    ?>
                    <tr style="padding: 10px; background-color: #fff;">
                        <td style="padding: 10px">
                            <?php echo $count; ?>
                        </td>
                        <td style="padding: 10px">
                            <?php echo $row['doctor']; ?>
                        </td>
                        <td style="padding: 10px">
                            <?php echo $row['specialization']; ?>
                        </td>
                        <td style="padding: 10px">
                            <?php echo $row['gender']; ?>
                        </td>
                        <td style="padding: 10px">
                            <?php echo $row['location']; ?>
                        </td>
                        <td style="padding: 10px; text-align: center"><a
                                href="delete-doctor.php?doc=<?php echo $row['doc_id']; ?>"
                                onclick="return confirm('Are you sure you wanna delete <?php echo $row['doctor']; ?>')">
                                <img src="images/delete.png" alt="">
                            </a>
                            <a href="update-doctor.php?doc=<?php echo $row['doc_id']; ?>"><img src="images/write.png" alt=""></a></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </center>
    </div>
</div>
<?php include 'includes/footer.php'; ?>