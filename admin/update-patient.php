<?php include 'includes/header.php'; ?>
<div class="main">
    <?php include 'includes/sidebar.php'; ?>
    <div class="workspace">
        <center>
            <h1>UPDATE PATIENT</h1>
            <hr>
            <?php
                    if(isset($_POST['submit'])){
                        $patient = $_POST['patient'];
                        $contact = $_POST['contact'];
                        $age = $_POST['age'];
                        $gender = $_POST['gender'];
                        $location = $_POST['location'];
                        $disease = $_POST['disease'];
                        $doctor = $_POST['doctor'];
                        $update = mysqli_query($conn, "update tbl_patient set patient = '".$patient."', contact = '".$contact."', age = '".$age."', g_id = '".$gender."', l_id = '".$location."', d_id = '".$disease."', doc_id = '".$doctor."' where p_id = '".$_GET['p']."'");
                        if($update){
                            header('location:view-patient.php');
                        } else {
                            echo "<span class='error'>Failed to Update...!</span>";
                        }
                    }

                    $select = mysqli_query($conn, "select * from tbl_patient, tbl_gender, tbl_location, tbl_disease, tbl_doctor where(tbl_patient.g_id = tbl_gender.g_id and tbl_patient.l_id = tbl_location.l_id and tbl_patient.d_id = tbl_disease.d_id and tbl_patient.doc_id = tbl_doctor.doc_id and p_id = '".$_GET['p']."')");
                    $row = mysqli_fetch_array($select);
                    ?>
                    <form method="post">
                        <input type="text" name="patient" size="50%" id="" autofocus value="<?php echo $row['patient']; ?>">
                        <input type="text" name="contact" size="50%" id="" value="<?php echo $row['contact']; ?>">
                        <input type="number" name="age" size="50%" id="" value="<?php echo $row['age']; ?>">
                        <select name="gender" id="">
                            <option value="<?php echo $row['g_id']; ?>"><?php echo $row['gender']; ?></option>
                            <?php
                            $select = mysqli_query($conn, "select * from tbl_gender");
                            while($rowg = mysqli_fetch_assoc($select)){
                                ?>
                                <option value="<?php echo $rowg['g_id']; ?>"><?php echo $rowg['gender']; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <select name="location" id="">
                            <option value="<?php echo $row['l_id']; ?>"><?php echo $row['location']; ?></option>
                            <?php
                            $select = mysqli_query($conn, "select * from tbl_location");
                            while($rowl = mysqli_fetch_assoc($select)){
                                ?>
                                <option value="<?php echo $rowl['l_id']; ?>"><?php echo $rowl['location']; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <select name="disease" id="">
                            <option value="<?php echo $row['d_id']; ?>"><?php echo $row['disease']; ?></option>
                            <?php
                            $select = mysqli_query($conn, "select * from tbl_disease");
                            while ($rowd = mysqli_fetch_assoc($select)){
                                ?>
                                <option value="<?php echo $rowd['d_id']; ?>"><?php echo $rowd['disease']; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <select name="doctor" id="">
                            <option value="<?php echo $row['doc_id']; ?>"><?php echo $row['doctor']; ?></option>
                            <?php
                            $select = mysqli_query($conn, "select * from tbl_doctor");
                            while ($rowdoc = mysqli_fetch_assoc($select)){
                                ?>
                                <option value="<?php echo $rowdoc['doc_id']; ?>"><?php echo $rowdoc['doctor']; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <br>
                        <input type="submit" value="Update Patient" name="submit" class="btn">
                        <!-- <input type="reset" value="Cancle" class="btn2"> -->
                    </form>
        </center>
    </div>
</div>
<?php include 'includes/footer.php'; ?>