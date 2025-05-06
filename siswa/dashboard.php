<?php
session_start();
include 'config.php';

// Periksa apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: /cruduser/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Ambil biodata user yang sedang login
$sql = "SELECT id, nama, alamat, nisn, kelas FROM siswa WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$biodata = $result->fetch_assoc();

// Jika biodata belum diisi, arahkan ke halaman biodata
if (!$biodata) {
    header("Location: biodata.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Biodata</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <div class="container">
        <h2>Dashboard Biodata</h2>
        <p><strong>Nama:</strong> <?php echo htmlspecialchars($biodata['nama']); ?></p>
        <p><strong>Alamat:</strong> <?php echo htmlspecialchars($biodata['alamat']); ?></p>
        <p><strong>NISN:</strong> <?php echo htmlspecialchars($biodata['nisn']); ?></p>
        <p><strong>Kelas:</strong> <?php echo htmlspecialchars($biodata['kelas']); ?></p>
        
        <div class="links">
            <!-- Pastikan edit.php menerima ID dengan parameter -->
            <a href="/PROJECT_UKL/siswa/edit.php?id=<?= $biodata['id']; ?>" class="beranda">Edit Biodata</a>
            <a href="/PROJECT_UKL/cruduser/profile.php" class="beranda">Kembali ke Profil</a>
        </div>
    </div>
</body>
</html>
