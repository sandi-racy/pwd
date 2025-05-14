<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .produk {
            border: 1px solid #ccc;
            padding: 20px;
            width: 400px;
            margin: 20px;
        }
        .harga-diskon {
            color: black;
            font-weight: bold;
            font-size: 22px;
        }
        .harga-awal {
            text-decoration: line-through;
            color: gray;
            margin-right: 10px;
        }
        .diskon {
            color: red;
            font-weight: bold;
        }
        .lokasi {
            color: #555;
            display: flex;
            align-items: center;
        }
        .lokasi-icon {
            width: 16px;
            height: 16px;
            background-color: blueviolet;
            display: inline-block;
            margin-right: 5px;
            border-radius: 3px;
        }
        .estimasi {
            color: gray;
            font-size: 14px;
        }
        .crud-buttons {
            margin-top: 10px;
        }
        .crud-buttons button {
            padding: 5px 10px;
            margin-right: 5px;
            cursor: pointer;
        }
        .tambah-btn {
            margin: 20px 0;
            padding: 10px 20px;
            background-color: red;
            color: white;
            border: none;
            cursor: pointer;
        }
        .tambah-btn:hover {
            background-color: blue;
        }
    </style>
</head>
<body>

    <button class="tambah-btn" onclick="window.location.href='tambah.php'">Tambah Produk</button>

<?php
require 'koneksi.php';
$query = $db->query("SELECT * FROM barang");
while ($p = $query->fetch()):
    $diskon = $p['harga_awal'] > 0 
    ? round(($p['harga_awal'] - $p['harga_setelah_diskon']) / $p['harga_awal'] * 100)
    : 0;

?>

<div class="produk">
    <div class="nama-produk"><?= $p['nama'] ?></div>
    <div class="harga-diskon">Rp<?= number_format($p['harga_setelah_diskon'], 0, ',', '.') ?></div>
    <div>
        <span class="harga-awal">Rp<?= number_format($p['harga_awal'], 0, ',', '.') ?></span>
        <span class="diskon"><?= $diskon ?>%</span>
    </div>
    <div class="lokasi">
        <span class="lokasi-icon"></span>
        <?= $p['lokasi'] ?>
    </div>
    <div class="estimasi">Tiba <?= $p['estimasi_pengiriman'] ?></div>
    
    <div class="crud-buttons">
        <button onclick="window.location.href='edit.php?id=<?= $p['id'] ?>'">Edit</button>
        <button onclick="if (confirm('Apakah Anda yakin ingin menghapus produk ini?')) window.location.href='delete.php?id=<?= $p['id'] ?>'">Hapus</button>
    </div>
</div>

<?php endwhile; ?>

</body>
</html>
