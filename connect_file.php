<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "global_anytime";

// Create connection

//$con = mysql_connect('148.66.156.53','globwebmaster','Sunrise@35');
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
