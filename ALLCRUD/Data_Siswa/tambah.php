<?php
session_start();
include 'config.php';

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

    $stmt = $conn->prepare("INSERT INTO siswa (user_id, nama, alamat, nisn, kelas) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $user_id, $nama, $alamat, $nisn, $kelas);

    if ($stmt->execute()) {
        header("Location: /PROJECT_UKL/cruduser/profile.php");
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
    <title>Isi Biodata</title>
    <link rel="stylesheet" href="style2.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div class="main-content">
    <div class="form-container">
        <h2>Isi Biodata</h2>

        <?php if (!empty($error_message)) : ?>
            <p class="error"><?= $error_message ?></p>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label>Nama:</label>
                <input type="text" name="nama" required>
            </div>

            <div class="form-group">
                <label>Alamat:</label>
                <textarea name="alamat" required></textarea>
            </div>

            <div class="form-group">
                <label>NISN:</label>
                <input type="text" name="nisn" required>
            </div>

            <div class="form-group">
                <label>Kelas:</label>
                <input type="text" name="kelas" required>
            </div>

            <button type="submit" class="btn-submit">Simpan</button>
            <a href="index.php" class="btn-back">← Kembali</a>
        </form>
    </div>
</div>

</body>
</html>
