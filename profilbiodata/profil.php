<?php 
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Ambil data profil
$sql_user = "SELECT name, email FROM users WHERE id = ?";
$stmt_user = $conn->prepare($sql_user);
$stmt_user->bind_param("i", $user_id);
$stmt_user->execute();
$result_user = $stmt_user->get_result();
$user = $result_user->fetch_assoc();

// Ambil data biodata
$sql_biodata = "SELECT id, nama, alamat, nisn, kelas FROM siswa WHERE user_id = ?";
$stmt_biodata = $conn->prepare($sql_biodata);
$stmt_biodata->bind_param("i", $user_id);
$stmt_biodata->execute();
$result_biodata = $stmt_biodata->get_result();
$biodata = $result_biodata->fetch_assoc();

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
    <title>Profil & Biodata</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <div class="card profile-card">
        <h2>Profil Saya</h2>
        <div class="info">
            <strong>Nama:</strong> <span><?= htmlspecialchars($user['name']); ?></span>
        </div>
        <div class="info">
            <strong>Email:</strong> <span><?= htmlspecialchars($user['email']); ?></span>
        </div>
        <div class="links">
            <a href="/PROJECT_UKL/cruduser/edit_profile.php" class="btn green">Edit Profil</a>
        </div>
    </div>

    <div class="card biodata-card">
        <h2>Biodata Saya</h2>
        <?php if ($biodata): ?>
            <div class="info">
                <strong>Nama:</strong> <span><?= htmlspecialchars($biodata['nama']); ?></span>
            </div>
            <div class="info">
                <strong>Alamat:</strong> <span><?= htmlspecialchars($biodata['alamat']); ?></span>
            </div>
            <div class="info">
                <strong>NISN:</strong> <span><?= htmlspecialchars($biodata['nisn']); ?></span>
            </div>
            <div class="info">
                <strong>Kelas:</strong> <span><?= htmlspecialchars($biodata['kelas']); ?></span>
            </div>
            <div class="links">
                <a href="/PROJECT_UKL/siswa/edit.php?id=<?= $biodata['id']; ?>" class="btn blue">Edit Biodata</a>
            </div>
        <?php else: ?>
            <p>Belum mengisi biodata.</p>
            <div class="links">
                <a href="/PROJECT_UKL/siswa/biodata.php" class="btn blue">Isi Biodata</a>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Tombol logout dan beranda di luar kotak -->
<div class="action-buttons">
    <a href="/PROJECT_UKL/cruduser/logout.php" class="btn red">Logout</a>
    <a href="/PROJECT_UKL/index.php" class="btn purple">Ke Beranda</a>
</div>

</body>
</html>
