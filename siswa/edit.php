<?php
session_start();
include 'config.php';

// Pastikan user sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Pastikan ID ada di URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID tidak ditemukan!");
}

$id = intval($_GET['id']); // Pastikan ID adalah angka

// Ambil data siswa berdasarkan ID
$stmt = $conn->prepare("SELECT * FROM siswa WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
    die("Data siswa tidak ditemukan!");
}

// Jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $nisn = $_POST['nisn'];
    $kelas = $_POST['kelas'];

    // Update data siswa
    $stmt = $conn->prepare("UPDATE siswa SET nama = ?, alamat = ?, nisn = ?, kelas = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $nama, $alamat, $nisn, $kelas, $id);

    if ($stmt->execute()) {
        header("Location: dashboard.php"); // Redirect ke dashboard setelah update
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Biodata</title>
    <link rel="stylesheet" href="biodata.css">
</head>
<body>
    <div class="container">
        <h2>Edit Biodata Siswa</h2>
        <form method="post">
            <label>Nama:</label>
            <input type="text" name="nama" value="<?= htmlspecialchars($row['nama']); ?>" required>

            <label>Alamat:</label>
            <textarea name="alamat" required><?= htmlspecialchars($row['alamat']); ?></textarea>

            <label>NISN:</label>
            <input type="text" name="nisn" value="<?= htmlspecialchars($row['nisn']); ?>" required>

            <label>Kelas:</label>
            <input type="text" name="kelas" value="<?= htmlspecialchars($row['kelas']); ?>" required>

            <button type="submit" class="btn-update">Update</button>
            <a href="/PROJECT_UKL/profilbiodata/profil.php" class="btn-kembali">Kembali</a>
        </form>
    </div>
</body>
</html>
