<?php

include '../config/koneksi.php';

$id = $_GET['id'];

$tanggal = date("Y-m-d");

mysqli_query(
$conn,

"UPDATE peminjaman

SET

status='Dikembalikan',
tanggal_kembali='$tanggal'

WHERE id_pinjam='$id'
"
);

header("Location:index.php");
exit;