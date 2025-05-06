<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $nisn = $_POST['nisn'];
    $kelas = $_POST['kelas'];

    $sql = "INSERT INTO siswa (nama, alamat, nisn, kelas) VALUES ('$nama', '$alamat', '$nisn', '$kelas')";
    
    if ($conn->query($sql) === TRUE) {
        // Login otomatis setelah biodata disimpan
        $_SESSION['nisn'] = $nisn;
        header("Location: dashboard.php"); // Redirect ke halaman CRUD siswa sendiri
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
