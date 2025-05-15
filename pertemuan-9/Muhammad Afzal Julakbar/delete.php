<?php
require 'koneksi.php';
$id = $_GET['id'];
$koneksi->query("DELETE FROM produk WHERE id=$id");
header("Location: index.php");
?>