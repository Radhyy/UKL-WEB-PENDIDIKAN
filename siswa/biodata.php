<?php
session_start();
include 'config.php';

// Periksa apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: /cruduser/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $nisn = $_POST['nisn'];
    $kelas = $_POST['kelas'];

    // Simpan biodata ke database
    $stmt = $conn->prepare("INSERT INTO siswa (user_id, nama, alamat, nisn, kelas) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $user_id, $nama, $alamat, $nisn, $kelas);

    if ($stmt->execute()) {
        // Setelah biodata disimpan, redirect ke halaman profil
        header("Location: /PROJECT_UKL/profilbiodata/profil.php");
        exit();
    } else {
        $error_message = "Gagal menyimpan biodata. Silakan coba lagi.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Isi Biodata</title>
    <link rel="stylesheet" href="biodata.css">
</head>
<body>
<div class="container">
    <h2>Isi Biodata</h2>

    <?php if (!empty($error_message)) : ?>
        <p class="error"><?php echo $error_message; ?></p>
    <?php endif; ?>

    <form method="POST">
        <label>Nama:</label>
        <input type="text" name="nama" required>
        
        <label>Alamat:</label>
        <textarea name="alamat" required></textarea>
        
        <label>NISN:</label>
        <input type="text" name="nisn" required>
        
        <label>Kelas:</label>
        <input type="text" name="kelas" required>

        <button type="submit">Simpan</button>
    </form>
</div>
</body>
</html>
