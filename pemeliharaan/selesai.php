<?php

include '../config/koneksi.php';

$id = $_GET['id'];

mysqli_query(
$conn,

"UPDATE pemeliharaan

SET status='Selesai'

WHERE id_pemeliharaan='$id'
"
);

header("Location:index.php");
exit;