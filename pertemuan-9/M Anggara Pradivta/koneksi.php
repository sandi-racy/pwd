<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_toko", 3307);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>