<?php
// membuat koneksi
$conn = mysqli_connect("localhost","root","","phpdatabase");
// cek koneksi jika error
if (!$conn) {
    die('Koneksi Error : '.mysql_connect_errno()
    .' - '.mysqli_connect_error());
}
// ambil data dari tabel mahasiswa/query data mahasiswa
$result = mysqli_query($conn,"SELECT * FROM mahasiswa");
// function query akan menerima isi parameter dari string query yang ada pada index2.php
function query($query_kedua)
{
    // dikarenakan $conn diluar function query maka dibutuhkan scope global $conn
    global $conn;
    $result = mysqli_query($conn,$query_kedua);
    // wadah kosong untuk menampung isi array pada saat looping
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah ($data) 
{
    global $conn;
    $nama = $data["Nama"];
    $nim = $data["Nim"];
    $email = $data["Email"];
    $jurusan = $data["Jurusan"];
    $gambar = $data["Gambar"];

    $query = " INSERT INTO mahasiswa
                VALUES
                ('','$nama','$nim','$email','$jurusan','$gambar')";
                mysqli_query($conn,$query);

                return mysqli_affected_rows($conn);     
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn,"DELETE FROM mahasiswa WHERE id =$id");
    return mysqli_affected_rows($conn);
    
}

function edit ($data)
{
    global $conn;

    $id = $data["id"];
    $nama = htmlspecialchars($data["Nama"]);
    $nim = htmlspecialchars($data["Nim"]);
    $email = htmlspecialchars($data["Email"]);
    $jurusan = htmlspecialchars($data["Jurusan"]);
    $gambar = htmlspecialchars($data["Gambar"]);

    $query= "   UPDATE mahasiswa SET
                Nama = '$nama',
                Nim = '$nim',
                Email = '$email',
                Jurusan = '$jurusan',
                Gambar = '$gambar'
                WHERE id= $id ";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

function cari($keyword){
    $sql="SELECT * FROM mahasiswa
    WHERE
    Nama LIKE '%$keyword%' OR
    NIM LIKE '%$keyword%' OR
    Email LIKE '%$keyword%' OR
    Jurusan LIKE '%$keyword%'
    ";
    var_dump($sql);
    //die();
    return query($sql);
}
?>
