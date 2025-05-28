<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validasi</title>
    <style>
        body {
            margin: 0px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .content {
            width: 100%;
            max-width: 450px;
            margin: auto;
            border-radius: 15px;
            box-shadow: 1px 1px 5px rgb(194, 193, 193);
            text-align: center;
            padding: 10px;
            margin-top: 20px;
            ;
        }

        form {
            margin-left: 25px;
        }

        td {
            padding: 5px;
            text-align: left;
        }

        input[type="text"],
        .jurusan {
            font-size: 15px;
            width: 100%;
            padding: 10px 18px;
            margin: 5px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            font-size: 12px;
            width: 100%;
            height: 100px;
            padding: 10px 18px;
            margin: 5px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .btn {
            width: fit-content;
            padding: 10px 15px;
            text-decoration: none;
            color: white;
            font-weight: bold;
            border-radius: 10px;
            margin-bottom: 20px;
            display: inline-block;
        }

        .btn-submit {
            background-color: #4CAF50;
            border: none;
        }

        .btn-reset {
            background-color: #4e71ff;
            border: none;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_SESSION['error'])) {
        $errorMessage = addslashes($_SESSION['error']);
        echo "<script>alert(\"$errorMessage\");</script>";
        unset($_SESSION['error']);
    } else if (isset($_SESSION['success'])) {
        $suksesMessage = addslashes($_SESSION['success']);
        echo "<script>alert(\"$suksesMessage\");</script>";
        unset($_SESSION['success']);
    }
    ?>
    <div class="content">
        <form action="submit.php" method="POST">
            <h2>Input Data</h2>
            <table>
                <tr>
                    <td><label for="nama">Nama</label></td>
                    <td>:</td>
                    <td><input type="text" name="nama"></td>
                </tr>
                <tr>
                    <td><label for="jk">Jenis Kelamin</label></td>
                    <td>:</td>
                    <td><input type="radio" name="jk" value="Laki-laki">L
                        <input type="radio" name="jk" value="Perempuan">P
                    </td>
                </tr>
                <tr>
                    <td><label for="jurusan">jurusan</label></td>
                    <td>:</td>
                    <td>
                        <select name="jurusan" id="jurusan" class="jurusan">
                            <option value="">-</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Teknik Sipil">Teknik Sipil</option>
                            <option value="Teknik Industri">Teknik Industri</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="minat">Minat </label></td>
                    <td>:</td>
                    <td>
                        <input type="checkbox" name="minat[]" id="" value="Programming">Programming
                        <input type="checkbox" name="minat[]" id="" value="Robotika">Robotika
                        <input type="checkbox" name="minat[]" id="" value="UI/UX">UI/UX
                        <input type="checkbox" name="minat[]" id="" value="Dekstop">Dekstop
                        <input type="checkbox" name="minat[]" id="" value="Mobile">Mobile
                    </td>
                    </td>

                </tr>
                <tr>
                    <td><label for="alamat">alamat</label></td>
                    <td>:</td>
                    <td><textarea name="alamat" id=""></textarea></td>
                </tr>
            </table>
            <br>
            <button type="submit" class="btn btn-submit">Simpan</button>
            <button type="reset" class="btn btn-reset">Reset</button>
        </form>
    </div>

</body>

</html>