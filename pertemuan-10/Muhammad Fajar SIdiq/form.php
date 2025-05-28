<?php
session_start();
require_once 'koneksi.php';

$errors = [];
$success = "";
$data = [];

// Handle submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil dan validasi input
    $nama = trim($_POST['nama'] ?? '');
    $umur = $_POST['umur'] ?? null;
    $gender = $_POST['gender'] ?? '';
    $pekerjaan = $_POST['pekerjaan'] ?? '';
    $negara = $_POST['negara'] ?? '';
    $hobi = isset($_POST['hobi']) ? $_POST['hobi'] : [];
    $komentar = trim($_POST['komentar'] ?? '');
    $setuju = isset($_POST['setuju']) ? 1 : 0;

    // Validasi
    if (empty($nama)) {
        $errors[] = "Nama wajib diisi.";
    } elseif (strlen($nama) > 100) {
        $errors[] = "Nama tidak boleh lebih dari 100 karakter.";
    }

    if (!filter_var($umur, FILTER_VALIDATE_INT) || $umur <= 0) {
        $errors[] = "Umur harus berupa angka positif.";
    }

    $allowedGenders = ['Laki-laki', 'Perempuan'];
    if (!in_array($gender, $allowedGenders)) {
        $errors[] = "Gender tidak valid.";
    }

    $allowedPekerjaan = ['Pelajar', 'Mahasiswa', 'Pekerja'];
    if (!in_array($pekerjaan, $allowedPekerjaan)) {
        $errors[] = "Pekerjaan tidak valid.";
    }

    if (strlen($negara) > 50) {
        $errors[] = "Nama negara terlalu panjang.";
    }

    if (!is_array($hobi)) {
        $errors[] = "Format hobi tidak valid.";
    }
    $hobiStr = implode(", ", $hobi);

    if (strlen($komentar) > 500) {
        $errors[] = "Komentar tidak boleh lebih dari 500 karakter.";
    }

    if (!$setuju) {
        $errors[] = "Anda harus menyetujui syarat dan ketentuan.";
    }

    // Jika tidak ada error, simpan ke database
    if (empty($errors)) {
        $stmt = $conn->prepare("INSERT INTO user_form (nama, umur, gender, pekerjaan, negara, hobi, komentar, setuju) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sisssssi", $nama, $umur, $gender, $pekerjaan, $negara, $hobiStr, $komentar, $setuju);
        $stmt->execute();
        $stmt->close();

        $success = "Data berhasil disimpan!";
        $data = compact('nama', 'umur', 'gender', 'pekerjaan', 'negara', 'hobiStr', 'komentar', 'setuju');
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Tugas</title>
    <link rel="stylesheet" href="style.css">
    <style>
        table {
            width: 100%;
            margin-top: 30px;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }

        .error {
            color: red;
            margin-bottom: 15px;
        }

        .success {
            color: green;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<h2>Form Input Data</h2>

<?php if (!empty($errors)): ?>
    <div class="error">
        <?php foreach ($errors as $err): ?>
            • <?= htmlspecialchars($err) ?><br>
        <?php endforeach; ?>
    </div>
<?php elseif ($success): ?>
    <div class="success"><?= htmlspecialchars($success) ?></div>
<?php endif; ?>

<form action="form.php" method="POST">
    <label>Nama:</label>
    <input type="text" name="nama" required>

    <label>Umur:</label>
    <input type="number" name="umur" required>

    <label>Gender:</label><br>
    <input type="radio" name="gender" value="Laki-laki"> Laki-laki
    <input type="radio" name="gender" value="Perempuan"> Perempuan<br><br>

    <label>Pekerjaan:</label>
    <select name="pekerjaan" required>
        <option value="">-- Pilih --</option>
        <option value="Pelajar">Pelajar</option>
        <option value="Mahasiswa">Mahasiswa</option>
        <option value="Pekerja">Pekerja</option>
    </select>

    <label>Negara:</label>
    <select name="negara">
        <option value="Indonesia">Indonesia</option>
        <option value="Malaysia">Malaysia</option>
        <option value="Singapura">Singapura</option>
    </select>

    <label>Hobi:</label><br>
    <input type="checkbox" name="hobi[]" value="Membaca"> Membaca
    <input type="checkbox" name="hobi[]" value="Menulis"> Menulis
    <input type="checkbox" name="hobi[]" value="Olahraga"> Olahraga<br><br>

    <label>Komentar:</label>
    <textarea name="komentar"></textarea>

    <input type="checkbox" name="setuju" value="1"> Saya menyetujui syarat dan ketentuan<br><br>

    <button type="submit">Submit</button>
</form>

<?php if ($success && !empty($data)): ?>
    <h3>Data Anda:</h3>
    <table>
        <tr><th>Nama</th><td><?= htmlspecialchars($data['nama']) ?></td></tr>
        <tr><th>Umur</th><td><?= $data['umur'] ?></td></tr>
        <tr><th>Gender</th><td><?= $data['gender'] ?></td></tr>
        <tr><th>Pekerjaan</th><td><?= $data['pekerjaan'] ?></td></tr>
        <tr><th>Negara</th><td><?= $data['negara'] ?></td></tr>
        <tr><th>Hobi</th><td><?= $data['hobiStr'] ?></td></tr>
        <tr><th>Komentar</th><td><?= htmlspecialchars($data['komentar']) ?></td></tr>
        <tr><th>Setuju</th><td><?= $data['setuju'] ? 'Ya' : 'Tidak' ?></td></tr>
    </table>
<?php endif; ?>

</body>
</html>
