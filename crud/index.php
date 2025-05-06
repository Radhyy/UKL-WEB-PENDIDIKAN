<?php
include 'config.php';
$result = $conn->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Admin</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <h2>Data User</h2>
    <a href="create.php" class="btn-tambah">+ Tambah Data</a>
    <a href="/PROJECT_UKL/index.php" class="btn-page">Beranda</a>
    <a href="/PROJECT_UKL/crud_siswa/index.php" class="btn-siswa">CRUD Siswa</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['email'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id']; ?>" class="btn-aksi btn-edit">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="delete.php?id=<?= $row['id']; ?>" class="btn-aksi btn-hapus" onclick="return confirm('Yakin ingin menghapus?');">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>