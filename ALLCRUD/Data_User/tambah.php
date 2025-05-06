<?php
$koneksi = new mysqli("localhost", "root", "", "ujian_kenaikan_level");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $koneksi->query("INSERT INTO siswa (nama, email) VALUES ('$nama', '$email')");
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
        <label>Email:</label>
        <input type="email" name="email" placeholder="Email" required>
      </div>

      <button type="submit" class="btn-submit">Simpan</button>
      <a href="index.php" class="btn-back">← Kembali</a>
    </form>
  </div>

</body>
</html>
