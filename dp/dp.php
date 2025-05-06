<?php
include 'config.php'; 

session_start();

$user_name = ""; 
$role = "";
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $query = mysqli_query($conn, "SELECT name, role FROM users WHERE id = '$user_id'");
    $user = mysqli_fetch_assoc($query);
    $user_name = htmlspecialchars($user['name']);
    $role = $user['role'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="ipa.css" />
    <title>PKN</title>
</head>
<body>
    <header class="header" id="home">
        <nav>
            <div class="nav__bar">
                <div class="logo nav__logo">
                    <a href="#">Dp</a>
                </div>
                <ul class="nav__links" id="nav-links">
                    <li><a href="/PROJECT_UKL/index.php">Back To home</a></li>
                </ul>
                <div class="nav__menu__btn" id="menu-btn">
                    <i class="ri-menu-line"></i>
                </div>
                <div class="nav__action__btn">
            <?php if ($user_name): ?>
                <div class="dropdown">
                    <button class="btn">
                        <span><i class="ri-user-line"></i> <?php echo $user_name; ?> </span>
                    </button>
                            <ul class="dropdown-content">
                        <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
                    <li><a href="/PROJECT_UKL/crud/index.php">CRUD</a></li> 
                <?php else: ?>
                    <li><a href="/PROJECT_UKL/profilbiodata/profil.php">Profil</a></li> 
                    <?php endif; ?>
                    <li><a href="/PROJECT_UKL/cruduser/logout.php">Logout</a></li>
                </ul>
                </div>
                    <?php else: ?>
                        <button class="btn">
                            <span><i class="ri-user-line"></i></span> 
                                <ul>
                            <li><a href="/PROJECT_UKL/cruduser/login.php">Login</a></li>
                        </ul>
                    </button>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
        <div class="section__container header__container">
            <div class="header__content">
                <h3 class="section__subheader">DP</h3>
                <h1 class="section__header">
                    Dasar pemrograman
                </h1>
                <div class="scroll__btn">
                    <a href="#about">
                        Scroll down
                        <span><i class="ri-arrow-down-line"></i></span>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <section class="about">
    <div class="section__container about__container">
        <?php
        $query = "SELECT * FROM materi_dp";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $materiCount = 1;
            while ($row = $result->fetch_assoc()) {
                echo '
                <div class="about__image about__image-' . $materiCount . '" id="about"></div>
                <div class="about__content about__content-' . $materiCount . '">
                    <h3 class="section__subheader">Materi ' . $materiCount . '</h3>
                    <br><br> <!-- Jarak antara "Materi X" dan judul -->
                    <h2 class="section__header">' . $row["judul"] . '</h2>
                    <br> <!-- Jarak antara judul dan deskripsi -->
                    <p>' . $row["deskripsi"] . '</p>
                    <br><br> <!-- Jarak antara deskripsi dan tombol -->
                    <div class="about__btn">';

                // Ambil video berdasarkan materi_id
                $materi_id = $row["id"];
                $videoQuery = "SELECT youtube_link FROM video_dp WHERE materi_id = $materi_id LIMIT 1";
                $videoResult = $conn->query($videoQuery);

                if ($videoResult->num_rows > 0) {
                    $videoRow = $videoResult->fetch_assoc();
                    echo '<a href="video.php?link=' . urlencode($videoRow["youtube_link"]) . '">
                            Watch Video
                            <span><i class="ri-play-circle-line"></i></span>
                        </a>';
                } else {
                    echo '<a href="#" class="no-video">
                            No Video Available
                            <span><i class="ri-close-line"></i></span>
                        </a>';
                }

                echo '</div>
                <br><br> <!-- Jarak antara setiap materi -->
                </div>';
                $materiCount++;
            }
        } else {
            echo "<p>Belum ada materi tersedia.</p>";
        }
        ?>
    </div>
</section>




    <footer class="footer">
        <div class="section__container footer__container">
            <div class="footer__col">
                <div class="logo footer__logo">
                    <a href="#">Belajarmaju.com</a>
                </div>
                <p>Get out there & discover your next slope, mountains & destination!</p>
            </div>
            <div class="footer__col">
                <h4>More on The Blog</h4>
                <ul class="footer__links">
                    <li><a href="https://wa.me/qr/H2TDH2F6K4YJN1">Contact Us</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="footer__col">
                <h4>More on Belajarmaju</h4>
                <ul class="footer__links">
                    <li><a href="http://localhost/PROJECT_UKL/ulasan/index.php">Ulasan</a></li>
                    <li><a href="#">CRUD</a></li>
                </ul>
            </div>
        </div>
        <div class="footer__bar">
            Copyright © 2024 Web Pendidikan Non Formal. All rights reserved.
        </div>
    </footer>
</body>
</html>
