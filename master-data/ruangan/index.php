<?php
session_start();

if(!isset($_SESSION['id']))
{
    header("Location: ../../login.php");
    exit;
}

include '../../config/koneksi.php';

$data = mysqli_query(
    $conn,
    "SELECT * FROM ruangan ORDER BY id_ruangan DESC"
);
?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">

<title>Data Ruangan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="../../assets/css/style.css">

</head>

<body>

<div class="sidebar">

<div class="logo">

<img src="../../assets/images/logo.png">

<h5>SIPRS<br>CIBARUSAH</h5>

</div>

<div class="menu">

<a href="../../dashboard.php">
🏠 Dashboard
</a>

<a href="../kategori/index.php">
📁 Data Kategori
</a>

<a href="index.php" class="active">
🏢 Data Ruangan
</a>

<a href="../../logout.php">
🚪 Logout
</a>

</div>

</div>

<div class="main">

<div class="topbar">

<h3>MASTER DATA RUANGAN</h3>

<div>

<?php echo $_SESSION['nama']; ?>

</div>

</div>

<div class="content">

<div class="card shadow">

<div class="card-header d-flex justify-content-between">

<h5>Data Ruangan</h5>

<a
href="tambah.php"
class="btn btn-primary">

Tambah Ruangan

</a>

</div>

<div class="card-body">

<table class="table table-bordered">

<tr>

<th>No</th>
<th>Nama Ruangan</th>
<th>Keterangan</th>
<th>Aksi</th>

</tr>

<?php
$no=1;

while($row=mysqli_fetch_assoc($data))
{
?>

<tr>

<td><?= $no++; ?></td>

<td><?= $row['nama_ruangan']; ?></td>

<td><?= $row['keterangan']; ?></td>

<td>

<a
href="edit.php?id=<?= $row['id_ruangan']; ?>"
class="btn btn-warning btn-sm">

Edit

</a>

<a
href="hapus.php?id=<?= $row['id_ruangan']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Hapus Data?')">

Hapus

</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</div>

</div>

</div>

</body>
</html>