<?php
require 'koneksi.php';

$waktu = date("Y-m-d");
$idj = $_POST['id_judul'];

$komen = mysqli_query($conn, "INSERT INTO komentar (nama, isi, waktu, id_judul) VALUES ('$_POST[nama]','$_POST[isi]', '$waktu', '$idj')");

if($komen){
    header('Location: ./detail.php?id=' .$idj);
}

?>