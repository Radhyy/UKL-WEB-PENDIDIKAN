<?php
session_start();
include 'config.php';

// Periksa apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Ambil data user saat ini
$sql = "SELECT name, email FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    echo "User tidak ditemukan.";
    exit();
}

// Proses update data jika form dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $update_sql = "UPDATE users SET name = ?, email = ? WHERE id = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("ssi", $name, $email, $user_id);

    if ($update_stmt->execute()) {
        echo "Profil berhasil diperbarui.";
        header("Refresh:1; url=profile.php");
    } else {
        echo "Terjadi kesalahan: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
    <link rel="stylesheet" href="edit_profile.css"> <!-- Pastikan file CSS sudah terhubung -->
</head>
<body>
    <div class="container">
        <h2>Edit Profil</h2>
        <form method="POST">
            <label>Nama:</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>

            <label>Email:</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>

            <button type="submit">Simpan Perubahan</button>
        </form>
        <a href="/PROJECT_UKL/profilbiodata/profil.php" class="back-link">Kembali</a>
    </div>
</body>
</html>
