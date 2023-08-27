<?php session_start(); ?>
<?php
if (empty($_SESSION['login'])) {
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
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="assets/css/form.css" type="text/css">
    <link rel="stylesheet" href="assets/css/sidebar.css" type="text/css">
</head>

<body>
    <nav class="header">
        <div class="menu" onclick="displayMenu();"><img src="images/menu.png" alt="" width=30px></div>
        <div class="logo"><img src="images/logo.jpeg" alt="" width=250px></div>
        <div class="menutabs">
            <ul>
                <li id="profile">Admin</li>
            </ul>
        </div>
    </nav>
    <div class="profiledropdown" id="profiledropdown">
        <ul>
            <li><a href="#">Settings</a></li>
            <li><a href="logout.php">logout</a></li>
        </ul>
    </div>