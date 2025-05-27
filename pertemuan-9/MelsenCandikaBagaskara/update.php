<?php
require 'db.php';

$id         = $_POST['id'];
$nama       = $_POST['nama_barang'];
$harga_awal = $_POST['harga_awal'];
$diskon     = $_POST['diskon'];
$lokasi     = $_POST['lokasi'];
$estimasi   = $_POST['estimasi'];

// Hitung harga akhir setelah diskon
$harga = $harga_awal - ($diskon / 100 * $harga_awal);

$query = $db->prepare('
    UPDATE produk SET 
        nama_barang = ?, 
        harga = ?, 
        harga_awal = ?, 
        diskon = ?, 
        lokasi = ?, 
        estimasi = ? 
    WHERE id = ?
');

$query->execute([
    $nama, $harga, $harga_awal, $diskon, $lokasi, $estimasi, $id
]);

header('Location: index.php');
?>
