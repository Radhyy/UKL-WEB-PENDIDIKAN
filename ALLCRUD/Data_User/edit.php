<?php
include 'config.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM users WHERE id = $id");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
    $stmt->bind_param("ssi", $name, $email, $id);

    if ($stmt->execute()) {
        header("Location: index.php");
    } else {
        echo "Gagal mengedit data!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>

<div class="form-container">
    <h2>Edit User</h2>
    <form method="POST">
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="name" value="<?= $row['name'] ?>" required>
        </div>

        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" value="<?= $row['email'] ?>" required>
        </div>
        <button type="submit" class="btn-submit">Edit</button>
        <a href="index.php" class="btn-back">Kembali</a>
    </form>
</div>

</body>
</html>