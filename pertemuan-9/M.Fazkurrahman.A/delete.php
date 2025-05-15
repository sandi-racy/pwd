<?php 

require 'db.php';


$id_barang = $_GET['id_barang'];
$query = $db->prepare('DELETE FROM barang WHERE id_barang = ?');
$query->execute([$id_barang]);

header('location: index.php');

