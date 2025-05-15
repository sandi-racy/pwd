<?php
require 'db.php';

$npm = $_POST['npm'];
$nama = $_POST['nama'];
$tanggal_lahir= $_POST['tanggal_lahir'];

$query = $db->prepare(query: 'INSERT INTO mahasiswa VALUES(?,?,?)');
$query->execute(params: [$npm,$nama,$tanggal_lahir]);

header(headr: 'local: index.php');