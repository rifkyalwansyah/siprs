<?php

session_start();
include '../../config/koneksi.php';

if(isset($_POST['simpan']))
{
    $nama=$_POST['nama'];
    $ket=$_POST['keterangan'];

    mysqli_query(
    $conn,

    "INSERT INTO ruangan
    (nama_ruangan,keterangan)

    VALUES

    ('$nama','$ket')"
    );

    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Tambah Ruangan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="../../assets/css/style.css">

</head>

<body>

<div class="main">

<div class="content">

<div class="card shadow">

<div class="card-header">

Tambah Ruangan

</div>

<div class="card-body">

<form method="POST">

<label>Nama Ruangan</label>

<input
type="text"
name="nama"
class="form-control">

<br>

<label>Keterangan</label>

<textarea
name="keterangan"
class="form-control"></textarea>

<br>

<button
name="simpan"
class="btn btn-success">

Simpan

</button>

</form>

</div>

</div>

</div>

</div>

</body>
</html>