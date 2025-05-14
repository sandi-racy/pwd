<?php
require 'db.php';

$nama = $_POST['nama'];
$harga_awal = $_POST['harga_awal'];
$harga_setelah_diskon = $_POST['harga_setelah_diskon'];
$lokasi = $_POST['lokasi'];
$estimasi = $_POST['estimasi_pengiriman'];

$query = $db->prepare("INSERT INTO produk (nama, harga_awal, harga_setelah_diskon, lokasi, estimasi_pengiriman) VALUES (?, ?, ?, ?, ?)");
$query->execute([$nama, $harga_awal, $harga_setelah_diskon, $lokasi, $estimasi]);

header("Location: index.php");