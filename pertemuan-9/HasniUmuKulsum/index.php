<?php
require_once 'koneksi.php';

$sql = "SELECT id, nama_produk, harga, harga_awal, lokasi, pengiriman FROM produk";
$result = $conn->query($sql);

$products = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

$conn->close();

if (isset($_GET['message'])) {
    echo '<div class="alert alert-success">' . htmlspecialchars($_GET['message']) . '</div>';
}
if (isset($_GET['error'])) {
    echo '<div class="alert alert-danger">' . htmlspecialchars($_GET['error']) . '</div>';
}

function formatRupiah($angka){
    $rupiah = 'Rp' . number_format($angka, 0, ',', '.');
    return $rupiah;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Produk</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <h1>Informasi Produk</h1>
        <?php if (empty($products)): ?>
            <p>Belum ada data produk. Silakan tambahkan baru.</p>
        <?php else: ?>
            <?php foreach ($products as $product): ?>
                <div class="product-card">
                    <h2 class="product-title"><?php echo htmlspecialchars($product['nama_produk']); ?></h2>
                    <p class="product-price"><?php echo formatRupiah(str_replace(['Rp', '.', ','], '', $product['harga'])); ?></p>
                    <?php if (!empty($product['harga_awal'])): ?>
                        <p class="product-original-price">
                            <span style="text-decoration: line-through;"><?php echo formatRupiah(str_replace(['Rp', '.', ','], '', $product['harga_awal'])); ?></span>
                            <?php
                            if (!empty($product['harga']) && !empty($product['harga_awal'])) {
                                $harga_awal_numeric = str_replace(['Rp', '.', ','], '', $product['harga_awal']);
                                $harga_numeric = str_replace(['Rp', '.', ','], '', $product['harga']);
                                if (is_numeric($harga_awal_numeric) && is_numeric($harga_numeric) && $harga_awal_numeric > 0) {
                                    $discount = round((($harga_awal_numeric - $harga_numeric) / $harga_awal_numeric) * 100);
                                    echo '<span class="discount"> ' . $discount . '%</span>';
                                }
                            }
                            ?>
                        </p>
                    <?php endif; ?>
                    <?php if (!empty($product['lokasi'])): ?>
                        <p class="product-location"><i class="fas fa-map-marker-alt"></i> <?php echo htmlspecialchars($product['lokasi']); ?></p>
                    <?php endif; ?>
                    <?php if (!empty($product['pengiriman'])): ?>
                        <p class="product-delivery">Tiba <?php echo htmlspecialchars($product['pengiriman']); ?></p>
                    <?php endif; ?>
                    <div class="actions">
                        <a href="edit.php?id=<?php echo $product['id']; ?>" class="button edit-button">Edit</a>
                        <a href="delete.php?id=<?php echo $product['id']; ?>" class="button delete-button">Hapus</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <div class="actions">
            <a href="create.php" class="button create-button">Tambah Baru</a>
        </div>
    </div>
</body>
</html>