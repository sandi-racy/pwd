<?php
require 'db.php';

$nama       = $_POST['nama_barang'] ?? '';
$harga_awal = $_POST['harga_awal'] ?? 0;
$diskon     = $_POST['diskon'] ?? 0;
$lokasi     = $_POST['lokasi'] ?? '';
$estimasi   = $_POST['estimasi'] ?? '';

$harga = $harga_awal - ($diskon / 100 * $harga_awal);

$query = $db->prepare('INSERT INTO produk (nama_barang, harga, harga_awal, diskon, lokasi, estimasi) VALUES (?, ?, ?, ?, ?, ?)');
$query->execute([$nama, $harga, $harga_awal, $diskon, $lokasi, $estimasi]);

header('Location: index.php');
