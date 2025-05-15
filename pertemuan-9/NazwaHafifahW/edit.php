<?php
require 'db.php';

$npm = $_GET['npm'];
$query =$db->prepare(query: 'SELECT * FROM mahasiswa WHERE npm = ?');
$query->execute(params: [$npm]);
$mahasiswa = $query->fetch(mode: PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
</head>
<body>
    <form action="update.php" method="POST">
        <input type="hidden" name="npm" values="<?php echo $mahasiswa['npm']?> " />
        <div>
            <label>Nama</label>
            <input type="text" name="nama" value="<?php echo $mahasiswa['nama']?>" />
        </div>
        <div>
            <label>Tanggal Lahir</label>
            <input type="text" name="tanggal_lahir" value="<?php echo $mahasiswa['tanggal_lahir']?>" />
        </div>
        <button>Simpan</button>
    </form>
</body>
</html>
