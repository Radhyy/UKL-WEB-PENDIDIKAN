<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi</title>
    <link rel="stylesheet" href="dark_theme.css">
</head>
<body>
    <div class="container">
        <h2>Form Absensi</h2>
        <form action="process.php" method="post">
            <label>Nama Siswa:</label>
            <input type="text" name="nama_siswa" required>
            
            <label>Email:</label>
            <input type="email" name="email" required>
            
            <label>Tanggal:</label>
            <input type="date" name="tanggal" required>
            
            <label>Status:</label>
            <select name="status" required>
                <option value="Hadir">Hadir</option>
                <option value="Sakit">Sakit</option>
                <option value="Izin">Izin</option>
                <option value="Alfa">Alfa</option>
            </select>
            
            <button type="submit">Simpan</button>
        </form>
    </div>
</body>
</html>
