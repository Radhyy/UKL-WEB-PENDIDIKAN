<?php
include 'config.php';

// Ambil ID dari URL
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM video_pkn WHERE id=$id");
$row = $result->fetch_assoc();

// Jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $youtube_link = $_POST['youtube_link'];
    $guru_nama = $_POST['guru_nama'];
    $deskripsi = $_POST['deskripsi'];
    $materi_id = $_POST['materi_id'];

    // Lakukan update data
    $sql = "UPDATE video_pkn 
            SET youtube_link='$youtube_link', guru_nama='$guru_nama', deskripsi='$deskripsi', materi_id='$materi_id' 
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Video Pembelajaran</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="form-container">
        <h2>Edit Video Pembelajaran</h2>
        <form method="post">

            <div class="form-group">
                <label>Link Youtube:</label>
                <input type="text" name="youtube_link" value="<?= $row['youtube_link']; ?>" required>
            </div>

            <div class="form-group">
                <label>Nama Guru:</label>
                <input type="text" name="guru_nama" value="<?= $row['guru_nama']; ?>" required>
            </div>

            <div class="form-group">
                <label>Deskripsi:</label>
                <textarea name="deskripsi" required><?= $row['deskripsi']; ?></textarea>
            </div>

            <div class="form-group">
                <label>ID Materi:</label>
                <input type="number" name="materi_id" value="<?= $row['materi_id']; ?>" required>
            </div>

            <button type="submit" class="btn-submit">Update</button>
            <a href="index.php" class="btn-back">← Kembali</a>
        </form>
    </div>
</body>
</html>
