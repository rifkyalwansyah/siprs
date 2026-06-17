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

include '../../templates/header.php';
include '../../templates/sidebar.php';
?>

<div class="content">

    <div class="topbar">
        <h3>Data Ruangan</h3>
        <p class="mb-0 text-muted">
            Kelola data ruangan Kecamatan Cibarusah
        </p>
    </div>

    <div class="card card-custom">

        <div class="card-body">

            <a href="tambah.php" class="btn btn-primary mb-3">
                <i class="fa fa-plus"></i>
                Tambah Ruangan
            </a>

            <table class="table table-bordered table-hover">

                <thead class="table-primary">

                <tr>
                    <th width="80">No</th>
                    <th>Nama Ruangan</th>
                    <th width="180">Aksi</th>
                </tr>

                </thead>

                <tbody>

                <?php
                $no = 1;

                while($row = mysqli_fetch_assoc($data))
                {
                ?>

                <tr>

                    <td><?= $no++; ?></td>

                    <td><?= $row['nama_ruangan']; ?></td>

                    <td>

                        <a
                        href="edit.php?id=<?= $row['id_ruangan']; ?>"
                        class="btn btn-warning btn-sm">

                        <i class="fa fa-edit"></i>
                        Edit

                        </a>

                        <a
                        href="hapus.php?id=<?= $row['id_ruangan']; ?>"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Yakin ingin menghapus data ini?')">

                        <i class="fa fa-trash"></i>
                        Hapus

                        </a>

                    </td>

                </tr>

                <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?php
include '../../templates/footer.php';
?>