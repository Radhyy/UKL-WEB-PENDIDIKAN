<?php
$koneksi = new mysqli("localhost", "root", "", "ujian_kenaikan_level");
$data = $koneksi->query("SELECT * FROM video_bindo");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Data Siswa</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<body>
<div class="container">
  <div class="sidebar" id="sidebar">
    <div class="logo">
      <h2 style="color: white;">CRUD Admin</h2>
    </div>
    <ul>
    <li><a href="/PROJECT_UKL/index.php">Dashboard</a></li>
      <li><a href="/PROJECT_UKL/ALLCRUD/Data_User/index.php">Data User</a></li>
      <li><a href="/PROJECT_UKL/ALLCRUD/Data_Siswa/index.php">Data Siswa</a></li>
      <li><a href="/PROJECT_UKL/ALLCRUD/Data_absensi/index.php">Data Kehadiran</a></li>
      <li><a href="/PROJECT_UKL/ALLCRUD/Data_Ulasan/index.php">Data Ulasan</a></li>
      <li><a href="/PROJECT_UKL/ALLCRUD/Data_jadwal/index.php">Data jadwal</a></li>
      <li><a href="/PROJECT_UKL/ALLCRUD/Data_Pelajaran/index.php">Data Pelajaran</a></li>
      <li><a href="/PROJECT_UKL/ALLCRUD/Data_Materi_Pkn/index.php">Data Materi Pkn</a></li>
      <li><a href="/PROJECT_UKL/ALLCRUD/Data_Vidio_Pkn/index.php">Data Vidio Pkn</a></li>
      <li><a href="/PROJECT_UKL/ALLCRUD/Data_Materi_Bindo/index.php">Data Materi BIndo</a></li>
      <li><a href="/PROJECT_UKL/ALLCRUD/Data_Vidio_Bindo/index.php">Data Vidio BIndo</a></li>
      <li><a href="/PROJECT_UKL/ALLCRUD/Data_Materi_Ipa/index.php">Data Materi Ipa</a></li>
      <li><a href="/PROJECT_UKL/ALLCRUD/Data_Vidio_Ipa/index.php">Data Vidio Ipa</a></li>
      <li><a href="/PROJECT_UKL/ALLCRUD/Data_Materi_Dp/index.php">Data Materi Dp</a></li>
      <li><a href="/PROJECT_UKL/ALLCRUD/Data_Vidio_Dp/index.php">Data Vidio Dp</a></li>
    </ul>
  </div>
  <div class="main-content">
    <button class="toggle-btn" onclick="toggleSidebar()">☰</button>
    <h1>Data Vidio ipa</h1>
    <a href="tambah.php" class="add-btn">Tambah</a>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Link Video</th>
          <th>Nama Guru</th>
          <th>Deskripsi</th>
          <th>Materi Ke</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = $data->fetch_assoc()): ?>
        <tr>
        <td><?= $row['id']; ?></td>
            <td><?= $row['youtube_link']; ?></td>
            <td><?= $row['guru_nama']; ?></td>
            <td><?= $row['deskripsi']; ?></td>
            <td><?= $row['materi_id']; ?></td>
          <td>
  <a href="edit.php?id=<?= $row['id'] ?>" class="icon-btn" title="Edit"><i class="fas fa-edit"></i></a>
  <a href="hapus.php?id=<?= $row['id'] ?>" class="icon-btn delete" title="Hapus" onclick="return confirm('Hapus data ini?')"><i class="fas fa-trash-alt"></i></a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</div>

<script>
function toggleSidebar() {
  document.getElementById("sidebar").classList.toggle("hidden");
}
</script>
</body>
</html>
