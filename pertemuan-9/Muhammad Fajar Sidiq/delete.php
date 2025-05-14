<?php
require 'koneksi.php';

$id = $_GET['id'];
$query = $db->prepare("DELETE FROM barang WHERE id = ?");
$query->execute([$id]);

header("Location: index.php");