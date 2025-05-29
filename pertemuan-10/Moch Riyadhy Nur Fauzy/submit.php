<?php
session_start();

$host = "localhost";
$db = "pwd"; 
$user = "root";
$pass = "";

try { 
    $pdo = new PDO("mysql:host=localhost;port=3307;dbname=pwd", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $nama_pengunjung = htmlspecialchars(trim($_POST['nama_pengunjung'] ?? ''));
    $tanggal_kunjungan = htmlspecialchars(trim($_POST['tanggal_kunjungan'] ?? ''));
    $jumlah_orang = htmlspecialchars(trim($_POST['jumlah_orang'] ?? ''));
    $jenis_wisata = htmlspecialchars(trim($_POST['jenis_wisata'] ?? ''));
    $layanan = $_POST['layanan'] ?? [];
    $keterangan = htmlspecialchars(trim($_POST['keterangan'] ?? ''));

    $errors = [];

    if (empty($nama_pengunjung)) {
        $errors[] = "Nama Pengunjung harus diisi!";
    }
    if (empty($tanggal_kunjungan)) {
        $errors[] = "Tanggal Kunjungan harus dipilih!";
    }
    if (empty($jumlah_orang) || $jumlah_orang < 1) {
        $errors[] = "Jumlah Orang minimal 1!";
    }
    if (empty($jenis_wisata)) {
        $errors[] = "Jenis Wisata harus dipilih!";
    }
    if (!is_array($layanan)) {
        $layanan = [];
    }
    $layanan_str = implode(', ', $layanan);

    if (!empty($errors)) {
        $_SESSION['error'] = implode('<br>', $errors);
        header("Location: index.php");
        exit;
    }

    $sql = "INSERT INTO booking_wisata (nama_pengunjung, tanggal_kunjungan, jumlah_orang, jenis_wisata, layanan_tambahan, keterangan)
            VALUES (:nama, :tanggal, :jumlah, :wisata, :layanan, :keterangan)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nama' => $nama_pengunjung,
        ':tanggal' => $tanggal_kunjungan,
        ':jumlah' => $jumlah_orang,
        ':wisata' => $jenis_wisata,
        ':layanan' => $layanan_str,
        ':keterangan' => $keterangan
    ]);

    $_SESSION['success'] = "Booking berhasil disimpan!";
    header("Location: index.php");
    exit;

} catch (PDOException $e) {
    $_SESSION['error'] = "Koneksi / Query Gagal: " . $e->getMessage();
    header("Location: index.php");
    exit;
}
