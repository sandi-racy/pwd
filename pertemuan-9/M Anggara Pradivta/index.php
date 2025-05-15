<?php
include 'koneksi.php';
$query = mysqli_query($koneksi, "SELECT * FROM produk");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Produk</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background: #f4f4f4;
      padding: 30px;
    }

    .container {
      display: flex;
    }

    .sidebar {
      width: 200px;
      padding-right: 20px;
    }

    .btn {
      text-decoration: none;
      padding: 10px 16px;
      border-radius: 6px;
      font-weight: 600;
      display: block;
      width: 100%;
      margin-bottom: 10px;
      text-align: center;
    }

    .btn-tambah {
      background-color: #28a745;
      color: white;
    }

    .btn-edit {
      background-color: #ffc107;
      color: black;
    }

    .btn-hapus {
      background-color: #dc3545;
      color: white;
    }

    .content {
      flex-grow: 1;
    }

    .produk {
      background: white;
      border-radius: 12px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
      padding: 20px;
      width: 300px;
      margin: 20px auto;
    }

    .nama {
      font-size: 14px;
      color: #333;
      margin-bottom: 4px;
    }

    .harga {
      font-size: 22px;
      font-weight: bold;
      color: #000;
    }

    .harga-bawah {
      margin-top: 4px;
      font-size: 14px;
    }

    .harga-coret {
      text-decoration: line-through;
      color: #999;
      margin-right: 8px;
    }

    .diskon {
      color: red;
    }

    .lokasi {
      margin-top: 12px;
      color: #444;
      font-size: 14px;
      display: flex;
      align-items: center;
    }

    .lokasi i {
      color: purple;
      margin-right: 6px;
    }

    .estimasi {
      margin-top: 4px;
      font-size: 13px;
      color: #666;
    }
  </style>
</head>
<body>

<div class="container">
  <!-- Sidebar Kiri -->
  <div class="sidebar">
    <a href="tambah.php" class="btn btn-tambah">➕ Tambah Produk</a>
    
  </div>

  <!-- Daftar Produk -->
  <div class="content">
    <?php while($data = mysqli_fetch_array($query)) { ?>
  <div class="produk">
    <div class="nama"><?= htmlspecialchars($data['nama']); ?></div>
    <div class="harga">Rp<?= number_format($data['harga'] * 1000, 0, ',', '.'); ?></div>
    
    <div class="harga-bawah">
      <span class="harga-coret">Rp<?= number_format($data['harga_coret'] * 1000, 0, ',', '.'); ?></span>
      <span class="diskon"><?= abs($data['diskon']) . '%'; ?></span>
    </div>

    <div class="lokasi">
      <i>✅</i> <?= htmlspecialchars($data['lokasi']); ?>
    </div>
    
    <div class="estimasi">Tiba <?= htmlspecialchars($data['estimasi']); ?></div>

    
    <div style="margin-top: 12px;">
      <a href="edit.php?id=<?= $data['id']; ?>" style="padding: 4px 10px; font-size: 13px; background: #28a745; color: white; border-radius: 4px; text-decoration: none; margin-right: 5px;">Edit</a>
      <a href="hapus.php?id=<?= $data['id']; ?>" onclick="return confirm('Yakin ingin menghapus produk ini?');" style="padding: 4px 10px; font-size: 13px; background: #dc3545; color: white; border-radius: 4px; text-decoration: none;">Hapus</a>
    </div>
  </div>
<?php } ?>


  </div>
</div>

</body>
</html>