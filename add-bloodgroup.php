<?php include 'includes/header.php'; ?>

<div class="main dashboard">
    <?php include 'includes/sidebar.php' ?>
    <div class="workspace">
        <center>
            <h1>ADD BLOOD GROUP</h1>
            <hr>
            <form method="post">
                <input type="text" name="bloodgroup" id="" autofocus required placeholder="Enter Blood Group">
                <input type="submit" name="submit" value="Add Blood Group" class="btn">
            </form>
        </center>
    </div>
</div>
<?php include 'includes/footer.php'; ?>