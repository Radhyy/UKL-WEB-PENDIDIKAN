<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>KIRIM ULASAN</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>KIRIM ULASAN</h2>
    <form action="process.php" method="post">
        <input type="text" name="nama" placeholder="Nama Anda" required><br>
        <textarea name="ulasan" placeholder="Tulis ulasan Anda" required></textarea><br>
        <button type="submit">Kirim</button>
    </form>
    <p><a href="http://localhost/PROJECT_UKL/ulasan/ulasan.php">Lihat Ulasan</a></p>
</body>
</html>