<?php
$koneksi = new mysqli("localhost", "root", "", "tugas_tko");
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>