<?php
require 'koneksi.php'; // Pastikan koneksi sudah benar dan $db terdefinisi

// Pastikan semua data dari form dikirim
if (
    isset($_POST['nama'], $_POST['harga_asli'], $_POST['harga_diskon'], 
          $_POST['diskon_persen'], $_POST['lokasi'], $_POST['estimasi_pengiriman'])
) {
    $nama = $_POST['nama'];
    $harga_asli = (int)$_POST['harga_asli'];
    $harga_diskon = (int)$_POST['harga_diskon'];
    $diskon_persen = (int)$_POST['diskon_persen'];
    $lokasi = $_POST['lokasi'];
    $estimasi = $_POST['estimasi_pengiriman'];

    // Query simpan data    
    $query = $koneksi->prepare("INSERT INTO produk (nama, harga_asli, harga_diskon, diskon_persen, lokasi, estimasi_pengiriman) VALUES (?, ?, ?, ?, ?, ?)");
    $query->execute([$nama, $harga_asli, $harga_diskon, $diskon_persen, $lokasi, $estimasi]);

    header("Location: index.php");
    exit;
} else {
    echo "Data tidak lengkap. Pastikan semua field diisi.";
}
?>