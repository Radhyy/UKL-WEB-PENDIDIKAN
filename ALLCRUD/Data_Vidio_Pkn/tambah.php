<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $youtube_link = $_POST['youtube_link'];
    $guru_nama = $_POST['guru_nama'];
    $deskripsi = $_POST['deskripsi'];
    $materi_id = $_POST['materi_id'];

    // Validasi materi_id harus antara 1-7
    if ($materi_id < 1 || $materi_id > 7) {
        echo "❌ ID Materi harus di antara 1 sampai 7.";
        exit();
    }

    // Cek apakah materi_id sudah digunakan
    $check_materi = $conn->query("SELECT materi_id FROM video_pkn WHERE materi_id='$materi_id'");
    if ($check_materi->num_rows > 0) {
        echo "❌ ID Materi sudah digunakan. Pilih ID lain antara 1–7.";
        exit();
    }

    // Simpan ke database
    $sql = "INSERT INTO video_pkn (id, youtube_link, guru_nama, deskripsi, materi_id)
            VALUES ('$id', '$youtube_link', '$guru_nama', '$deskripsi', '$materi_id')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "❌ Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Video Pembelajaran</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="form-container">
        <h2>Tambah Video Pembelajaran</h2>
        <form method="post">

            <div class="form-group">
                <label>Link Youtube:</label>
                <input type="text" name="youtube_link" required>
            </div>

            <div class="form-group">
                <label>Nama Guru:</label>
                <input type="text" name="guru_nama" required>
            </div>

            <div class="form-group">
                <label>Deskripsi:</label>
                <textarea name="deskripsi" required></textarea>
            </div>

            <div class="form-group">
                <label>ID Materi (1 - 7):</label>
                <input type="number" name="materi_id" min="1" max="7" required>
            </div>

            <button type="submit" class="btn-submit">Simpan</button>
            <a href="index.php" class="btn-back">← Kembali</a>
        </form>
    </div>
</body>
</html>
