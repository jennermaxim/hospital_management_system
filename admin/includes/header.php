<?php session_start(); ?>
<?php
if(empty($_SESSION['login'])){
    header('location:index.php');
}
?>
<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="shortcut icon" href="images/favicon.jpeg" type="image/jpeg">
    <link rel="stylesheet" href="assests/css/style.css" type="text/css">
    <link rel="stylesheet" href="assests/css/form.css" type="text/css">
    <link rel="stylesheet" href="assests/css/sidebar.css" type="text/css">
</head>

<body>
    <nav class="header">
        <div class="logo"><img src="images/logo.png" alt="" width=20%></div>
        <div class="menutabs">
            <ul>
                <li><a href="#">Admin</a>
                    <div class="subtub">
                        <ul>
                            <li><a href="dashboard.php"><?php echo $_SESSION['admin']; ?></a></li>
                            <li><a href="logout.php" onclick="return confirm('We are sorry to see you leave...!');">Logout</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>