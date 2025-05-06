<?php
$host = "localhost";  
$user = "root";       
$pass = "";           
$dbname = "ujian_kenaikan_level"; 

$conn2 = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn2) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>