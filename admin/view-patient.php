<?php include 'includes/header.php'; ?>
<div class="main">
    <?php include 'includes/sidebar.php'; ?>
    <div class="workspace">
        <center>
            <h1>WIEW PATIENT</h1>
            <hr>
            <table width="80%" border="2px" style="border-collapse: collapse; margin-top: 20px;">
                <th colspan="9" style="padding: 15px; background-color: #fff;">LIST OF ALL PATIENTS</th>
                <tr style="background-color: rgb(229, 224, 224); padding: 10px">
                    <th style="padding: 10px">#</th>
                    <th style="padding: 10px">Patient</th>
                    <th style="padding: 10px">Contact</th>
                    <th style="padding: 10px">Age</th>
                    <th style="padding: 10px">Gender</th>
                    <th style="padding: 10px">Location</th>
                    <th style="padding: 10px">Disease</th>
                    <th style="padding: 10px">Doctor</th>
                    <th style="padding: 10px">Action</th>
                </tr>
                <?php
                $select = mysqli_query($conn, "select * from tbl_patient, tbl_gender, tbl_location, tbl_disease, tbl_doctor where(tbl_patient.g_id = tbl_gender.g_id and tbl_patient.l_id = tbl_location.l_id and tbl_patient.d_id = tbl_disease.d_id and tbl_patient.doc_id = tbl_doctor.doc_id) order by p_id desc");
                $count = 0;
                while ($row = mysqli_fetch_array($select)) {
                    $count++;
                    ?>
                    <tr style="padding: 10px; background-color: #fff;">
                        <td style="padding: 10px">
                            <?php echo $count; ?>
                        </td>
                        <td style="padding: 10px">
                            <?php echo $row['patient']; ?>
                        </td>
                        <td style="padding: 10px">
                            <?php echo $row['contact']; ?>
                        </td>
                        <td style="padding: 10px">
                            <?php echo $row['age']; ?>
                        </td>
                        <td style="padding: 10px">
                            <?php echo $row['gender']; ?>
                        </td>
                        <td style="padding: 10px">
                            <?php echo $row['location']; ?>
                        </td>
                        <td style="padding: 10px">
                            <?php echo $row['disease']; ?>
                        </td>
                        <td style="padding: 10px">
                            <?php echo $row['doctor']; ?>
                        </td>
                        <td style="padding: 10px; text-align: center;"><a
                                href="delete-patient.php?p=<?php echo $row['p_id']; ?>"
                                onclick="confirm('Are you sure you wanna delete <?php echo $row['patient']; ?>')">Delete</a>
                            <a href="update-patient.php?p=<?php echo $row['p_id']; ?>">Update</a>
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