<?php
require 'db.php';

$id = $_GET['id'];
$query = $db->prepare('DELETE FROM produk WHERE id = ?');
$query->execute([$id]);

header('location: index.php');
