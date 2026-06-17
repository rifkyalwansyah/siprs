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
peminjaman.*,
aset.nama_aset

FROM peminjaman

LEFT JOIN aset
ON peminjaman.id_aset = aset.id_aset

ORDER BY peminjaman.id_pinjam DESC
");

include '../templates/header.php';
include '../templates/sidebar.php';
?>

<div class="content">

    <div class="topbar">

        <h3>Data Peminjaman Aset</h3>

        <p class="mb-0 text-muted">
            Kelola data peminjaman aset Kecamatan Cibarusah
        </p>

    </div>

    <div class="card card-custom">

        <div class="card-body">

            <a href="tambah.php" class="btn btn-primary mb-3">

                <i class="fa fa-plus"></i>
                Tambah Peminjaman

            </a>

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-primary">

                    <tr>

                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Aset</th>
                        <th>Peminjam</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Jumlah</th>
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

                        <td><?= $row['kode_pinjam']; ?></td>

                        <td><?= $row['nama_aset']; ?></td>

                        <td><?= $row['nama_peminjam']; ?></td>

                        <td><?= $row['tanggal_pinjam']; ?></td>

                        <td>

                        <?php
                        if(empty($row['tanggal_kembali']))
                        {
                            echo "-";
                        }
                        else
                        {
                            echo $row['tanggal_kembali'];
                        }
                        ?>

                        </td>

                        <td><?= $row['jumlah']; ?></td>

                        <td>

                        <?php
                        if($row['status'] == 'Dipinjam')
                        {
                            echo "<span class='badge bg-danger'>Dipinjam</span>";
                        }
                        else
                        {
                            echo "<span class='badge bg-success'>Dikembalikan</span>";
                        }
                        ?>

                        </td>

                        <td>

                            <?php if($row['status']=='Dipinjam'){ ?>

                            <a
                            href="kembali.php?id=<?= $row['id_pinjam']; ?>"
                            class="btn btn-success btn-sm">

                            <i class="fa fa-check"></i>
                            Kembalikan

                            </a>

                            <?php } ?>

                            <a
                            href="edit.php?id=<?= $row['id_pinjam']; ?>"
                            class="btn btn-warning btn-sm">

                            <i class="fa fa-edit"></i>
                            Edit

                            </a>

                            <a
                            href="hapus.php?id=<?= $row['id_pinjam']; ?>"
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