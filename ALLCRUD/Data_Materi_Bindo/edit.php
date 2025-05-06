<?php
include 'config.php';

// Ambil ID dari URL
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM materi_bindo WHERE id=$id");
$row = $result->fetch_assoc();

// Jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];

    // Lakukan update data
    $sql = "UPDATE materi_bindo
            SET judul='$judul', deskripsi='$deskripsi'
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
    <title>Edit Materi Pembelajaran</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="form-container">
        <h2>Edit Materi Pembelajaran</h2>
        <form method="post">

            <div class="form-group">
                <label>Link Youtube:</label>
                <input type="text" name="judul" value="<?= $row['judul']; ?>" required>
            </div>

            <div class="form-group">
                <label>Deskripsi:</label>
                <textarea name="deskripsi" required><?= $row['deskripsi']; ?></textarea>
            </div>

            <button type="submit" class="btn-submit">Update</button>
            <a href="index.php" class="btn-back">← Kembali</a>
        </form>
    </div>
</body>
</html>
