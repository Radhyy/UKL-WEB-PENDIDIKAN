<?php
session_start();
session_destroy(); // Hapus semua session
header("Location: /PROJECT_UKL/index.php"); // Redirect ke halaman login
exit();
?>
