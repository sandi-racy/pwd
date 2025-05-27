<?php
require_once 'koneksi.php';

$id = $_GET['id'] ?? 0;
$sql = "SELECT id, nama_produk, harga, harga_awal, lokasi, pengiriman FROM produk WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();
    $nama_produk = $product['nama_produk'];
    $harga = $product['harga'];
    $harga_awal = $product['harga_awal'];
    $lokasi = $product['lokasi'];
    $pengiriman = $product['pengiriman'];
} else {
    echo "<p>Data produk tidak ditemukan.</p>";
    exit();
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Produk</h1>
        <form action="process.php?action=update&id=<?php echo $id; ?>" method="post" class="product-form">
            <label for="nama_produk">Nama Produk:</label><br>
            <input type="text" id="nama_produk" name="nama_produk" value="<?php echo htmlspecialchars($nama_produk); ?>" required><br><br>
            <label for="harga">Harga:</label><br>
            <input type="text" id="harga" name="harga" value="<?php echo htmlspecialchars($harga); ?>" required><br><br>
            <label for="harga_awal">Harga Awal (opsional):</label><br>
            <input type="text" id="harga_awal" name="harga_awal" value="<?php echo htmlspecialchars($harga_awal); ?>"><br><br>
            <label for="lokasi">Lokasi:</label><br>
            <input type="text" id="lokasi" name="lokasi" value="<?php echo htmlspecialchars($lokasi); ?>"><br><br>
            <label for="pengiriman">Estimasi Pengiriman:</label><br>
            <input type="text" id="pengiriman" name="pengiriman" value="<?php echo htmlspecialchars($pengiriman); ?>"><br><br>
            <button type="submit" class="button save-button">Simpan Perubahan</button>
            <a href="index.php" class="button cancel-button">Batal</a>
        </form>
    </div>
</body>
</html>