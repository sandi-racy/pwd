<?php
require 'koneksi.php';

$id = $_GET['id'];
$query = $koneksi->prepare("DELETE FROM produk WHERE id = ?");
$query->execute([$id]);

header("Location: index.php");