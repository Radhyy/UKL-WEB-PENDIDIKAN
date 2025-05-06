<?php
$host = "localhost"; // Server database (biasanya "localhost")
$user = "root"; // Username MySQL (default: "root" untuk XAMPP)
$pass = ""; // Password MySQL (kosong jika default XAMPP)
$db   = "crud_admin"; // Nama database yang digunakan

// Membuat koneksi ke database
$conn = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
