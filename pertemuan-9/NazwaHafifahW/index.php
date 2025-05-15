<html>
    <head>
        <title>CRUD</title>
    </head>
    <body>
        <a href="tambah.php">tambahan mahasiswa</a><br>
        <table border='1'>
            <thead>
                <tr>

                    <th>npm</th>
                    <th>Nama</th>
                    <th>Tanggal lahir</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $db = new PDO('mysql:host=localhost;dbname=pwd','root','');
                    $query = $db->prepare('SELECT * FROM mahasiswa');
                    $query->execute();
                    $listMahasiswa = $query->fetchAll();
                    foreach ($listMahasiswa as $mahasiswa) {

                ?>
                    <tr>
                        <td><?php echo $mahasiswa['npm']; ?></td>
                        <td><?php echo $mahasiswa['nama']; ?></td>
                        <td><?php echo $mahasiswa['tanggal_lahir'];?></td>
                        <td>
                            <a href="edit.php <?php echo $mahasiswa['npm']; ?>">edit</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </body>
</html>