<?php
$server = "localhost";
$username = "root";
$password = "";
$db_name = "pa_db";

$conn = mysqli_connect($server, $username, $password, $db_name);
// mengecek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

?>