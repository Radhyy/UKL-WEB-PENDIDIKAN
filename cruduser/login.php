<?php
include 'config.php';
session_start();

$error_message = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password, role FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $hashed_password, $role);
    $stmt->fetch();

    if ($stmt->num_rows > 0 && password_verify($password, $hashed_password)) {
        $_SESSION['user_id'] = $id;
        $_SESSION['role'] = $role; // Simpan role ke session

        if ($role == 'admin') {
            header("Location: /PROJECT_UKL/ALLCRUD/Data_Siswa/index.php"); // Redirect ke halaman admin
            exit();
        } else {
            // Cek apakah pengguna sudah mengisi biodata
            $stmt = $conn->prepare("SELECT COUNT(*) FROM siswa WHERE user_id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->bind_result($count);
            $stmt->fetch();
            $stmt->close();

            if ($count > 0) {
                header("Location: /PROJECT_UKL/profilbiodata/profil.php"); // Jika biodata sudah diisi, masuk ke profile
            } else {
                header("Location: /PROJECT_UKL/siswa/biodata.php"); // Jika belum, masuk ke form biodata
            }
            exit();
        }
    } else {
        $error_message = "Email atau password salah."; // Simpan pesan error
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="auth.css">
    <title>Login</title>
</head>
<body>
    <div class="form-container">
        <h2>Login</h2>
        
        <?php if (!empty($error_message)) : ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>

        <form method="POST">
            <label>Email:</label>
            <input type="email" name="email" required>
            <label>Password:</label>
            <input type="password" name="password" required>
            <button type="submit" class="btn-auth">Login</button>
        </form>
        <p class="switch-link">Belum punya akun? <a href="register.php">Daftar di sini</a></p>
    </div>
</body>
</html>
