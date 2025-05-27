<?php
    require 'koneksiDB.php';

    $kodeProduk = $_GET['kodeProduk'];
    $query = $db->prepare('SELECT * FROM tb_produk WHERE kode_produk = ?');
    $query->execute([$kodeProduk]);
    $produk = $query->fetch();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="style.css">
    <style>
        form {
            margin-left: 25px;
        }

        td {
            padding: 5px;
            text-align: left;
        }

        input {
            width: 100%;
            padding: 10px 18px;
            margin: 5px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .btn-edit{
            background-color: #F3C623;
            border: none;
        }

        .btn-reset{
            background-color: #4e71ff;
            border: none;
        }


    </style>
</head>

<body>
    <?php require "header.php"; ?>
    <form action="update.php" method="POST">
        <h2>Input Data</h2>
        <input type="hidden" name="kodeProduk" value="<?php echo $produk['kode_produk'];?>">
        <table>
            <tr>
                <td><label for="namaProduk">Nama Produk</label></td>
                <td>:</td>
                <td><input type="text" name="namaProduk" value="<?= $produk['nama_produk'] ?>"></td>
            </tr>
            <tr>
                <td><label for="hargaProduk">Harga Produk</label></td>
                <td>:</td>
                <td><input type="number" name="hargaProduk" step="0.01" value="<?= $produk['harga'] ?>"></td>
            </tr>
            <tr>
                <td><label for="diskon">Diskon</label></td>
                <td>:</td>
                <td><input type="number" name="diskon" step="0.01" value="<?= $produk['diskon'] ?>"></td>
            </tr>
            <tr>
                <td><label for="lokasi">Lokasi</label></td>
                <td>:</td>
                <td><input type="text" name="lokasi" value="<?= $produk['lokasi'] ?>"></td>
            </tr>
            <tr>
                <td><label for="estimasi">Estimasi</label></td>
                <td>:</td>
                <td><input type="date" name="estimasi" value="<?= $produk['estimasi'] ?>"></td>
            </tr>
        </table>
        <br>
        <button type="submit" class="btn btn-edit" >Ubah</button>
        <button type="reset" class="btn btn-reset">Reset</button>
    </form>
</body>

</html>