<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$harga = $_POST['harga'];
$harga_coret = $_POST['harga_coret'];
$diskon = $_POST['diskon'];
$lokasi = $_POST['lokasi'];
$estimasi = $_POST['estimasi'];

mysqli_query($koneksi, "INSERT INTO produk VALUES('', '$nama', '$harga', '$harga_coret', '$diskon', '$lokasi', '$estimasi')");
header("location:index.php");
?>
