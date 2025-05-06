<?php
$koneksi = new mysqli("localhost", "root", "", "ujian_kenaikan_level");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama = $_POST['nama'];
  $ulasan = $_POST['ulasan'];
  $created_at = $_POST['created_at'];
  $koneksi->query("INSERT INTO ulasan (nama, ulasan, created_at) VALUES ('$nama', '$ulasan', '$created_at')");
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Siswa</title>
  <link rel="stylesheet" href="style2.css">
</head>
<body>

  <div class="form-container">
    <h2>Form Tambah Siswa</h2>
    <form method="POST">
      <div class="form-group">
        <label>Nama:</label>
        <input type="text" name="nama" placeholder="Nama" required>
      </div>

      <div class="form-group">
        <label>Ulasan :</label>
        <input type="text" name="ulasan" placeholder="ulasan" required>
      </div>

      <?php $now = date('Y-m-d\TH:i'); ?>
        <div class="form-group">
          <label>Di Buat Tanggal</label>
          <input type="datetime-local" name="created_at" value="<?= $now ?>" required>
        </div>


      <button type="submit" class="btn-submit">Simpan</button>
      <a href="index.php" class="btn-back">← Kembali</a>
    </form>
  </div>

</body>
</html>
