<?php
include 'config.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM siswa WHERE id=$id");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $nisn = $_POST['nisn'];
    $kelas = $_POST['kelas'];

    $sql = "UPDATE siswa SET nama='$nama', alamat='$alamat', nisn='$nisn', kelas='$kelas' WHERE id=$id";
    
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
    <title>Edit Biodata</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="form-container">
        <h2>Edit Biodata Siswa</h2>
        <form method="post">
            <div class="form-group">
                <label>Nama:</label>
                <input type="text" name="nama" value="<?= $row['nama']; ?>" required>
            </div>

            <div class="form-group">
                <label>Alamat:</label>
                <textarea name="alamat" required><?= $row['alamat']; ?></textarea>
            </div>

            <div class="form-group">
                <label>NISN:</label>
                <input type="text" name="nisn" value="<?= $row['nisn']; ?>" required>
            </div>

            <div class="form-group">
                <label>Kelas:</label>
                <input type="text" name="kelas" value="<?= $row['kelas']; ?>" required>
            </div>

            <button type="submit" class="btn-submit">Update</button>
            <a href="index.php" class="btn-back">← Kembali</a>
        </form>
    </div>
</body>
</html>
