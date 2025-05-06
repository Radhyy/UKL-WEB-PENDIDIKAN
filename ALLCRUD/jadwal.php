<?php
$koneksi = new mysqli("localhost", "root", "", "ujian_kenaikan_level");
$query = $koneksi->query("SELECT jadwal_pelajaran.*, mata_pelajaran.judul 
    FROM jadwal_pelajaran 
    JOIN mata_pelajaran ON jadwal_pelajaran.id_pelajaran = mata_pelajaran.id");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jadwal Pelajaran</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
  <div class="main-content">
    <h1>Jadwal Pelajaran</h1>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Mata Pelajaran</th>
          <th>Hari</th>
          <th>Jam Mulai</th>
          <th>Jam Selesai</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; while ($row = $query->fetch_assoc()): ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $row['judul'] ?></td>
          <td><?= $row['hari'] ?></td>
          <td><?= $row['jam_mulai'] ?></td>
          <td><?= $row['jam_selesai'] ?></td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
