<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];


    // Simpan ke database
    $sql = "INSERT INTO materi_bindo (id, youtube_link, guru_nama, deskripsi)
            VALUES ('$id', '$judul, '$deskripsi')";

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
                <input type="text" name="judul" required>
            </div>

            <div class="form-group">
                <label>Deskripsi:</label>
                <textarea name="deskripsi" required></textarea>
            </div>

            <button type="submit" class="btn-submit">Simpan</button>
            <a href="index.php" class="btn-back">← Kembali</a>
        </form>
    </div>
</body>
</html>
