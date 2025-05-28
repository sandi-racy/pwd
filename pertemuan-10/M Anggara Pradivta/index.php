<?php
include 'koneksi.php';

$nama = $nim = $jurusan = $jenis_kelamin = $alamat = "";
$hobi = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $hobi = isset($_POST['hobi']) ? $_POST['hobi'] : [];

    if ($nama && $nim && $jurusan && $jenis_kelamin && $alamat && count($hobi) > 0) {
        $hobi_str = implode(", ", $hobi);
        $sql = "INSERT INTO mahasiswa (nama, nim, jurusan, jenis_kelamin, hobi, alamat) 
                VALUES ('$nama', '$nim', '$jurusan', '$jenis_kelamin', '$hobi_str', '$alamat')";
        $conn->query($sql);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Form Data Diri Mahasiswa</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="">
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">NIM</label>
                    <input type="text" name="nim" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jurusan</label>
                    <select name="jurusan" class="form-select" required>
                        <option value="">-- Pilih Jurusan --</option>
                        <option value="Informatika">Teknik Informatika</option>
                        <option value="Sistem Informasi">Teknik Sipil</option>
                        <option value="Teknik Elektro">Teknik Industri</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-laki" required>
                        <label class="form-check-label">Laki-laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan">
                        <label class="form-check-label">Perempuan</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Hobi</label><br>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="hobi[]" value="Futsal">
                        <label class="form-check-label">Futsal</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="hobi[]" value="Sepak Bola">
                        <label class="form-check-label">Sepak Bola</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="hobi[]" value="Mancing">
                        <label class="form-check-label">Mancing</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="hobi[]" value="Main Game">
                        <label class="form-check-label">Main Game</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3" required></textarea>
                </div>

                <button type="submit" class="btn btn-success">Simpan Data</button>
            </form>
        </div>
    </div>

    <div class="card mt-4 shadow-sm">
        <div class="card-header bg-secondary text-white">
            <h4 class="mb-0">Data Mahasiswa Tersimpan</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Jurusan</th>
                        <th>Jenis Kelamin</th>
                        <th>Hobi</th>
                        <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $result = $conn->query("SELECT * FROM mahasiswa ORDER BY id DESC");
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>".$no++."</td>
                            <td>".$row['nama']."</td>
                            <td>".$row['nim']."</td>
                            <td>".$row['jurusan']."</td>
                            <td>".$row['jenis_kelamin']."</td>
                            <td>".$row['hobi']."</td>
                            <td>".$row['alamat']."</td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>