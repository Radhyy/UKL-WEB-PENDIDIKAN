<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Ulasan</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>Daftar Ulasan</h2>
    <div class="ulasan-container">
        <?php
        $result = $conn->query("SELECT * FROM ulasan ORDER BY created_at DESC");
        while ($row = $result->fetch_assoc()): ?>
            <div class="ulasan">
                <strong><?php echo htmlspecialchars($row['nama']); ?></strong>
                <p><?php echo htmlspecialchars($row['ulasan']); ?></p>
                <small><?php echo $row['created_at']; ?></small>
            </div>
        <?php endwhile; ?>
    </div>
    <p><a href="http://localhost/PROJECT_UKL/index.php">Kembali</a></p>
</body>
</html>