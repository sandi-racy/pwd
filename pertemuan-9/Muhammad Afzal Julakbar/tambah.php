<?php
require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $harga_awal = $_POST['harga_awal'];
    $harga_diskon = $_POST['harga_setelah_diskon'];
    $lokasi = $_POST['lokasi'];
    $estimasi = $_POST['estimasi_pengiriman'];

    $koneksi->query("INSERT INTO produk (nama, harga_awal, harga_setelah_diskon, lokasi, estimasi_pengiriman) VALUES ('$nama', '$harga_awal', '$harga_diskon', '$lokasi', '$estimasi')");
    header("Location: index.php");
}
?>

<form method="post">
    <h2>Tambah Produk</h2>

    <div>
        <label for="nama">Nama Produk:</label><br>
        <input type="text" id="nama" name="nama">
    </div><br>

    <div>
        <label for="harga_awal">Harga Awal:</label><br>
        <input type="number" id="harga_awal" name="harga_awal">
    </div><br>

    <div>
        <label for="harga_setelah_diskon">Harga Setelah Diskon:</label><br>
        <input type="number" id="harga_setelah_diskon" name="harga_setelah_diskon">
    </div><br>

    <div>
        <label for="lokasi">Lokasi:</label><br>
        <input type="text" id="lokasi" name="lokasi">
    </div><br>

    <div>
        <label for="estimasi_pengiriman">Estimasi Pengiriman:</label><br>
        <input type="text" id="estimasi_pengiriman" name="estimasi_pengiriman">
    </div><br>

    <button type="submit">Simpan</button>
</form>
