<?php
$password = "admin123"; // Password yang ingin di-hash
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

echo "Password yang sudah di-hash: " . $hashed_password;
?>
