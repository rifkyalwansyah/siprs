<?php
session_start();

if(!isset($_SESSION['id']))
{
    header("Location: login.php");
    exit;
}

include 'config/koneksi.php';

$total_aset = mysqli_fetch_assoc(
mysqli_query(
$conn,
"SELECT COUNT(*) as total FROM aset"
));

$total_kategori = mysqli_fetch_assoc(
mysqli_query(
$conn,
"SELECT COUNT(*) as total FROM kategori_aset"
));

$total_ruangan = mysqli_fetch_assoc(
mysqli_query(
$conn,
"SELECT COUNT(*) as total FROM ruangan"
));

$total_baik = mysqli_fetch_assoc(
mysqli_query(
$conn,
"SELECT COUNT(*) as total
FROM aset
WHERE kondisi='Baik'"
));

?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Dashboard SIPRS</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="assets/css/style.css">

<style>

.card-stat{
    border:none;
    border-radius:15px;
    box-shadow:0 0 10px rgba(0,0,0,.1);
}

.card-stat h2{
    font-size:35px;
    font-weight:bold;
}

</style>

</head>

<body>

<div class="sidebar">

<div class="logo">

<img src="assets/images/logo.png" width="80">

<h5>
SIPRS
<br>
KECAMATAN CIBARUSAH
</h5>

</div>

<div class="menu">

<a href="dashboard.php" class="active">
🏠 Dashboard
</a>

<a href="master-data/kategori/index.php">
📁 Data Kategori
</a>

<a href="master-data/ruangan/index.php">
🏢 Data Ruangan
</a>

<a href="inventaris/index.php">
📦 Inventaris Aset
</a>

<a href="#">
📋 Peminjaman
</a>

<a href="#">
🔧 Pemeliharaan
</a>

<a href="#">
📄 Laporan
</a>

<a href="logout.php">
🚪 Logout
</a>

</div>

</div>

<div class="main">

<div class="topbar">

<h3>Dashboard SIPRS</h3>

<div>

Selamat Datang,

<b>
<?php echo $_SESSION['nama']; ?>
</b>

</div>

</div>

<div class="content">

<div class="row">

<div class="col-md-3">

<div class="card card-stat bg-primary text-white">

<div class="card-body">

<h2>
<?php echo $total_aset['total']; ?>
</h2>

<p>Total Aset</p>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card card-stat bg-success text-white">

<div class="card-body">

<h2>
<?php echo $total_kategori['total']; ?>
</h2>

<p>Total Kategori</p>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card card-stat bg-warning text-dark">

<div class="card-body">

<h2>
<?php echo $total_ruangan['total']; ?>
</h2>

<p>Total Ruangan</p>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card card-stat bg-info text-white">

<div class="card-body">

<h2>
<?php echo $total_baik['total']; ?>
</h2>

<p>Aset Kondisi Baik</p>

</div>

</div>

</div>

</div>

<br>

<div class="card shadow">

<div class="card-header">

<h5>Aset Terbaru</h5>

</div>

<div class="card-body">

<table class="table table-bordered">

<tr>

<th>Foto</th>
<th>Kode</th>
<th>Nama Aset</th>
<th>Kategori</th>
<th>Kondisi</th>

</tr>

<?php

$data = mysqli_query(
$conn,

"SELECT aset.*,
kategori_aset.nama_kategori

FROM aset

LEFT JOIN kategori_aset
ON aset.id_kategori = kategori_aset.id_kategori

ORDER BY aset.id_aset DESC
LIMIT 5"
);

while($row=mysqli_fetch_assoc($data))
{
?>

<tr>

<td>

<?php
if(!empty($row['foto']))
{
?>

<img
src="assets/uploads/<?php echo $row['foto']; ?>"
width="60">

<?php
}
else
{
echo "-";
}
?>

</td>

<td>
<?php echo $row['kode_aset']; ?>
</td>

<td>
<?php echo $row['nama_aset']; ?>
</td>

<td>
<?php echo $row['nama_kategori']; ?>
</td>

<td>
<?php echo $row['kondisi']; ?>
</td>

</tr>

<?php
}
?>

</table>

</div>

</div>

</div>

</div>

</body>
</html>