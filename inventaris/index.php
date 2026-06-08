<?php
session_start();

if(!isset($_SESSION['id']))
{
    header("Location: ../login.php");
    exit;
}

include '../config/koneksi.php';

$data = mysqli_query(
$conn,

"SELECT aset.*,
kategori_aset.nama_kategori,
ruangan.nama_ruangan

FROM aset

LEFT JOIN kategori_aset
ON aset.id_kategori = kategori_aset.id_kategori

LEFT JOIN ruangan
ON aset.id_ruangan = ruangan.id_ruangan

ORDER BY aset.id_aset DESC"
);
?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">

<title>Inventaris Aset</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>

<div class="container mt-4">

<div class="card shadow">

<div class="card-header d-flex justify-content-between">

<h3>Data Inventaris Aset</h3>

<a href="tambah.php" class="btn btn-primary">
Tambah Aset
</a>

</div>

<div class="card-body">

<table class="table table-bordered table-hover">

<thead>

<tr>

<th>Foto</th>
<th>Kode</th>
<th>Nama Aset</th>
<th>Kategori</th>
<th>Ruangan</th>
<th>Kondisi</th>
<th>Jumlah</th>
<th>Tahun</th>
<th>Aksi</th>

</tr>

</thead>

<tbody>

<?php while($row=mysqli_fetch_assoc($data)){ ?>

<tr>

<td>

<?php if(!empty($row['foto'])){ ?>

<img
src="../assets/uploads/<?php echo $row['foto']; ?>"
width="80"
height="80"
style="object-fit:cover;">

<?php } else { ?>

Tidak Ada

<?php } ?>

</td>

<td><?php echo $row['kode_aset']; ?></td>

<td><?php echo $row['nama_aset']; ?></td>

<td><?php echo $row['nama_kategori']; ?></td>

<td><?php echo $row['nama_ruangan']; ?></td>

<td><?php echo $row['kondisi']; ?></td>

<td><?php echo $row['jumlah']; ?></td>

<td><?php echo $row['tahun_perolehan']; ?></td>

<td>

<a
href="edit.php?id=<?php echo $row['id_aset']; ?>"
class="btn btn-warning btn-sm">

Edit

</a>

<a
href="hapus.php?id=<?php echo $row['id_aset']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin hapus data?')">

Hapus

</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</div>

</body>
</html>