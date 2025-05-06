<?php
session_start();
include 'config.php';

// Periksa apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT name, email FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    echo "User tidak ditemukan.";
    exit();
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya</title>
    <link rel="stylesheet" href="profile.css">
</head>
<body>
<div class="container">
    <div class="profile-content">
        <h2>Profil Saya</h2>
        <p><strong>Nama:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
        <div class="links">
    <a href="edit_profile.php" class="btn-edit">Edit Profil</a>
    <a href="/PROJECT_UKL/siswa/dashboard.php" class="btn-biodata">Lihat Biodata</a>
    <a href="logout.php" class="btn-logout">Logout</a>
    <a href="/PROJECT_UKL/index.php">Ke beranda</a>
        </div>
    </div>
</div>
</body>
</html>
