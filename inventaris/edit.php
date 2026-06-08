<?php

session_start();

if(!isset($_SESSION['id']))
{
    header("Location: ../login.php");
    exit;
}

include '../config/koneksi.php';

$id = $_GET['id'];

$data = mysqli_fetch_assoc(
mysqli_query(
$conn,
"SELECT * FROM aset WHERE id_aset='$id'"
));

$kategori = mysqli_query(
$conn,
"SELECT * FROM kategori_aset"
);

$ruangan = mysqli_query(
$conn,
"SELECT * FROM ruangan"
);

if(isset($_POST['update']))
{
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $id_kategori = $_POST['kategori'];
    $id_ruangan = $_POST['ruangan'];
    $kondisi = $_POST['kondisi'];
    $jumlah = $_POST['jumlah'];
    $tahun = $_POST['tahun'];
    $keterangan = $_POST['keterangan'];

    if($_FILES['foto']['name'] != '')
    {
        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];

        move_uploaded_file(
            $tmp,
            "../assets/uploads/".$foto
        );

        mysqli_query(
        $conn,

        "UPDATE aset SET

        kode_aset='$kode',
        nama_aset='$nama',
        id_kategori='$id_kategori',
        id_ruangan='$id_ruangan',
        kondisi='$kondisi',
        jumlah='$jumlah',
        tahun_perolehan='$tahun',
        keterangan='$keterangan',
        foto='$foto'

        WHERE id_aset='$id'"
        );
    }
    else
    {
        mysqli_query(
        $conn,

        "UPDATE aset SET

        kode_aset='$kode',
        nama_aset='$nama',
        id_kategori='$id_kategori',
        id_ruangan='$id_ruangan',
        kondisi='$kondisi',
        jumlah='$jumlah',
        tahun_perolehan='$tahun',
        keterangan='$keterangan'

        WHERE id_aset='$id'"
        );
    }

    header("Location:index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Edit Aset</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-4">

<div class="card shadow">

<div class="card-header">

<h3>Edit Aset</h3>

</div>

<div class="card-body">

<form method="POST" enctype="multipart/form-data">

<label>Kode Aset</label>
<input type="text" name="kode" class="form-control"
value="<?php echo $data['kode_aset']; ?>">

<br>

<label>Nama Aset</label>
<input type="text" name="nama" class="form-control"
value="<?php echo $data['nama_aset']; ?>">

<br>

<label>Kategori</label>

<select name="kategori" class="form-control">

<?php while($k=mysqli_fetch_assoc($kategori)){ ?>

<option
value="<?php echo $k['id_kategori']; ?>"
<?php if($data['id_kategori']==$k['id_kategori']) echo "selected"; ?>>

<?php echo $k['nama_kategori']; ?>

</option>

<?php } ?>

</select>

<br>

<label>Ruangan</label>

<select name="ruangan" class="form-control">

<?php while($r=mysqli_fetch_assoc($ruangan)){ ?>

<option
value="<?php echo $r['id_ruangan']; ?>"
<?php if($data['id_ruangan']==$r['id_ruangan']) echo "selected"; ?>>

<?php echo $r['nama_ruangan']; ?>

</option>

<?php } ?>

</select>

<br>

<label>Kondisi</label>

<input
type="text"
name="kondisi"
class="form-control"
value="<?php echo $data['kondisi']; ?>">

<br>

<label>Jumlah</label>

<input
type="number"
name="jumlah"
class="form-control"
value="<?php echo $data['jumlah']; ?>">

<br>

<label>Tahun Perolehan</label>

<input
type="number"
name="tahun"
class="form-control"
value="<?php echo $data['tahun_perolehan']; ?>">

<br>

<label>Keterangan</label>

<textarea
name="keterangan"
class="form-control"><?php echo $data['keterangan']; ?></textarea>

<br>

<label>Foto Saat Ini</label>

<br><br>

<?php if(!empty($data['foto'])){ ?>

<img
src="../assets/uploads/<?php echo $data['foto']; ?>"
width="120">

<?php } ?>

<br><br>

<label>Ganti Foto</label>

<input
type="file"
name="foto"
class="form-control">

<br>

<button
type="submit"
name="update"
class="btn btn-primary">

Update

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