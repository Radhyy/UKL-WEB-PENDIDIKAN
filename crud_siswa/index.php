<?php
include 'config.php';

// Ambil data siswa dari database
$result = $conn->query("SELECT * FROM siswa");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Biodata Siswa</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>

    <h2>Daftar Siswa</h2>
    
    <!-- Tombol Tambah Siswa & Data User -->
    <div class="button-group">
        <a href="/PROJECT_UKL/siswa/biodata.php" class="btn tambah">
            <i class="fas fa-user-plus"></i> Tambah Siswa
        </a>  
        <a href="/PROJECT_UKL/crud/index.php" class="btn user">
            <i class="fas fa-users"></i> Data User
        </a>  
    </div>

    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>NISN</th>
            <th>Kelas</th>
            <th>Aksi</th>
        </tr>
        <?php $no = 1; while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['alamat']; ?></td>
            <td><?= $row['nisn']; ?></td>
            <td><?= $row['kelas']; ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id']; ?>" class="btn aksi edit" title="Edit">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="delete.php?id=<?= $row['id']; ?>" class="btn aksi hapus" title="Hapus" onclick="return confirm('Yakin ingin hapus?')">
                    <i class="fas fa-trash"></i>
                </a>
            </td>
        </tr>
        <?php } ?>
    </table>

</body>
</html>
