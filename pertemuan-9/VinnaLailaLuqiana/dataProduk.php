<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="style.css">
    <style>
        table, td, th {  
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 15px;
        }

        th {
            background-color: skyblue;
            color: black;
        }

        .btn-edit{
            background-color: #F3C623;
            border: none;
        }

        .btn-hapus{
            background-color: #f44336;
            border: none;
        }

        .btn-edit, .btn-hapus{
            margin: 0px;
            /* padding: 0px; */
        }
    </style>
</head>
<body>
    <?php require "header.php"; ?>
    <div class="content">
        <h2 class="judul-konten">Data Produk</h2>
        <a href="form-tambah.php" class="btn btn-tambah">Tambah Produk</a>
        <a href="index.php" class="btn btn-data">Dashboard</a>
        
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Produk</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Diskon</th>
                    <th>Harga Jual</th>
                    <th>Lokasi</th>
                    <th>Estimasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    require 'koneksiDB.php';
                    $i = 1;
                    $query = $db->prepare('SELECT * FROM tb_produk');
                    $query->execute();
                    $produk = $query->fetchAll();
                    foreach($produk as $p){
                ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?php echo $p['kode_produk'];?></td>
                    <td><?php echo $p['nama_produk'];?></td>
                    <td><?php echo 'Rp. '. number_format($p['harga'], 0, ',', '.');?></td>
                    <td><?php echo rtrim(rtrim($p['diskon'], '0'), '.') . '%'?></td>
                    <td><?php echo 'Rp. '. number_format($p['harga_jual'], 0, ',', '.');?></td>
                    <td><?php echo $p['lokasi'];?></td>
                    <td><?php echo $p['estimasi'];?></td>
                    <td>
                        <a href="form-ubah.php?kodeProduk=<?php echo $p['kode_produk'];?>" class="btn btn-edit">Edit</a>
                        <a href="hapus.php?kodeProduk=<?php echo $p['kode_produk'];?>" onclick="return confirm('Yakin?')" class="btn btn-hapus">Hapus</a>
                    </td>
                </tr>

                <?php 
                    $i++;
                    }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>