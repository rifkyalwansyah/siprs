<?php
session_start();

if(!isset($_SESSION['id']))
{
    header("Location: ../../login.php");
    exit;
}

include '../../config/koneksi.php';

if(isset($_POST['simpan']))
{
    $nama = $_POST['nama'];
    $keterangan = $_POST['keterangan'];

    mysqli_query(
        $conn,
        "INSERT INTO kategori_aset
        (nama_kategori,keterangan)

        VALUES

        ('$nama','$keterangan')"
    );

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">

<title>Tambah Kategori</title>

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

        <a href="../../dashboard.php">🏠 Dashboard</a>

        <a href="index.php" class="active">
            📁 Master Data Kategori
        </a>

        <a href="../../logout.php">
            🚪 Logout
        </a>

    </div>

</div>

<div class="main">

    <div class="topbar">

        <h3>Tambah Kategori Aset</h3>

        <div>
            <?php echo $_SESSION['nama']; ?>
        </div>

    </div>

    <div class="content">

        <div class="card shadow">

            <div class="card-body">

                <form method="POST">

                    <div class="mb-3">

                        <label class="form-label">
                            Nama Kategori
                        </label>

                        <input
                        type="text"
                        name="nama"
                        class="form-control"
                        required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Keterangan
                        </label>

                        <textarea
                        name="keterangan"
                        class="form-control"
                        rows="4"></textarea>

                    </div>

                    <button
                    type="submit"
                    name="simpan"
                    class="btn btn-success">

                    Simpan

                    </button>

                    <a
                    href="index.php"
                    class="btn btn-secondary">

                    Kembali

                    </a>

                </form>

            </div>

        </div>

    </div>

</div>

</body>
</html>