<?php
session_start();
$flash = $_SESSION['flash'] ?? '';
unset($_SESSION['flash']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Tugas</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            margin-top: 30px;
            color: #333;
        }

        form {
            background: #ffffff;
            max-width: 600px;
            margin: 30px auto;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
            color: #444;
        }

        input[type="text"],
        input[type="number"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-size: 14px;
        }

        textarea {
            resize: vertical;
            min-height: 80px;
        }

        input[type="radio"],
        input[type="checkbox"] {
            margin-right: 10px;
        }

        button {
            margin-top: 20px;
            padding: 12px 20px;
            background-color: #007BFF;
            color: #fff;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        .error, .success {
            margin: 10px auto;
            width: 600px;
            padding: 10px 15px;
            border-radius: 6px;
            font-weight: bold;
        }

        .error {
            color: red;
            background: #ffe5e5;
            border: 1px solid #ff8888;
        }

        .success {
            color: green;
            background: #e8ffe5;
            border: 1px solid #88ff99;
        }
    </style>
</head>
<body>

<h2>Form Input Data</h2>

<?php if ($flash): ?>
    <div class="<?= strpos($flash, 'berhasil') !== false ? 'success' : 'error' ?>">
        <?= htmlspecialchars($flash) ?>
    </div>
<?php endif; ?>

<form action="proses.php" method="POST">
    <label>Nama:</label>
    <input type="text" name="nama" required>

    <label>Umur:</label>
    <input type="number" name="umur" required>

    <label>Gender:</label><br>
    <input type="radio" name="gender" value="Laki-laki" required> Laki-laki
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

</body>
</html>
