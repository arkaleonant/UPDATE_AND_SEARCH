<?php
    require 'functions.php';
    //cek apakah button submit sudah di tekan atau belum
    if(isset($_POST['submit']))
    {

    //cek sukses data ditambah menggunakan function tambah pada functions.php
    if(edit($_POST)>0)
    {
        echo "
        <script> 
            alert('data berhasil disimpan')
            document.location.href='index.php'
        </script>;
        ";
    }else{
        echo "
        <script>
            alert('data gagal diperbaharui');
            document.location.href='edit.php';
        </script>";
            echo "</br>";
            echo mysqli_error($conn);
        }
    }
    $id=$_GET[id];
    //var_dump($id);
    $mhs=query("SELECT * FROM mahasiswa WHERE id=$id")[0];
    //var_dump($mhs[0]["Nama"]);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Update Data</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <h1>Update data mahasiswa</h1>
    <form action="" method="post">
    <li>
        <input type="hidden" name="id" value="<?= $mhs[id]?>">
    </li>
        <ul>
            <li>
                <label for="Nama">Nama :</label>
                <input type="text" name="Nama" id="Nama" value="<?= $mhs[Nama];?>">
            </li>
            <li>
                <label for="Nim">Nim :</label>
                <input type="text" name="Nim" id="Nim" required value="<?= $mhs[NIM];?>">
            </li>
            <li>
                <label for="Email">Email :</label>
                <input type="text" name="Email" id="Email" required value="<?= $mhs[Email];?>"> 
            </li>
            <li>
                <label for="Jurusan">Jurusan :</label>
                <input type="text" name="Jurusan" id="Jurusan" required value="<?= $mhs[Jurusan];?>">
            </li>
            <li>
                <label for="Gambar">Gambar :</label>
                <input type="text" name="Gambar" id="Gambar" required value="<?= $mhs[Gambar];?>">
            </li>
            <li>
                <button type="submit" name="submit"> Update </button>
            </li>
        </ul>
    </form>
</body>
</html>
