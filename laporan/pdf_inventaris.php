<?php

session_start();

include '../config/koneksi.php';

require('../fpdf/fpdf.php');

$pdf = new FPDF(
    'L',
    'mm',
    'A4'
);

$pdf->AddPage();

$pdf->SetFont(
    'Arial',
    'B',
    16
);

$pdf->Cell(
    0,
    10,
    'LAPORAN INVENTARIS ASET SIPRS',
    0,
    1,
    'C'
);

$pdf->Ln(5);

$pdf->SetFont(
    'Arial',
    'B',
    10
);

$pdf->Cell(10,10,'No',1);
$pdf->Cell(30,10,'Kode',1);
$pdf->Cell(60,10,'Nama Aset',1);
$pdf->Cell(40,10,'Kategori',1);
$pdf->Cell(40,10,'Ruangan',1);
$pdf->Cell(30,10,'Kondisi',1);
$pdf->Cell(20,10,'Jumlah',1);

$pdf->Ln();

$query = mysqli_query($conn,"
SELECT
aset.*,
kategori_aset.nama_kategori,
ruangan.nama_ruangan

FROM aset

LEFT JOIN kategori_aset
ON aset.id_kategori = kategori_aset.id_kategori

LEFT JOIN ruangan
ON aset.id_ruangan = ruangan.id_ruangan

ORDER BY aset.id_aset DESC
");

$no = 1;

$pdf->SetFont(
    'Arial',
    '',
    9
);

while($row = mysqli_fetch_assoc($query))
{

$pdf->Cell(10,10,$no++,1);

$pdf->Cell(
30,
10,
$row['kode_aset'],
1
);

$pdf->Cell(
60,
10,
$row['nama_aset'],
1
);

$pdf->Cell(
40,
10,
$row['nama_kategori'],
1
);

$pdf->Cell(
40,
10,
$row['nama_ruangan'],
1
);

$pdf->Cell(
30,
10,
$row['kondisi'],
1
);

$pdf->Cell(
20,
10,
$row['jumlah'],
1
);

$pdf->Ln();

}

$pdf->Output(
'I',
'laporan_inventaris.pdf'
);

?>