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

$baik = mysqli_fetch_assoc(
mysqli_query(
$conn,
"SELECT COUNT(*) as total
FROM aset
WHERE kondisi='Baik'"
));

$ringan = mysqli_fetch_assoc(
mysqli_query(
$conn,
"SELECT COUNT(*) as total
FROM aset
WHERE kondisi='Rusak Ringan'"
));

$berat = mysqli_fetch_assoc(
mysqli_query(
$conn,
"SELECT COUNT(*) as total
FROM aset
WHERE kondisi='Rusak Berat'"
));

$peminjaman = mysqli_fetch_assoc(
mysqli_query(
$conn,
"SELECT COUNT(*) as total
FROM peminjaman
WHERE status='Dipinjam'"
));

$pemeliharaan = mysqli_fetch_assoc(
mysqli_query(
$conn,
"SELECT COUNT(*) as total
FROM pemeliharaan
WHERE status='Proses'"
));

include 'templates/header.php';
include 'templates/sidebar.php';
?>

<div class="content">

    <div class="topbar">

        <div class="d-flex align-items-center">

            <img
            src="assets/images/logo_kabupaten.png"
            width="90"
            class="me-3">

            <div>

                <h2 class="mb-1">
                    SIPRS Kecamatan Cibarusah
                </h2>

                <p class="mb-0 text-muted">
                    Sistem Informasi Pengelolaan Sarana dan Prasarana
                </p>

                <small>
                    Pemerintah Kabupaten Bekasi
                </small>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-md-3 mb-3">

            <div class="card card-custom bg-primary text-white">

                <div class="card-body">

                    <h5>Total Aset</h5>

                    <h2>
                        <?= $total_aset['total']; ?>
                    </h2>

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-3">

            <div class="card card-custom bg-success text-white">

                <div class="card-body">

                    <h5>Kondisi Baik</h5>

                    <h2>
                        <?= $baik['total']; ?>
                    </h2>

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-3">

            <div class="card card-custom bg-warning text-dark">

                <div class="card-body">

                    <h5>Rusak Ringan</h5>

                    <h2>
                        <?= $ringan['total']; ?>
                    </h2>

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-3">

            <div class="card card-custom bg-danger text-white">

                <div class="card-body">

                    <h5>Rusak Berat</h5>

                    <h2>
                        <?= $berat['total']; ?>
                    </h2>

                </div>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-md-6 mb-3">

            <div class="card card-custom">

                <div class="card-header">
                    Peminjaman Aktif
                </div>

                <div class="card-body text-center">

                    <h1 class="text-primary">
                        <?= $peminjaman['total']; ?>
                    </h1>

                </div>

            </div>

        </div>

        <div class="col-md-6 mb-3">

            <div class="card card-custom">

                <div class="card-header">
                    Pemeliharaan Aktif
                </div>

                <div class="card-body text-center">

                    <h1 class="text-warning">
                        <?= $pemeliharaan['total']; ?>
                    </h1>

                </div>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-md-6 mb-3">

            <div class="card card-custom">

                <div class="card-header">
                    Grafik Kondisi Aset
                </div>

                <div class="card-body">

                    <canvas id="kondisiChart"></canvas>

                </div>

            </div>

        </div>

        <div class="col-md-6 mb-3">

            <div class="card card-custom">

                <div class="card-header">
                    Statistik Inventaris
                </div>

                <div class="card-body">

                    <canvas id="kategoriChart"></canvas>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

new Chart(
document.getElementById('kondisiChart'),
{
type:'doughnut',

data:{
labels:[
'Baik',
'Rusak Ringan',
'Rusak Berat'
],

datasets:[{
data:[
<?= $baik['total']; ?>,
<?= $ringan['total']; ?>,
<?= $berat['total']; ?>
]
}]
}
}
);

new Chart(
document.getElementById('kategoriChart'),
{
type:'bar',

data:{
labels:[
'Total Inventaris'
],

datasets:[
{
label:'Jumlah Aset',
data:[
<?= $total_aset['total']; ?>
]
}
]
}
}
);

</script>

<?php
include 'templates/footer.php';
?>