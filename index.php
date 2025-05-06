<?php
session_start();
include 'crud/config.php'; 

$user_name = ""; 
$role = "";
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $query = mysqli_query($conn, "SELECT name, role FROM users WHERE id = '$user_id'");
    $user = mysqli_fetch_assoc($query);
    $user_name = htmlspecialchars($user['name']);
    $role = $user['role'];
}

$result = mysqli_query($conn, "SELECT * FROM mata_pelajaran ");

$mapel = [];
while ($row = mysqli_fetch_assoc($result)) {
    $mapel[] = $row;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css"
        rel="stylesheet">
        <link rel="stylesheet" href="style.css">
    <title>PROJECT | PENDIDIKAN NON FORMAL</title>
</head>
<body>
    <header class="header" id="home">
        <nav>
            <div class="nav__bar">
                <div class="logo nav__logo">
                <a href="#">Belajarmaju.com</a>
            </div>
            <ul class="nav__links" id="nav-links">
                <li><a href="/PROJECT_UKL/about/aboutme.php">About Me</a></li>
                <li><a href="">Equipment</a></li>
                <li><a href="https://ppkn.co.id/materi-ppkn/">Sumber</a></li>
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
                    <li><a href="/PROJECT_UKL/ALLCRUD/Data_User/index.php">CRUD</a></li> 
                <?php else: ?>
                    <li><a href="/PROJECT_UKL/profilbiodata/profil.php">Profil</a></li> 
                <?php endif; ?>
                    <li><a href="cruduser/logout.php">Logout</a></li>
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
                <h3 class="section__subheader">Wujudkan Generasi Muda Sebagai Penerus Bangsa</h3>
                <h1 class="section__header">
                    Dream it as high as the skies. Because if you are fell, you're gonna fell among of the stars.
                </h1>
                    <div class="scroll__btn">
                        <a href="#about">
                            Scroll down
                        <span><i class="ri-arrow-down-line"></i></span>
                        </a>
                    </div>
                </div>
                <div class="header__socials">
                    <span>Follow us</span>
                    <a href="https://wa.me/qr/H2TDH2F6K4YJN1"><i class="ri-whatsapp-line"></i></a>
                    <a href="https://www.instagram.com/radhy._akbar?igsh=bzc0cDR5Y2JjNzk5"><i class="ri-instagram-fill"></i></a>
                </div>
            </div>
    </header>

    <section class="about">
    <div class="section__container about__container">
        <?php foreach ($mapel as $index => $item): ?>
            <div class="about__image about__image-<?php echo $index + 1; ?>" id="about">
                <img src="images/<?php echo htmlspecialchars($item['gambar']); ?>" alt="about" />
            </div>
            <div class="about__content about__content-">
                <h3 class="section__subheader">Pelajaran <?php echo $index + 1; ?></p>
                <h2 class="section__header"><?php echo htmlspecialchars($item['judul']); ?></h2>
                <p>
                    <?php echo nl2br(htmlspecialchars($item['deskripsi'])); ?>
                </p>
                <div class="about__btn">
                    <a href="<?php 
                        if ($item['judul'] == 'Kursus Pendidikan Pancasila dan Kewarganegaraan (PKN)') {
                            echo '/PROJECT_UKL/pkn/pkn.php';
                        } elseif ($item['judul'] == 'Kursus Bahasa Indonesia') {
                            echo '/PROJECT_UKL/bindo/bindo.php';
                        } elseif ($item['judul'] == 'Kursus IPA Ilmu Pengetahuan Alam') {
                            echo '/PROJECT_UKL/ipa/ipa.php';
                        } elseif ($item['judul'] == 'Dasar pemrograman') {
                            echo '/PROJECT_UKL/dp/dp.php';
                        } else {
                            echo '/PROJECT_UKL/dp/dp.php'; 
                        }
                    ?>">
                        Read more
                        <span><i class="ri-arrow-right-line"></i></span>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

    <footer class="footer">
        <div class="section__container footer__container">
            <div class="footer__col">
                <div class="logo footer__logo">
                <a href="#">Belajarmaju.com</a>
            </div>
            <p>
                “Learning is attained by chance, it must be sought for with ardor and diligence.”
                <br>"Pembelajaran tidak dicapai secara kebetulan, itu harus dicari dengan semangat dan diperhatikan dengan ketekunan". ~ Abigail Adams </br>
            </p>
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
                        <li><a href="http://localhost/PROJECT_UKL/absensi/form_absensi.php">Absensi</a></li>
                    </ul>
                </div>
            </div>
        <div class="footer__bar">
            Copyright © 2025 Web Pendidikan Non Formal. All rights reserved.
        </div>
    </footer>
</body>
</html>