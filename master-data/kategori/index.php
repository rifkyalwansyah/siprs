<?php
session_start();

include '../../config/koneksi.php';

$data = mysqli_query(
$conn,
"SELECT * FROM kategori_aset
ORDER BY id_kategori DESC"
);

include '../../templates/header.php';
include '../../templates/sidebar.php';
?>

<div class="content">

<div class="topbar">

<h3>Data Kategori Aset</h3>

</div>

<div class="card card-custom">

<div class="card-body">

<a
href="tambah.php"
class="btn btn-primary mb-3">

Tambah Kategori

</a>

<table class="table table-bordered">

<tr>

<th>No</th>
<th>Nama Kategori</th>
<th>Aksi</th>

</tr>

<?php
$no=1;

while($row=mysqli_fetch_assoc($data))
{
?>

<tr>

<td><?= $no++; ?></td>

<td><?= $row['nama_kategori']; ?></td>

<td>

<a
href="edit.php?id=<?= $row['id_kategori']; ?>"
class="btn btn-warning btn-sm">

Edit

</a>

<a
href="hapus.php?id=<?= $row['id_kategori']; ?>"
class="btn btn-danger btn-sm">

Hapus

</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</div>

</div>

<?php
include '../../templates/footer.php';
?>