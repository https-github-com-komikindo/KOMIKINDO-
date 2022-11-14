<?php
session_start();
require 'koneksi.php';

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

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

    $id = $_GET["id"];
    echo $id;

    $query = "SELECT * FROM item WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <link rel="stylesheet" href="css/style2.css" />
    <title>Detail Comic</title>

</head>

<body>
    <header>
        <a href="#" class="logo"></i><span>KomikIndo</span></a>
        <ul class="navbar">
            <li><a href="home.php" class="active">Home</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#product">Comic</i></a></li>
        </ul>

        <form action="" method="post" class="form">
            <input type="text" class="search-data" name="keyword" placeholder="Pencarian" autofocus autocomplete="off">
            <button type="submit" class="logo-cari" name="cari"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        <div class="mainn">
            <li><a class="dropbtn"><?php echo $_SESSION['username']; ?> <i class="fa-solid fa-user"></i></a></li>
            <li><a href="logout.php">Log Out</a></li>
        </div>

        <div class="menu-icon"><i class="fa-solid fa-bars" onclick="changeIcon(this)"></i></div>
    </header>

    <div class="box-detail">
        <div class="t-comic">Komik <?php echo $data['judul'];?></div>
        <div class="wrapper">
            <div class="gambar">
                <img src="admin/img//<?php echo $data['gmbr_judul']; ?>" alt="" />
                <div class="rating">Rating <?php echo $data['rating']; ?></div>
                <div class="episode"><a href="<?php echo $data['link_eps']; ?>">Episode <?php echo $data['eps']; ?></a>
                </div>
            </div>
            <div class="box-deskrip">
                <div class="j-comic">Synopsis <?php echo $data['judul']; ?></div>
                <p>
                    <?php echo $data['sinopsis']; ?>
                </p>
                <div class="box">
                    <div class="box-produser">
                        <div class="produser">Produser</div>
                        <p><?php echo $data['produser']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- tampil komentar -->
    <div class="display-comment">
        <h2>Semua Komentar</h2>
        <hr width="100%">
        <?php
        $sqlkomen = mysqli_query($conn, "SELECT * FROM komentar WHERE id_judul = '$data[id]'");
        while($dk = mysqli_fetch_array($sqlkomen)){
            ?>
        <div class="form-display">
            <div class="name"><?php echo $dk['nama'];?></div>
            <div class="line"></div>
            <div class="isi"><?php echo $dk['isi'];?></div>
            <div class="waktu"><?php echo $dk['waktu'];?></div>
        </div>
        <?php
        }
        ?>

    </div>

    <!-- form komentar -->
    <div class="area-comment">
        <h2>Komentar</h2>
        <div class="comment-form">
            <form action="simpanKomentar.php" method="post">
                <input type="hidden" name="id_judul" value="<?php echo $data['id']; ?>">
                <div class="form-grup">
                    <label>Nama</label>
                    <input type="text" name="nama" required>
                </div>
                <div class="form-grup">
                    <textarea name="isi" rows="10" placeholder="Komen Cuy" required></textarea>
                </div>
                <div>
                    <input type="submit" name="komen" value="Simpan Komentar">
                </div>
            </form>
        </div>
    </div>

    <!-- footer -->
    <div id="footerr" class="footer">
        <p>Copyright @2022 | Designed With by <a href="#aboutme">KELOMPOK 4 C'21</a> </p>
    </div>

    <!-- js -->
    <script type="text/javascript" src="js/script.js"></script>
    <script>
    $("p").click(function() {
        $(this).toggleClass("highlight");
    });
    </script>
</body>

</html>