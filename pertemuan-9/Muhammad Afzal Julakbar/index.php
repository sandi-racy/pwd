<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tugas Pwd CRUD</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        .produk {
            border: 1px solid #ccc;
            padding: 20px;
            width: 350px;
            margin-bottom: 20px;
        }
        .harga-awal {
            text-decoration: line-through;
            color: gray;
        }
        .harga-diskon {
            font-weight: bold;
            font-size: 24px;
        }
        .diskon {
            color: red;
            font-weight: bold;
        }
        .lokasi {
            display: flex;
            align-items: center;
            margin-top: 10px;
            font-size: 16px;
        }
        .lokasi-icon {
            width: 14px;
            height: 14px;
            background-color: blueviolet;
            margin-right: 6px;
            border-radius: 3px;
        }
        .estimasi {
            font-size: 14px;
            color: gray;
            margin-top: 5px;
        }
    </style>
</head>
<body>

<button class="tambah-btn" onclick="window.location.href='tambah.php'">Tambah Produk</button>

<h2>Daftar Produk</h2>

<?php
require 'koneksi.php';
$query = $koneksi->query("SELECT * FROM produk");
while ($p = $query->fetch_assoc()):
    $harga_awal = $p['harga_awal'];
    $harga_diskon = $p['harga_setelah_diskon'];
    $diskon = $harga_awal > 0 ? round(($harga_awal - $harga_diskon) / $harga_awal * 100) : 0;
?>
    <div class="produk">
        <div><h2><strong><?= $p['nama'] ?></strong></h2></div>
        <div class="harga-diskon">Rp<?= number_format($harga_diskon, 0, ',', '.') ?></div>
        <div>
            <span class="harga-awal">Rp<?= number_format($harga_awal, 0, ',', '.') ?></span>
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
            <br>
        <button onclick="window.location.href='edit.php?id=<?= $p['id'] ?>'">Edit</button>
        <button onclick="if (confirm('Anda yakin ingin hapus produk ini ?')) window.location.href='delete.php?id=<?= $p['id'] ?>'">Hapus</button>
    </div>
    </div>
<?php endwhile; ?>

</body>
</html>