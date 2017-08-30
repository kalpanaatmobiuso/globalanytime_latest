<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "global_anytime";
// Create connection
//$servername = "148.66.156.53";
//$username = "globwebmaster";
//$password = "Sunrise@35";
//$dbname = "global_anytime";
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
?>
