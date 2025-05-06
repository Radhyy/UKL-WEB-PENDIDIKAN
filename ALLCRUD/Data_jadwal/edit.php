<?php
include 'config.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM jadwal_pelajaran WHERE id=$id");
$row = mysqli_fetch_assoc($data);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_pelajaran = $_POST['id_pelajaran'];
    $hari = $_POST['hari'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_selesai = $_POST['jam_selesai'];

    $sql = "UPDATE jadwal_pelajaran 
            SET id_pelajaran='$id_pelajaran', hari='$hari', jam_mulai='$jam_mulai', jam_selesai='$jam_selesai'
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

$pelajaran = mysqli_query($conn, "SELECT * FROM mata_pelajaran");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Jadwal</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="form-container">
        <h2>Edit Jadwal Pelajaran</h2>
        <form method="post">
            <div class="form-group">
                <label>Mata Pelajaran:</label>
                <select name="id_pelajaran" required>
                    <?php while ($p = mysqli_fetch_assoc($pelajaran)) { ?>
                        <option value="<?= $p['id'] ?>" <?= $p['id'] == $row['id_pelajaran'] ? 'selected' : '' ?>>
                            <?= $p['judul'] ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label>Hari:</label>
                <select name="hari" required>
                    <?php
                    $hariList = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'];
                    foreach ($hariList as $h) {
                        $selected = $h == $row['hari'] ? 'selected' : '';
                        echo "<option value='$h' $selected>$h</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label>Jam Mulai:</label>
                <input type="time" name="jam_mulai" value="<?= $row['jam_mulai'] ?>" required>
            </div>

            <div class="form-group">
                <label>Jam Selesai:</label>
                <input type="time" name="jam_selesai" value="<?= $row['jam_selesai'] ?>" required>
            </div>

            <button type="submit" class="btn-submit">Update</button>
            <a href="index.php" class="btn-back">← Kembali</a>
        </form>
    </div>
</body>
</html>
