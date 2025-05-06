<?php
include 'config.php';

$id = intval($_GET['id']);
$result = $conn->query("SELECT * FROM ulasan WHERE id = $id");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $ulasan = $_POST['ulasan'];
    $created_at = $_POST['created_at'];

    $stmt = $conn->prepare("UPDATE ulasan SET nama = ?, ulasan = ?, created_at = ? WHERE id = ?");
    $stmt->bind_param("sssi", $nama, $ulasan, $created_at, $id);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal mengedit data!";
    }
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>

<div class="form-container">
    <h2>Edit </h2>
    <form method="POST">
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" value="<?= $row['nama'] ?>" required>
        </div>

        <div class="form-group">
            <label>Ulasan:</label>
            <input type="text" name="ulasan" value="<?= $row['ulasan'] ?>" required>
        </div>

        <div class="form-group">
            <label>Di Buat Tanggal</label>
            <input type="datetime-local" name="created_at" value="<?= date('Y-m-d\TH:i', strtotime($row['created_at'])) ?>" required>
        </div>


        <button type="submit" class="btn-submit">Edit</button>
        <a href="index.php" class="btn-back">Kembali</a>
    </form>
</div>

</body>
</html>