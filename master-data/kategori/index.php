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
    "SELECT * FROM kategori_aset ORDER BY id_kategori DESC"
);
?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Master Data Kategori</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="../../assets/css/style.css">

</head>

<body>

<!-- SIDEBAR -->

<div class="sidebar">

    <div class="logo">

        <img src="../../assets/images/logo.png" alt="Logo">

        <h5>
            SIPRS
            <br>
            CIBARUSAH
        </h5>

    </div>

    <div class="menu">

        <a href="../../dashboard.php">
            🏠 Dashboard
        </a>

        <a href="index.php" class="active">
            📁 Master Data Kategori
        </a>

        <a href="#">
            📦 Inventarisasi
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

        <a href="#">
            ⚙ Pengaturan
        </a>

        <a href="../../logout.php">
            🚪 Logout
        </a>

    </div>

</div>

<!-- CONTENT -->

<div class="main">

    <div class="topbar">

        <h3>
            MASTER DATA KATEGORI ASET
        </h3>

        <div>
            Login Sebagai :
            <b>
                <?php echo $_SESSION['nama']; ?>
            </b>
        </div>

    </div>

    <div class="content">

        <div class="card shadow">

            <div class="card-header d-flex justify-content-between align-items-center">

                <h5 class="mb-0">
                    Data Kategori
                </h5>

                <a
                href="tambah.php"
                class="btn btn-primary">

                + Tambah Kategori

                </a>

            </div>

            <div class="card-body">

                <table class="table table-bordered table-hover">

                    <thead>

                    <tr>

                        <th width="80">No</th>
                        <th>Nama Kategori</th>
                        <th>Keterangan</th>
                        <th width="180">Aksi</th>

                    </tr>

                    </thead>

                    <tbody>

                    <?php
                    $no = 1;

                    while($row=mysqli_fetch_assoc($data))
                    {
                    ?>

                    <tr>

                        <td>
                            <?php echo $no++; ?>
                        </td>

                        <td>
                            <?php echo $row['nama_kategori']; ?>
                        </td>

                        <td>
                            <?php echo $row['keterangan']; ?>
                        </td>

                        <td>

                            <a
                            href="edit.php?id=<?php echo $row['id_kategori']; ?>"
                            class="btn btn-warning btn-sm">

                            Edit

                            </a>

                            <a
                            href="hapus.php?id=<?php echo $row['id_kategori']; ?>"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin ingin menghapus data ini?')">

                            Hapus

                            </a>

                        </td>

                    </tr>

                    <?php
                    }
                    ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

</body>
</html>