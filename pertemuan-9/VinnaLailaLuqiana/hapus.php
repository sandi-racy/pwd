<?php
require 'koneksiDB.php';

$kodeProduk = $_GET['kodeProduk'];
$query = $db->prepare('DELETE FROM tb_produk WHERE kode_produk = ?');
$query->execute([$kodeProduk]);

header('location: dataProduk.php');