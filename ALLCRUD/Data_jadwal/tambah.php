<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_pelajaran = $_POST['id_pelajaran'];
    $hari = $_POST['hari'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_selesai = $_POST['jam_selesai'];

    $sql = "INSERT INTO jadwal_pelajaran (id_pelajaran, hari, jam_mulai, jam_selesai)
            VALUES ('$id_pelajaran', '$hari', '$jam_mulai', '$jam_selesai')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

// Ambil data mata pelajaran
$pelajaran = mysqli_query($conn, "SELECT * FROM mata_pelajaran");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Jadwal</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="form-container">
        <h2>Tambah Jadwal Pelajaran</h2>
        <form method="post">
            <div class="form-group">
                <label>Mata Pelajaran:</label>
                <select name="id_pelajaran" required>
                    <option value="">-- Pilih --</option>
                    <?php while ($row = mysqli_fetch_assoc($pelajaran)) { ?>
                        <option value="<?= $row['id'] ?>"><?= $row['judul'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label>Hari:</label>
                <select name="hari" required>
                    <option value="">-- Pilih Hari --</option>
                    <?php
                    $hariList = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'];
                    foreach ($hariList as $h) echo "<option value='$h'>$h</option>";
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label>Jam Mulai:</label>
                <input type="time" name="jam_mulai" required>
            </div>

            <div class="form-group">
                <label>Jam Selesai:</label>
                <input type="time" name="jam_selesai" required>
            </div>

            <button type="submit" class="btn-submit">Simpan</button>
            <a href="index.php" class="btn-back">← Kembali</a>
        </form>
    </div>
</body>
</html>
