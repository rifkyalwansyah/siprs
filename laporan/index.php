<?php
session_start();

if(!isset($_SESSION['id']))
{
    header("Location: ../login.php");
    exit;
}

include '../config/koneksi.php';

$total_aset = mysqli_num_rows(
    mysqli_query($conn,"SELECT * FROM aset")
);

$total_peminjaman = mysqli_num_rows(
    mysqli_query($conn,"SELECT * FROM peminjaman")
);

$total_pemeliharaan = mysqli_num_rows(
    mysqli_query($conn,"SELECT * FROM pemeliharaan")
);

include '../templates/header.php';
include '../templates/sidebar.php';
?>

<div class="content">

    <div class="topbar">
        <h3>Laporan SIPRS Kecamatan Cibarusah</h3>
        <p class="mb-0 text-muted">
            Ringkasan dan cetak laporan sistem sarana dan prasarana
        </p>
    </div>

    <div class="row">

        <div class="col-md-4 mb-3">

            <div class="card card-custom">

                <div class="card-body text-center">

                    <h5>Total Aset</h5>

                    <h1 class="text-primary">
                        <?= $total_aset; ?>
                    </h1>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-3">

            <div class="card card-custom">

                <div class="card-body text-center">

                    <h5>Total Peminjaman</h5>

                    <h1 class="text-success">
                        <?= $total_peminjaman; ?>
                    </h1>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-3">

            <div class="card card-custom">

                <div class="card-body text-center">

                    <h5>Total Pemeliharaan</h5>

                    <h1 class="text-warning">
                        <?= $total_pemeliharaan; ?>
                    </h1>

                </div>

            </div>

        </div>

    </div>

    <div class="card card-custom">

        <div class="card-header">

            <h5 class="mb-0">
                Cetak Laporan
            </h5>

        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-4 mb-3">

                    <div class="card border-primary">

                        <div class="card-body text-center">

                            <h5>
                                Laporan Inventaris
                            </h5>

                            <p>
                                Cetak seluruh data inventaris aset.
                            </p>

                            <a
                            href="pdf_inventaris.php"
                            target="_blank"
                            class="btn btn-danger">

                            <i class="fa fa-file-pdf"></i>
                            Export PDF

                            </a>

                        </div>

                    </div>

                </div>

                <div class="col-md-4 mb-3">

                    <div class="card border-success">

                        <div class="card-body text-center">

                            <h5>
                                Laporan Peminjaman
                            </h5>

                            <p>
                                Cetak seluruh data peminjaman aset.
                            </p>

                            <button
                            class="btn btn-success"
                            disabled>

                            Segera Hadir

                            </button>

                        </div>

                    </div>

                </div>

                <div class="col-md-4 mb-3">

                    <div class="card border-warning">

                        <div class="card-body text-center">

                            <h5>
                                Laporan Pemeliharaan
                            </h5>

                            <p>
                                Cetak seluruh data pemeliharaan aset.
                            </p>

                            <button
                            class="btn btn-warning"
                            disabled>

                            Segera Hadir

                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<?php
include '../templates/footer.php';
?>