<?php
$koneksi = new mysqli("localhost", "root", "", "ujian_kenaikan_level");
$id = $_GET['id'];
$koneksi->query("DELETE FROM materi_dp WHERE id=$id");
header("Location: index.php");
