<?php

session_start();

include '../config/koneksi.php';

$aset = mysqli_query(
$conn,
"SELECT * FROM aset"
);

$ambil = mysqli_query(
$conn,
"SELECT MAX(id_pinjam) as terakhir FROM peminjaman"
);

$data = mysqli_fetch_assoc($ambil);

$nomor = $data['terakhir'] + 1;

$kode = "PJM".str_pad(
$nomor,
4,
"0",
STR_PAD_LEFT
);

if(isset($_POST['simpan']))
{
    $id_aset = $_POST['aset'];
    $nama = $_POST['nama'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $jumlah = $_POST['jumlah'];

    mysqli_query($conn,"
    INSERT INTO peminjaman
    (
    kode_pinjam,
    id_aset,
    nama_peminjam,
    tanggal_pinjam,
    jumlah
    )

    VALUES

    (
    '$kode',
    '$id_aset',
    '$nama',
    '$tgl_pinjam',
    '$jumlah'
    )
    ");

    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Tambah Peminjaman</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-4">

<div class="card">

<div class="card-header">

<h3>Tambah Peminjaman</h3>

</div>

<div class="card-body">

<form method="POST">

<label>Kode Peminjaman</label>

<input
type="text"
class="form-control"
value="<?= $kode; ?>"
readonly>

<br>

<label>Aset</label>

<select
name="aset"
class="form-control">

<?php while($a=mysqli_fetch_assoc($aset)){ ?>

<option value="<?= $a['id_aset']; ?>">

<?= $a['nama_aset']; ?>

</option>

<?php } ?>

</select>

<br>

<label>Nama Peminjam</label>

<input
type="text"
name="nama"
class="form-control">

<br>

<label>Tanggal Pinjam</label>

<input
type="date"
name="tgl_pinjam"
class="form-control">

<br>

<label>Jumlah</label>

<input
type="number"
name="jumlah"
class="form-control">

<br>

<button
type="submit"
name="simpan"
class="btn btn-success">

Simpan

</button>

<a
href="index.php"
class="btn btn-secondary">

Kembali

</a>

</form>

</div>

</div>

</div>

</body>
</html>