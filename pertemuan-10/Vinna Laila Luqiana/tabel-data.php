<html>

<head>
    <title>Data</title>
    <style>
        body{
            margin: 0px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .content{
            width: 100%;
            max-width: 1000px;
            margin: auto;
            border-radius: 15px;
            box-shadow: 1px 1px 5px rgb(194, 193, 193);
            /* text-align: center; */
            padding: 10px 10px;
            margin-top: 20px;;
        }

        .btn-tambah{
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            background-color: #4e71ff;
            padding: 10px;
            border-radius: 12px;
            color: white;
            font-weight: bold;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="content">
        <a href="form-user.php" class="btn-tambah">Tambah Data</a>
        <table border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Jurusan</th>
                    <th>Minat dan Bakat</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                require 'KoneksiDB.php';
                $query = $db->prepare('SELECT * FROM tb_mahasiswa');
                $query->execute();
                $mahasiswa = $query->fetchAll();
                foreach ($mahasiswa as $mhs) {
                ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $mhs['nama']; ?></td>
                        <td><?php echo $mhs['jenis_kelamin']; ?></td>
                        <td><?php echo $mhs['jurusan']; ?></td>
                        <td><?php echo $mhs['minat']; ?></td>
                        <td><?php echo $mhs['alamat']; ?></td>
                    </tr>
                <?php
                    $i++;
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>


<?php
