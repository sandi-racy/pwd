<?php
require 'db.php';
$id = $_GET['id'];
$query = $db->prepare("SELECT * FROM barang WHERE id = ?");
$query->execute([$id]);
$produk = $query->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk</title>
</head>
<body>
    <h2>Edit Barang</h2>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?= $produk['id'] ?>">

        <label>Nama Produk</label><br>
        <input type="text" name="nama" value="<?= $produk['nama'] ?>" required><br><br>

        <label>Harga Awal</label><br>
        <input type="number" name="harga_awal" value="<?= $produk['harga_awal'] ?>" required><br><br>

        <label>Harga Setelah Diskon</label><br>
        <input type="number" name="harga_setelah_diskon" value="<?= $produk['harga_setelah_diskon'] ?>" required><br><br>

        <label>Lokasi</label><br>
        <input type="text" name="lokasi" value="<?= $produk['lokasi'] ?>" required><br><br>

        <label>Estimasi Pengiriman</label><br>
        <input type="text" name="estimasi_pengiriman" value="<?= $produk['estimasi_pengiriman'] ?>" required><br><br>

        <button type="submit">Update</button>
    </form>
</body>
</html>
