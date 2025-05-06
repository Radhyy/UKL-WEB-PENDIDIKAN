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
    <link rel="stylesheet" href="edit.css">
</head>
<body>
    <div class="container">
        <h2>Edit Biodata Siswa</h2>
        <form method="post">
            <label>Nama:</label>
            <input type="text" name="nama" value="<?= $row['nama']; ?>" required>

            <label>Alamat:</label>
            <textarea name="alamat" required><?= $row['alamat']; ?></textarea>

            <label>NISN:</label>
            <input type="text" name="nisn" value="<?= $row['nisn']; ?>" required>

            <label>Kelas:</label>
            <input type="text" name="kelas" value="<?= $row['kelas']; ?>" required>

            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
