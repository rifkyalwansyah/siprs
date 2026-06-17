<?php

include '../config/koneksi.php';

$id = $_GET['id'];

mysqli_query(
$conn,

"DELETE FROM pemeliharaan

WHERE id_pemeliharaan='$id'
"
);

header("Location:index.php");
exit;