<?php
require 'db.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$harga_awal = $_POST['harga_awal'];
$harga_setelah_diskon = $_POST['harga_setelah_diskon'];
$lokasi = $_POST['lokasi'];
$estimasi = $_POST['estimasi_pengiriman'];

$query = $db->prepare("UPDATE produk SET nama = ?, harga_awal = ?, harga_setelah_diskon = ?, lokasi = ?, estimasi_pengiriman = ? WHERE id = ?");
$query->execute([$nama, $harga_awal, $harga_setelah_diskon, $lokasi, $estimasi, $id]);

header("Location: index.php");