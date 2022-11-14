<?php
session_start();
require 'koneksi.php';

if (isset($_POST['cari'])) {
    $keyword = $_POST['keyword'];
    $read_select_sql = "SELECT * FROM item WHERE judul LIKE '%$keyword%'";
    $result = mysqli_query($conn, $read_select_sql);
} else {
    $read_sql = "SELECT * FROM item";
    $result = mysqli_query($conn, $read_sql);
}

$item = [];

while ($row = mysqli_fetch_assoc($result)) {
    $item[] = $row;
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet" />
    <title>Komik Indo</title>
</head>

<body>
    <header>
        <a href="#" class="logo"></i><span>KomikIndo</span></a>
        <ul class="navbar">
            <li><a href="#" class="active">Home</a></li>
            <li><a href="#aboutme">About Us</a></li>
            <li><a href="#product">Comic</a></li>
            <li><a href="login.php" class="dropbtn">Login</a></li>
            <li><a href="registrasi.php">Register</a></li>
        </ul>

        <div class="mainn">
            <div class="menu-icon"><i class="fa-solid fa-bars" onclick="changeIcon(this)"></i></div>
        </div>
        <form action="" method="post" class="form">
            <input type="text" class="search-data" name="keyword" placeholder="Pencarian" autofocus autocomplete="off">
            <button type="submit" class="logo-cari" name="cari"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </header>

    <section class="banner">
        <img src="assets/banner.png" alt="">
        <img src="assets/banner3.png" alt="">
    </section>


    <div id="product" class="container">
        <h2>Semua Komik</h2>
        <?php $i = 1; ?>
        <?php foreach ($item as $itm) : ?>
        <div class="card">
            <img src="admin/img/<?php echo $itm['gmbr_judul']; ?>" class="content" />
            <div class="deskrip">
                <span><a href="detail.php" "><?php echo $itm['judul']; ?></a></span>
            </div>
        </div>
        <?php $i++; ?>
        <?php endforeach; ?>
    </div>

    <div class=" iklan">
                        <img src="https://static.a-ads.com/a-ads-banners/424728/728x90?region=eu-central-1" alt="">
            </div>

            <div class="items">
                <div class="item"><img src="assets/184c2b1c-5737-422d-ad81-051f869c2671.jpeg" alt=""></div>
                <div class="item"><img src="assets/6102953c-3b3f-4602-81b1-f8525cd35095.jpeg" alt=""></div>
                <div class="item"><img src="assets/Blue Lock Anime - Yoichi Isagi.jpeg" alt=""></div>
                <div class="item"><img src="assets/Mona Lisa got nothing on Saitama - Funny.jpeg" alt=""></div>
                <div class="item"><img src="assets/184c2b1c-5737-422d-ad81-051f869c2671.jpeg" alt=""></div>
                <div class="item"><img src="assets/Speed Draw - Inosuke [Kimetsu no Yaiba].jpeg" alt=""></div>
                <div class="item"><img src="admin/img/one punch man.jpeg" alt=""></div>
                <div class="item"><img src="admin/img/Komik-Bleach.jpg" alt=""></div>
            </div>
            <!-- About me -->
            <section id="aboutme">
                <div class="image">
                    <img src="assets/fotokami2.jpg" id="geeks" class="newspaper">
                </div>
                <div class="content">
                    <h2>tentang saya</h2>

                    <span class="animasi">
                        <!-- line here -->
                    </span>
                    <p>Said Bukhari Akbar Maulana (2109106123) <br>Nama : Wina Aulia (2109106118) <br>Nama : Yosua
                        Wiranata (2109106126) <br>Follow My
                        Social Media :
                    </p>
                    <ul class="icons">
                        <li><a href="https://www.instagram.com/saidbkhri/?hl=id"><i
                                    class="fa-brands fa-instagram"></i></a></li>
                        <li><a href="https://github.com/https-github-com-komikindo/KOMIKINDO--1"><i
                                    class="fa-brands fa-github"></i></a>
                        </li>
                        <li><a href="https://www.youtube.com/channel/UC2i-YseT9mR9weZuzQgkJBQ"><i
                                    class="fa-brands fa-youtube"></i></a></li>
                    </ul>
                </div>
            </section>

            <!-- footer -->
            <div id="footerr" class="footer">
                <p>Copyright @2022 | Designed With by <a href="#aboutme">KELOMPOK 4 C'21</a> </p>
            </div>
            <!-- js -->
            <script type="text/javascript" src="js/script.js"></script>
</body>

</html>