<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="style.css">
</head>
<body> 
    <?php require "header.php"?>
    <div class="content">
        <h2 class="judul-konten">Produk</h2>
        <a href="form-tambah.php" class="btn btn-tambah">Tambah Produk</a>
        <a href="dataProduk.php" class="btn btn-data">Data Produk</a>
        <div class="produk">
            <?php
                    require 'koneksiDB.php';
                    $query = $db->prepare('SELECT * FROM tb_produk');
                    $query->execute();
                    $produk = $query->fetchAll();
                    foreach($produk as $p){
            ?>
            <div class="card-content">
                <p class="nama-produk"> <?php echo $p['nama_produk'];?></p>
                <h4 class="harga-produk"><?php echo 'Rp. '. number_format($p['harga_jual'], 0, ',', '.');?></h4>
                <div class="diskon-harga">
                    <p class="harga-lama"><?php echo 'Rp. '. number_format($p['harga'], 0, ',', '.');?></p>
                    <h5 class="diskon"><?php echo rtrim(rtrim($p['diskon'], '0'), '.') . '%'?></h5>
                </div>
                <p class="lokasi"><?php echo $p['lokasi'];?></p>
                <p class="waktu-tiba"><?php echo date('d F', strtotime($p['estimasi'])) ;?></p>
            </div>

            <?php 
            } 
            ?>
        </div>
        
    </div>
</body>
</html>