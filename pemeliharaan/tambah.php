<?php

include '../config/koneksi.php';

$aset = mysqli_query(
$conn,
"SELECT * FROM aset"
);

$ambil = mysqli_query(
$conn,
"SELECT MAX(id_pemeliharaan) as terakhir
FROM pemeliharaan"
);

$data = mysqli_fetch_assoc($ambil);

$nomor = $data['terakhir'] + 1;

$kode = "PMH".str_pad(
$nomor,
4,
"0",
STR_PAD_LEFT
);

if(isset($_POST['simpan']))
{
    $id_aset = $_POST['aset'];
    $tanggal = $_POST['tanggal'];
    $jenis = $_POST['jenis'];
    $biaya = $_POST['biaya'];
    $keterangan = $_POST['keterangan'];

    mysqli_query($conn,"

    INSERT INTO pemeliharaan

    (
    kode_pemeliharaan,
    id_aset,
    tanggal,
    jenis_pemeliharaan,
    biaya,
    keterangan,
    status
    )

    VALUES

    (
    '$kode',
    '$id_aset',
    '$tanggal',
    '$jenis',
    '$biaya',
    '$keterangan',
    'Proses'
    )

    ");

    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Tambah Pemeliharaan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-4">

<div class="card">

<div class="card-header">

<h3>Tambah Pemeliharaan</h3>

</div>

<div class="card-body">

<form method="POST">

<label>Kode</label>

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

<label>Tanggal</label>

<input
type="date"
name="tanggal"
class="form-control">

<br>

<label>Jenis Pemeliharaan</label>

<input
type="text"
name="jenis"
class="form-control">

<br>

<label>Biaya</label>

<input
type="number"
name="biaya"
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

</body>
</html>