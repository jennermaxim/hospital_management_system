<?php include 'config.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="shortcut icon" href="images/favicon.jpeg" type="image/jpeg">
    <link rel="stylesheet" href="assests/css/style.css" type="text/css">
    <link rel="stylesheet" href="assests/css/form.css" type="text/css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <link rel="stylesheet" href="assests/css/sidebar.css">
</head>

<body>
    <nav class="header">
        <div class="menu" onclick="displayMenu();"><img src="images/menu.png" alt="" width=30px></div>
        <div class="logo"><img src="images/logo.jpeg" alt="" width=250px></div>
        <div class="menutabs">
            <ul>
                <!-- <li><a href="index.php">Home</a></li> -->
                <!-- <li><a href="register.php">Register</a></li> -->
                <li><a href="#">My Account</a>
                    <div class="subtub">
                        <ul>
                            <li><a href="#">Profile</a></li>
                            <li><a href="#">Profile</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>