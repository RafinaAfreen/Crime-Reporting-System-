<?php 

$server = "localhost";
$user = "root";
$pass = "";
$database = "crime_report_system";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

?>