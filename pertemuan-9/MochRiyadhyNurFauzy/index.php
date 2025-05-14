<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Produk</title>
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: whitesmoke;
        padding: 20px;
    }

    .tambah-btn {
        margin-bottom: 30px;
        padding: 12px 24px;
        background-color: blue;
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        box-shadow: 0 2px 6px gray;
        transition: background-color 0.3s;
    }

    .tambah-btn:hover {
        background-color: darkblue;
    }

    .produk {
        background-color: white;
        border: 1px solid lightgray;
        border-radius: 10px;
        padding: 20px;
        width: 400px;
        margin-bottom: 20px;
        box-shadow: 0 4px 8px lightgray;
    }

    .nama-produk {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 10px;
        color: black;
    }

    .harga-diskon {
        color: green;
        font-weight: bold;
        font-size: 22px;
        margin-bottom: 5px;
    }

    .harga-awal {
        text-decoration: line-through;
        color: gray;
        font-size: 14px;
        margin-right: 8px;
    }

    .diskon {
        color: red;
        font-weight: bold;
        font-size: 14px;
        background-color: mistyrose;
        padding: 2px 6px;
        border-radius: 4px;
    }

    .lokasi {
        margin-top: 10px;
        color: dimgray;
        font-size: 15px;
        display: flex;
        align-items: center;
    }

    .lokasi-icon {
        width: 16px;
        height: 16px;
        background-color: violet;
        display: inline-block;
        margin-right: 6px;
        border-radius: 4px;
    }

    .estimasi {
        color: gray;
        font-size: 13px;
        margin-top: 5px;
    }

    .crud-buttons {
        margin-top: 15px;
    }

    .crud-buttons button {
        padding: 6px 14px;
        margin-right: 10px;
        border: none;
        border-radius: 4px;
        font-size: 14px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .crud-buttons button:first-child {
        background-color: orange;
        color: white;
    }

    .crud-buttons button:first-child:hover {
        background-color: darkorange;
    }

    .crud-buttons button:last-child {
        background-color: red;
        color: white;
    }

    .crud-buttons button:last-child:hover {
        background-color: darkred;
    }
</style>

</head>
<body>

    <button class="tambah-btn" onclick="window.location.href='tambah.php'">Tambah Produk</button>

<?php
require 'db.php';
$query = $db->query("SELECT * FROM produk");
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