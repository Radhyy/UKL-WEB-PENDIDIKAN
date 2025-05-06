<?php
require 'config.php';

$youtube_link = isset($_GET['link']) ? $_GET['link'] : '';

$query = "SELECT youtube_link, guru_nama AS guru, deskripsi AS materi_deskripsi
          FROM video_ipa
          WHERE youtube_link = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param("s", $youtube_link);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

$video_id = "";
if ($data) {
    preg_match("/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/|v\/|shorts\/|live\/))([^?&]+)/", $data['youtube_link'], $matches);
    $video_id = $matches[1] ?? "";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Pembelajaran</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Video Pembelajaran</h1>
    
    <?php if ($video_id): ?>
        <iframe src="https://www.youtube.com/embed/<?php echo htmlspecialchars($video_id); ?>" allowfullscreen></iframe>
        
        <h3>👨‍🏫 Guru: <?php echo htmlspecialchars($data['guru']); ?></h3>
        <p>📌 <?php echo htmlspecialchars($data['materi_deskripsi']); ?></p>

    <?php else: ?>
        <p>Video tidak ditemukan.</p>
    <?php endif; ?>

    <a href="ipa.php" class="back-button">⬅ Kembali ke Daftar</a>
</div>


</body>
</html>
