<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "ujian_kenaikan_level";
$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
