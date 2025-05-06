<?php
$host = "localhost";  // Sesuaikan dengan host database Anda
$user = "root";       // Username database
$pass = "";           // Password database
$dbname = "ujian_kenaikan_level"; // Ganti dengan nama database Anda

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
