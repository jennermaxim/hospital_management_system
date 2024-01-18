<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'hospital_db');

// define('DB_HOST', 'sql211.ezyro.com');
// define('DB_USER', 'ezyro_35811796');
// define('DB_PASSWORD', 'CoDing@6Maxim');
// define('DB_NAME', 'ezyro_35811796_hms');

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);