<?php include 'includes/header.php'; ?>
<div class="main">
    <div class="register">
        <div class="card">
            <div class="sideimg"></div>
            <div class="form">
                <center>
                    <h2>PATIENT REGISTRATION FORM</h2>
                    <hr>
                    <form action="#" method="post">
                        <input type="text" name="p_name" size="50%" id="">
                        <input type="text" name="contat" size="50%" id="">
                        <input type="number" name="age" size="50%" id="">
                        <select name="gender" id="">
                            <option value="">Select Gender</option>
                            <option value="">Female</option>
                            <option value="">Male</option>
                        </select>
                        <select name="location" id="">
                            <option value="">Select Location</option>
                            <option value="">Kabalagala</option>
                            <option value="">Nsambya</option>
                            <option value="">Makerere</option>
                        </select>
                        <select name="disease" id="">
                            <option value="">Select Disease</option>
                            <option value="">Malaria</option>
                            <option value="">Flu</option>
                            <option value="">Cough</option>
                        </select>
                        <select name="doctor" id="">
                            <option value="">Select Doctor</option>
                            <option value="">Maxim</option>
                            <option value="">Jenner</option>
                            <option value="">Kagheni</option>
                        </select>
                        <br>
                        <input type="submit" value="Register" class="btn1">
                        <input type="reset" value="Cancle" class="btn2">
                    </form>
                </center>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>