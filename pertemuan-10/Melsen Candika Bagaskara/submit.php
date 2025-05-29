<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$dbname = "form_validasi";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    function clean_input($data) {
        return htmlspecialchars(strip_tags(trim($data)));
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = clean_input($_POST['nama']);
        $kelas = clean_input($_POST['kelas']);
        $agama = clean_input($_POST['agama']);
        $pesan = clean_input($_POST['pesan']);
        $umur = clean_input($_POST['umur']);

        if (!is_numeric($umur) || $umur <= 0) {
            $_SESSION['error'] = "Umur harus berupa angka yang valid.";
            header("Location: index.php");
            exit;
        }

        $hobi = "";
        if (isset($_POST['hobi']) && is_array($_POST['hobi'])) {
            $hobi_array = array_map('clean_input', $_POST['hobi']);
            $hobi = implode(",", $hobi_array);
        }

        if (empty($nama) || empty($kelas) || empty($agama) || empty($pesan) || empty($umur)) {
            $_SESSION['error'] = "Semua field wajib diisi.";
            header("Location: index.php");
            exit;
        }

        $sql = "INSERT INTO form_data (nama, kelas, hobi, agama, pesan, umur)
                VALUES (:nama, :kelas, :hobi, :agama, :pesan, :umur)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nama' => $nama,
            ':kelas' => $kelas,
            ':hobi' => $hobi,
            ':agama' => $agama,
            ':pesan' => $pesan,
            ':umur' => $umur
        ]);

        $_SESSION['success'] = "Data berhasil disimpan!";
    }
} catch (PDOException $e) {
    $_SESSION['error'] = "Koneksi / Query error: " . $e->getMessage();
}

header("Location: index.php");
exit;
