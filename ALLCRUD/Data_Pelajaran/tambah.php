<?php
session_start();
include 'config.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = $_POST['gambar'];

    $stmt = $conn->prepare("INSERT INTO mata_pelajaran (judul, deskripsi, gambar) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $judul, $deskripsi, $gambar);
    
    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        $error_message = "Gagal menyimpan . Silakan coba lagi.";
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

        <form method="post">
    <div class="form-group">
        <label>Judul:</label>
        <input type="text" name="judul" required>
    </div>

    <div class="form-group">
        <label>Deskripsi:</label>
        <textarea name="deskripsi" required></textarea>
    </div>

    <div class="form-group">
        <label>Gambar:</label>
        <input type="text" name="gambar" required>
    </div>

    <button type="submit" class="btn-submit">Simpan</button>
    <a href="index.php" class="btn-back">← Kembali</a>
</form>

        </form>
    </div>
</div>

</body>
</html>
