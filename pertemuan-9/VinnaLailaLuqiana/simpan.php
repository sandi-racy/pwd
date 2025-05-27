<?php 
    require 'koneksiDB.php';

    $kodeProduk = $_POST['kodeProduk'];
    $namaProduk = $_POST['namaProduk'];
    $hargaLama = $_POST['hargaProduk'];
    $diskon = $_POST['diskon'];
    $lokasi = $_POST['lokasi'];
    $estimasi = $_POST['estimasi'];

    $query = $db->prepare('INSERT INTO tb_produk(kode_produk, nama_produk, harga, diskon, lokasi, estimasi) VALUES(?,?,?,?,?,?)');
    $query->execute([$kodeProduk, $namaProduk, $hargaLama, $diskon, $lokasi, $estimasi]);

    header('location: index.php');