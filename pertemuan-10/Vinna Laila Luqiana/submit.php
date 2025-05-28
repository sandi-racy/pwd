<?php
session_start();
require 'KoneksiDB.php';

$nama = htmlspecialchars(trim($_POST['nama']));;
$jk = $_POST['jk'];
$jurusan = $_POST['jurusan'];
$minat = implode(", ", $_POST['minat']);
$alamat = htmlspecialchars(trim($_POST['alamat']));

$error = '';

// Validasi
if ($nama == '') $error = 'Nama tidak boleh kosong.';
if ($jk == '') $error = 'Jenis kelamin harus dipilih.';
if ($jurusan == '') $error = 'Jurusan harus dipilih.';
if ($minat == '') $error = 'Pilih minimal satu minat.';
if ($alamat == '') $error = 'Alamat tidak boleh kosong.';

if ($error != '') {
    // Simpan error dan data lama ke session
    $_SESSION['error'] = $error;
    $_SESSION['old'] = [
        'nama' => $nama,
        'jk' => $jk,
        'jurusan' => $jurusan,
        'minat' => explode(", ", $minat),
        'alamat' => $alamat
    ];
    header('Location: form-user.php');
    exit;
}

// Jika tidak ada error, simpan data
try {
    $_SESSION['success'] = 'Data berhasil diinput.';
    $query = $db->prepare('INSERT INTO tb_mahasiswa (nama, jenis_kelamin, jurusan, minat, alamat) VALUES (?, ?, ?, ?, ?)');
    $query->execute([$nama, $jk, $jurusan, $minat, $alamat]);
    header('Location: tabel-data.php');
    exit;
} catch (PDOException $e) {
    $_SESSION['error'] = 'Gagal menyimpan data: ' . $e->getMessage();
    header('Location: form-user.php');
    exit;
}
