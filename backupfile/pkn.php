<?php
include 'crud/config.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="pkn.css" />
    <title>PKN</title>
</head>
<body>
    <header class="header" id="home">
        <nav>
            <div class="nav__bar">
                <div class="logo nav__logo">
                    <a href="#">PPKN</a>
                </div>
                <ul class="nav__links" id="nav-links">
                    <li><a href="index.php">Back To home</a></li>
                </ul>
                <div class="nav__menu__btn" id="menu-btn">
                    <i class="ri-menu-line"></i>
                </div>
                <div class="nav__action__btn">
                    <button class="btn">
                        <span><i class="ri-user-line"></i></span> Account
                    </button>
                </div>
            </div>
        </nav>
        <div class="section__container header__container">
            <div class="header__content">
                <h3 class="section__subheader">PPKN</h3>
                <h1 class="section__header">
                    Pendidikan Pancasila dan Kewarganegaraan 
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
            $query = "SELECT * FROM materi_pkn";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                $materiCount = 1; 
                while ($row = $result->fetch_assoc()) {
                    echo '
                    <div class="about__image about__image-' . $materiCount . '" id="about"></div>
                    <div class="about__content about__content-' . $materiCount . '">
                        <h3 class="section__subheader">Materi ' . $materiCount . '</h3>
                        <h2 class="section__header">' . $row["judul"] . '</h2>
                        <p>' . $row["deskripsi"] . '</p>
                        <div class="about__btn">
                            <a href="' . $row["link"] . '">
                            Read more
                            <span><i class="ri-arrow-right-line"></i></span>
                            </a>
                        </div>
                    </div>';
                    $materiCount++;
                }
            } else {
                echo "<p>Belum ada materi tersedia.</p>";
            }
            $conn->close();
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
