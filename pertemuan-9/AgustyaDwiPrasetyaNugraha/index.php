<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Produk</title>
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
            background-color: blue;
            color: white;
            border: none;
            cursor: pointer;
        }
        .tambah-btn:hover {
            background-color: darkcyan;
        }
    </style>
</head>
<body>

    <button class="tambah-btn" onclick="window.location.href='tambah.php'">Tambah Produk</button>

<?php
require 'koneksi.php';
$query = $koneksi->query("SELECT * FROM produk");
while ($p = $query->fetch()):
    $harga_asli = $p['harga_asli'] ?? 0;
    $harga_diskon = $p['harga_diskon'] ?? 0;
    $diskon = $p['diskon_persen'] ?? 0;
?>
<div class="produk">
    <div class="nama-produk"><h2><?= $p['nama'] ?></h2></div>
    <div class="harga-diskon">Rp<?= number_format($harga_diskon, 0, ',', '.') ?></div>
    <div>
        <span class="harga-awal">Rp<?= number_format($harga_asli, 0, ',', '.') ?></span>
        <span class="diskon"><?= $diskon ?>%</span>
    </div>
    <div class="lokasi">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="blueviolet" viewBox="0 0 16 16" style="margin-right: 5px;">
        <path d="M8 0a5.53 5.53 0 0 0-5.5 5.5c0 3.5 5.5 10.5 5.5 10.5s5.5-7 5.5-10.5A5.53 5.53 0 0 0 8 0zm0 7.5a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"/>
    </svg>
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