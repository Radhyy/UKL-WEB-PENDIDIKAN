<?php
$koneksi = mysqli_connect("localhost", "root", "", "ujian_kenaikan_level");
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
