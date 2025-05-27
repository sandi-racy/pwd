<html>
<head>
    <title>Tugas 9 PWD CRUD</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f8f8;
        }

        .tambah_produk {
            margin: 20px;
        }

        .produk-card {
            width: 300px;
            background: white;
            border: 1px solid #ddd;
            border-radius: 12px;
            padding: 15px;
            margin: 20px;
            float: left;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .produk-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
        }

        .produk-nama {
            font-size: 16px;
            margin: 10px 0 5px 0;
            font-weight: 500;
        }

        .produk-harga {
            font-size: 20px;
            font-weight: bold;
            color: black;
            margin-bottom: 5px;
        }

        .harga-diskon {
            display: flex;
            justify-content: flex-start;
            font-size: 14px;
            margin-bottom: 10px;
            gap: 8px; /* atau tambahkan jarak manual */
        }

        .harga-awal {
            text-decoration: line-through;
            color: #999;
        }

        .diskon {
            color: red;
            font-weight: bold;
            margin-left: 10px; /* atur sesuai keinginan */
        }

        .lokasi {
            font-size: 14px;
            color: gray;
            margin-bottom: 5px;
        }

        .estimasi {
            font-size: 13px;
            color: gray;
            margin-bottom: 10px;
        }

        .aksi {
            margin-top: 10px;
        }

        .aksi a {
            text-decoration: none;
            color: #007BFF;
            margin-right: 10px;
        }

        hr {
            clear: both;
            border: none;
            margin: 30px 0;
        }

        .lokasi-wrapper {
            display: flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 5px;
        }

        .lokasi-wrapper img {
            width: 16px;
            height: 16px;
        }

    </style>
</head>
<body>
    <div class="tambah_produk">
        <a href="tambah.php">+ Tambah Produk</a>
    </div>
    <hr>

    <?php
        $db = new PDO('mysql:host=localhost;dbname=pwd_9_tugas', 'root', '');
        $query = $db->prepare('SELECT * FROM produk');
        $query->execute();
        $listProduk = $query->fetchAll();

        foreach ($listProduk as $produk){
    ?>
        <div class="produk-card">
            <div class="produk-nama"><?php echo $produk['nama_barang']; ?></div>
            <div class="produk-harga">Rp<?php echo number_format($produk['harga'], 0, ',', '.'); ?></div>
            <div class="harga-diskon">
                <span class="harga-awal">Rp<?php echo number_format($produk['harga_awal'], 0, ',', '.'); ?></span>
                <span class="diskon"><?php echo $produk['diskon']; ?>%</span>
            </div>
            <div class="lokasi-wrapper">
                <img src="verifIMG.png" alt="verifikasi">
                <span class="lokasi"><?php echo $produk['lokasi']; ?></span>
            </div>
            <div class="estimasi">Tiba <?php echo $produk['estimasi']; ?></div>
            <div class="aksi">
                <a href="edit.php?id=<?php echo $produk['id']; ?>">Edit</a> |
                <a href="delete.php?id=<?php echo $produk['id']; ?>">Delete</a>
            </div>
        </div>
    <?php
        }
    ?>
</body>
</html>
