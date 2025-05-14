<?php
require 'db.php';

$id = $_GET['id'] ?? 0;
$query = $db->prepare('SELECT * FROM produk WHERE id = ?');
$query->execute([$id]);
$produk = $query->fetch();
?>

<h2>Edit Produk</h2>
<form action="update.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $produk['id']; ?>">

    <label>Nama Barang:</label><br>
    <input type="text" name="nama_barang" value="<?php echo $produk['nama_barang']; ?>"><br><br>

    <label>Harga Awal:</label><br>
    <input type="number" name="harga_awal" value="<?php echo $produk['harga_awal']; ?>"><br><br>

    <label>Diskon (%):</label><br>
    <input type="number" name="diskon" value="<?php echo $produk['diskon']; ?>"><br><br>

    <label>Lokasi:</label><br>
    <input type="text" name="lokasi" value="<?php echo $produk['lokasi']; ?>"><br><br>

    <label>Estimasi:</label><br>
    <input type="text" name="estimasi" value="<?php echo $produk['estimasi']; ?>"><br><br>

    <button type="submit">Simpan Perubahan</button>
</form>
