<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "ujian_kenaikan_level"; // Menggunakan database crud_admin

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
