<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Absensi</title>
    <link rel="stylesheet" href="style2.css"> <!-- Pastikan file ini tersedia -->
</head>
<body>
<div class="form-container">
    <h2>Tambah Data Kehadiran</h2>
    <form method="post">
        <div class="form-group">
            <label>Nama Siswa:</label>
            <input type="text" name="nama_siswa" placeholder="Nama Siswa" required>
        </div>

        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" placeholder="Email" required>
        </div>

        <div class="form-group">
            <label>Tanggal:</label>
            <input type="date" name="tanggal" required>
        </div>

        <div class="form-group">
            <label>Status:</label>
            <select name="status" required>
                <option value="Hadir">Hadir</option>
                <option value="Izin">Izin</option>
                <option value="Sakit">Sakit</option>
                <option value="Alfa">Alfa</option>
            </select>
        </div>

        <button type="submit" name="submit" class="btn-submit">Simpan</button>
        <a href="index.php" class="btn-back">← Kembali</a>
    </form>
</div>

<?php
if (isset($_POST['submit'])) {
    $nama = $_POST['nama_siswa'];
    $email = $_POST['email'];
    $tanggal = $_POST['tanggal'];
    $status = $_POST['status'];

    mysqli_query($koneksi, "INSERT INTO kehadiran (nama_siswa, email, tanggal, status)
                            VALUES ('$nama', '$email', '$tanggal', '$status')");
    header("Location: index.php");
}
?>
</body>
</html>
