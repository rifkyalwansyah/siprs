<?php
session_start();

if(!isset($_SESSION['id']))
{
    header("Location: ../login.php");
    exit;
}

include '../config/koneksi.php';

$data = mysqli_query($conn,"
SELECT
pemeliharaan.*,
aset.nama_aset

FROM pemeliharaan

LEFT JOIN aset
ON pemeliharaan.id_aset = aset.id_aset

ORDER BY pemeliharaan.id_pemeliharaan DESC
");

include '../templates/header.php';
include '../templates/sidebar.php';
?>

<div class="content">

    <div class="topbar">

        <h3>Data Pemeliharaan Aset</h3>

        <p class="mb-0 text-muted">
            Kelola data pemeliharaan aset Kecamatan Cibarusah
        </p>

    </div>

    <div class="card card-custom">

        <div class="card-body">

            <a href="tambah.php" class="btn btn-primary mb-3">

                <i class="fa fa-plus"></i>
                Tambah Pemeliharaan

            </a>

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-primary">

                    <tr>

                        <th>No</th>
                        <th>Nama Aset</th>
                        <th>Tanggal</th>
                        <th>Jenis</th>
                        <th>Biaya</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th width="220">Aksi</th>

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

                        <td><?= $row['nama_aset']; ?></td>

                        <td><?= $row['tanggal']; ?></td>

                        <td><?= $row['jenis']; ?></td>

                        <td>
                            Rp <?= number_format($row['biaya'],0,',','.'); ?>
                        </td>

                        <td><?= $row['keterangan']; ?></td>

                        <td>

                        <?php
                        if($row['status']=="Proses")
                        {
                            echo "<span class='badge bg-warning text-dark'>Proses</span>";
                        }
                        else
                        {
                            echo "<span class='badge bg-success'>Selesai</span>";
                        }
                        ?>

                        </td>

                        <td>

                            <?php
                            if($row['status']=="Proses")
                            {
                            ?>

                            <a
                            href="selesai.php?id=<?= $row['id_pemeliharaan']; ?>"
                            class="btn btn-success btn-sm">

                            <i class="fa fa-check"></i>
                            Selesai

                            </a>

                            <?php
                            }
                            ?>

                            <a
                            href="edit.php?id=<?= $row['id_pemeliharaan']; ?>"
                            class="btn btn-warning btn-sm">

                            <i class="fa fa-edit"></i>
                            Edit

                            </a>

                            <a
                            href="hapus.php?id=<?= $row['id_pemeliharaan']; ?>"
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

</div>

<?php
include '../templates/footer.php';
?>