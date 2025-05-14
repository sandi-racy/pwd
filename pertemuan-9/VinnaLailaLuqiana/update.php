<?php
    require 'koneksiDB.php';

    $kodeProduk = $_POST['kodeProduk'];
    $namaProduk = $_POST['namaProduk'];
    $hargaProduk = $_POST['hargaProduk'];
    $diskon = $_POST['diskon'];
    $lokasi = $_POST['lokasi'];
    $estimasi = $_POST['estimasi'];

    $query = $db->prepare('UPDATE tb_produk SET nama_produk = ?, harga = ?, diskon = ?, lokasi = ?, estimasi = ? WHERE kode_produk = ?');
    $query->execute([$namaProduk, $hargaProduk, $diskon, $lokasi, $estimasi, $kodeProduk]);

    header('location:dataProduk.php');