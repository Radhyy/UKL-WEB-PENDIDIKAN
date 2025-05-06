<?php
$host = "localhost";
$user = "root"; // Sesuaikan dengan username database
$pass = ""; // Sesuaikan dengan password database
$dbname = "ujian_kenaikan_level"; // Ganti dengan nama database Anda

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
