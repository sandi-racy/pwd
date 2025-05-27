<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="style.css">
    <style>
        form {
            margin-left: 25px;
        }

        td {
            padding: 5px;
            text-align: left;
        }

        input {
            width: 100%;
            padding: 10px 18px;
            margin: 5px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .btn-submit{
            background-color: #4CAF50;
            border: none;
        }

        .btn-reset{
            background-color: #4e71ff;
            border: none;
        }


    </style>
</head>

<body>
    <?php require "header.php"; ?>
    <form action="simpan.php" method="POST">
        <h2>Input Data</h2>
        <table>
            <tr>
                <td><label for="kodeProduk">Kode Produk</label></td>
                <td>:</td>
                <td><input type="text" name="kodeProduk"></td>
            </tr>
            <tr>
                <td><label for="namaProduk">Nama Produk</label></td>
                <td>:</td>
                <td><input type="text" name="namaProduk"></td>
            </tr>
            <tr>
                <td><label for="hargaProduk">Harga Produk</label></td>
                <td>:</td>
                <td><input type="number" name="hargaProduk" step="0.01"></td>
            </tr>
            <tr>
                <td><label for="diskon">Diskon</label></td>
                <td>:</td>
                <td><input type="number" name="diskon" step="0.01"></td>
            </tr>
            <tr>
                <td><label for="lokasi">Lokasi</label></td>
                <td>:</td>
                <td><input type="text" name="lokasi"></td>
            </tr>
            <tr>
                <td><label for="estimasi">Estimasi</label></td>
                <td>:</td>
                <td><input type="date" name="estimasi"></td>
            </tr>
        </table>
        <br>
        <button type="submit" class="btn btn-submit">Simpan</button>
        <button type="reset" class="btn btn-reset">Reset</button>
    </form>
</body>

</html>