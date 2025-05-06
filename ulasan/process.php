<?php include 'db.php'; ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $conn->real_escape_string($_POST['nama']);
    $ulasan = $conn->real_escape_string($_POST['ulasan']);
    $query = "INSERT INTO ulasan (nama, ulasan) VALUES ('$nama', '$ulasan')";
    if ($conn->query($query) === TRUE) {
        header("Location: http://localhost/PROJECT_UKL/ulasan/ulasan.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>