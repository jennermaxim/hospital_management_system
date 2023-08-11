<?php include 'includes/header.php'; ?>
<div class="main">
    <?php include 'includes/sidebar.php'; ?>
    <div class="workspace">
        <center>
            <h1><?php echo $_SESSION['admin']; ?></h1>
            <hr>
            <h3><?php echo $_SESSION['email'] ?></h3>
            <h3><?php echo $_SESSION['contact'] ?></h3>
        </center>
    </div>
</div>
<?php include 'includes/footer.php'; ?>
