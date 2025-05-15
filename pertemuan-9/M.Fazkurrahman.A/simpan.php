<?php

require 'db.php';

$merek = $_POST['merek'];
$harga = $_POST['harga'];
$diskon = $_POST['diskon'];
$lokasi = $_POST['lokasi'];
$estimasi = $_POST['estimasi'];

$query = $db->prepare('INSERT INTO barang (merek, harga, diskon, lokasi, estimasi) VALUES (?, ?, ?, ?, ?)');
$query->execute([$merek, $harga, $diskon, $lokasi, $estimasi]);

header('Location: index.php');
