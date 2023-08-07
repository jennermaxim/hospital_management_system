<?php
// error_reporting(0);
define('DB_HOST',"localhost");
define('DB_USER',"root");
define('DB_PASSWORD',"");
define('DB_NAME',"hospital_db");

$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
//  or die("Couldn't connect to database");
// if(mysqli_connect_errno($conn)){
//     echo "faile";
// }else{
//     echo "connected";
// }
?>