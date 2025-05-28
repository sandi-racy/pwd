<?php
$host = "localhost";
$port = "3307";
$user = "root";
$pass = ""; 
$dbname = "kampus_db";

$conn = new mysqli($host, $user, $pass, $dbname, $port);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>