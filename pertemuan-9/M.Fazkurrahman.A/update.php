    <?php

    require 'db.php';


    $id_barang = $_POST['id_barang'];
    $merek = $_POST['merek'];
    $harga = $_POST['harga'];
    $diskon = $_POST['diskon'];
    $lokasi = $_POST['lokasi'];
    $estimasi = $_POST['estimasi'];

    $query = $db->prepare('UPDATE barang SET merek = ?, harga = ?, diskon = ?, lokasi = ?, estimasi = ? WHERE id_barang = ?');
    $query->execute([$merek, $harga, $diskon, $lokasi, $estimasi, $id_barang]);

    header('Location: index.php');
