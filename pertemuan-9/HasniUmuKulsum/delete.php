<?php
$id = $_GET['id'] ?? 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Produk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Hapus Produk</h1>
        <p>Apakah Anda yakin ingin menghapus produk dengan ID <?php echo $id; ?>?</p>
        <div class="actions">
            <a href="process.php?action=delete&id=<?php echo $id; ?>" class="button delete-button">Ya, Hapus</a>
            <a href="index.php" class="button cancel-button">Batal</a>
        </div>
    </div>
</body>
</html>