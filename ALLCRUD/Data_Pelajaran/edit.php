<?php
include 'config.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM mata_pelajaran WHERE id=$id");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = $_POST['gambar'];

    $sql = "UPDATE mata_pelajaran SET judul='$judul', deskripsi='$deskripsi', gambar='$gambar' WHERE id=$id";
    
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
    <title>Edit Pelajaran</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="form-container">
        <h2>Edit Pelajaran Siswa</h2>
        <form method="post">
            <div class="form-group">
                <label>Judul :</label>
                <input type="text" name="judul" value="<?= $row['judul']; ?>" required>            </div>

            <div class="form-group">
                <label>Deskripsi:</label>
                <textarea name="deskripsi" required><?= $row['deskripsi']; ?></textarea>
                </div>

            <div class="form-group">
                <label>Gambar :</label>
                <input type="text" name="gambar" value="<?= $row['gambar']; ?>" required>
                </div>

            <button type="submit" class="btn-submit">Update</button>
            <a href="index.php" class="btn-back">← Kembali</a>
        </form>
    </div>
</body>
</html>
