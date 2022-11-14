<?php
session_start();
require 'koneksi.php';


if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $cek_username = "SELECT * FROM users WHERE username = '$username'";
    $cek_admin = "SELECT * FROM admin WHERE username = '$username'";
    $result = mysqli_query($conn, $cek_username);
    $result2 = mysqli_query($conn, $cek_admin);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {
            // $_SESSION['login'] = true;
            $_SESSION ['username'] = $username;

            echo "<script>
                document.location.href = 'home.php';
                alert('Login berhasil!');
            </script>";
        }
    }
    if (mysqli_num_rows($result2) > 0) {
        $row = mysqli_fetch_assoc($result2);

        if (password_verify($password, $row['password'])) {
            $_SESSION ['admin'] = $row;

            echo "<script>
                document.location.href = 'admin/index.php';
                alert('Login berhasil!');
            </script>";
        }
    }
    $error = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css">
    <title>Login Kuy</title>
</head>

<body>
    <div class="bg_lgn">
        <div class="kotak_login">
            <p class="tulisan_login">Login</p><br>
            <?php if (isset($error)) : ?>
            <center>
                <p style="color: red; font-weight:600;">Username/Password is Wrong!</p><br>
            </center>
            <?php endif; ?>
            <form action="" method="post">
                <label>Username</label>
                <input type="text" id="username" name="username" class="form_login" required />

                <label>Password</label>
                <input type="password" id="password" name="password" class="form_login" required />

                <input type="submit" class="tombol_login" name="login" placeholder="Log In" />

                <br />
                <br />
                <center>
                    Masih belum memiliki akun?<a class="link" href="registrasi.php"> Daftar disini</a>
                </center>
            </form>
        </div>
    </div>
</body>

</html>