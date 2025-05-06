<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_siswa = $_POST['nama_siswa'];
    $email = $_POST['email'];
    $tanggal = $_POST['tanggal'];
    $status = $_POST['status'];

    $sql = "INSERT INTO kehadiran (nama_siswa, email, tanggal, status) VALUES ('$nama_siswa', '$email', '$tanggal', '$status')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Absensi berhasil disimpan!'); window.location.href='/PROJECT_UKL/absensi/berhasil.php';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan data!'); window.location.href='/PROJECT_UKL/absensi/form_absensi.php';</script>";
    }
}
?>
