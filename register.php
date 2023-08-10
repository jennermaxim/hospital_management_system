<?php include 'includes/header.php'; ?>
<div class="main">
    <div class="register">
        <div class="card">
            <div class="sideimg"></div>
            <div class="form">
                <center>
                    <h2>PATIENT REGISTRATION FORM</h2>
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
                        $insert = mysqli_query($conn, "insert into tbl_patient(p_id, patient, contact, age, g_id, l_id, d_id, doc_id) values(null, '".$patient."', '".$contact."', '".$age."', '".$gender."', '".$location."', '".$disease."', '".$doctor."')");
                        if($insert){
                            echo "<span class='success'>Insert Successfully!</span>";
                        } else {
                            echo "<span class='error'>Failed to Insert...!</span>";
                        }
                    }
                    ?>
                    <form method="post">
                        <input type="text" name="patient" size="50%" id="" autofocus placeholder="Enter Name">
                        <input type="text" name="contact" size="50%" id="" placeholder="Enter Contact">
                        <input type="number" name="age" size="50%" id="" placeholder="Enter age">
                        <select name="gender" id="">
                            <option value="">Select Gender</option>
                            <?php
                            $select = mysqli_query($conn, "select * from tbl_gender");
                            while($row = mysqli_fetch_assoc($select)){
                                ?>
                                <option value="<?php echo $row['g_id']; ?>"><?php echo $row['gender']; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <select name="location" id="">
                            <option value="">Select Location</option>
                            <?php
                            $select = mysqli_query($conn, "select * from tbl_location");
                            while($row = mysqli_fetch_assoc($select)){
                                ?>
                                <option value="<?php echo $row['l_id']; ?>"><?php echo $row['location']; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <select name="disease" id="">
                            <option value="">Select Disease</option>
                            <?php
                            $select = mysqli_query($conn, "select * from tbl_disease");
                            while ($row = mysqli_fetch_assoc($select)){
                                ?>
                                <option value="<?php echo $row['d_id']; ?>"><?php echo $row['disease']; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <select name="doctor" id="">
                            <option value="">Select Doctor</option>
                            <?php
                            $select = mysqli_query($conn, "select * from tbl_doctor");
                            while ($row = mysqli_fetch_assoc($select)){
                                ?>
                                <option value="<?php echo $row['doc_id']; ?>"><?php echo $row['doctor']; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <br>
                        <input type="submit" value="Register" name="submit" class="btn1">
                        <input type="reset" value="Cancle" class="btn2">
                    </form>
                </center>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>