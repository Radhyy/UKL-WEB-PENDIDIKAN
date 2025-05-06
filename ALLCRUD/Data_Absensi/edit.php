<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM kehadiran WHERE id_absensi=$id");
$row = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Absensi</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
<div class="form-container">
    <h2>Edit Data Kehadiran</h2>
    <form method="post">
        <div class="form-group">
            <label>Nama Siswa:</label>
            <input type="text" name="nama_siswa" value="<?= $row['nama_siswa'] ?>" required>
        </div>

        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" value="<?= $row['email'] ?>" required>
        </div>

        <div class="form-group">
            <label>Tanggal:</label>
            <input type="date" name="tanggal" value="<?= $row['tanggal'] ?>" required>
        </div>

        <div class="form-group">
            <label>Status:</label>
            <select name="status" required>
                <option value="Hadir" <?= $row['status'] == 'Hadir' ? 'selected' : '' ?>>Hadir</option>
                <option value="Izin" <?= $row['status'] == 'Izin' ? 'selected' : '' ?>>Izin</option>
                <option value="Sakit" <?= $row['status'] == 'Sakit' ? 'selected' : '' ?>>Sakit</option>
                <option value="Alfa" <?= $row['status'] == 'Alfa' ? 'selected' : '' ?>>Alfa</option>
            </select>
        </div>

        <button type="submit" name="update" class="btn-submit">Update</button>
        <a href="index.php" class="btn-back">← Kembali</a>
    </form>
</div>

<?php
if (isset($_POST['update'])) {
    $nama = $_POST['nama_siswa'];
    $email = $_POST['email'];
    $tanggal = $_POST['tanggal'];
    $status = $_POST['status'];

    mysqli_query($koneksi, "UPDATE kehadiran SET 
        nama_siswa='$nama', 
        email='$email', 
        tanggal='$tanggal', 
        status='$status' 
        WHERE id_absensi=$id");

    header("Location: index.php");
}
?>
</body>
</html>
