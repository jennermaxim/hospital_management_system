<?php include 'includes/header.php'; ?>
<div class="main">
    <?php include 'includes/sidebar.php'; ?>
    <div class="workspace">
        <center>
            <h1>ADD DOCTOR</h1>
            <hr>
            <form action="#" method="post">
                <input type="text" name="doctor" id="">
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
                <input type="submit" value="Add Doctor" class="btn">
            </form>
        </center>
    </div>
</div>
<?php include 'includes/footer.php'; ?>
