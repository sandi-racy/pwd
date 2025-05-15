<?php
include 'koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$harga_coret = $_POST['harga_coret'];
$diskon = $_POST['diskon'];
$lokasi = $_POST['lokasi'];
$estimasi = $_POST['estimasi'];

mysqli_query($koneksi, "UPDATE produk SET nama='$nama', harga='$harga', harga_coret='$harga_coret', diskon='$diskon', lokasi='$lokasi', estimasi='$estimasi' WHERE id='$id'");
header("location:index.php");
?>