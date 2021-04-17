<?php

error_reporting(0);
ini_set('display_errors', 0);

$host = 'localhost';
$user = 'root';
$pass = 'toor';
$flag = 'RST{8d288f354069331fc1473f373a012d49a3f203003f03dd4d2b2404153a147c2f}';

$conn = new mysqli($host, $user, $pass);
mysqli_select_db ($conn, 'chall');

?>
