<?php
$koneksi = new mysqli("localhost", "root", "", "ujian_kenaikan_level");
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM  kehadiran WHERE id_absensi=$id");
header("Location: index.php");
