<?php

session_start();

if(!isset($_SESSION['id']))
{
    header("Location: ../login.php");
    exit;
}

include '../config/koneksi.php';

$kategori = mysqli_query(
    $conn,
    "SELECT * FROM kategori_aset"
);

$ruangan = mysqli_query(
    $conn,
    "SELECT * FROM ruangan"
);

if(isset($_POST['simpan']))
{
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $id_kategori = $_POST['kategori'];
    $id_ruangan = $_POST['ruangan'];
    $kondisi = $_POST['kondisi'];
    $jumlah = $_POST['jumlah'];
    $tahun = $_POST['tahun'];
    $keterangan = $_POST['keterangan'];

    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];

    if(!empty($foto))
    {
        move_uploaded_file(
            $tmp,
            "../assets/uploads/".$foto
        );
    }

    mysqli_query(
        $conn,

        "INSERT INTO aset
        (
            kode_aset,
            nama_aset,
            id_kategori,
            id_ruangan,
            kondisi,
            jumlah,
            tahun_perolehan,
            keterangan,
            foto
        )

        VALUES

        (
            '$kode',
            '$nama',
            '$id_kategori',
            '$id_ruangan',
            '$kondisi',
            '$jumlah',
            '$tahun',
            '$keterangan',
            '$foto'
        )"
    );

    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Tambah Aset</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>

<div class="container mt-4">

<div class="card shadow">

<div class="card-header">

<h3>Tambah Data Aset</h3>

</div>

<div class="card-body">

<form method="POST" enctype="multipart/form-data">

<div class="mb-3">

<label>Kode Aset</label>

<input
type="text"
name="kode"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Nama Aset</label>

<input
type="text"
name="nama"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Kategori</label>

<select
name="kategori"
class="form-control"
required>

<option value="">
-- Pilih Kategori --
</option>

<?php
while($k=mysqli_fetch_assoc($kategori))
{
?>

<option value="<?php echo $k['id_kategori']; ?>">

<?php echo $k['nama_kategori']; ?>

</option>

<?php
}
?>

</select>

</div>

<div class="mb-3">

<label>Ruangan</label>

<select
name="ruangan"
class="form-control"
required>

<option value="">
-- Pilih Ruangan --
</option>

<?php
while($r=mysqli_fetch_assoc($ruangan))
{
?>

<option value="<?php echo $r['id_ruangan']; ?>">

<?php echo $r['nama_ruangan']; ?>

</option>

<?php
}
?>

</select>

</div>

<div class="mb-3">

<label>Kondisi</label>

<select
name="kondisi"
class="form-control">

<option value="Baik">
Baik
</option>

<option value="Rusak Ringan">
Rusak Ringan
</option>

<option value="Rusak Berat">
Rusak Berat
</option>

</select>

</div>

<div class="mb-3">

<label>Jumlah</label>

<input
type="number"
name="jumlah"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Tahun Perolehan</label>

<input
type="number"
name="tahun"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Keterangan</label>

<textarea
name="keterangan"
class="form-control"
rows="4"></textarea>

</div>

<div class="mb-3">

<label>Foto Aset</label>

<input
type="file"
name="foto"
class="form-control"
accept=".jpg,.jpeg,.png">

</div>

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