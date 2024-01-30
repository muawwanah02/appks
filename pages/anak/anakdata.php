<div id="atas" class="row">
    <div class="col">
        <div class="row">
            <div class="col-md-6">
                <h3>Anak</h3>
            </div>
            <div class="col-md-6">
                <a href="?page=anaktambah" class="btn btn-success float-end">
                    <i class="fa fa-plus-circle"></i> Tambah
                </a>
                <a href="report/laporananak.php" class="btn btn-primary float-end me-1" target="_blank">
                    <i class="fa fa-print"></i> Laporan
                </a>
            </div>
        </div>
    </div>
</div>
<div id="tengah">
    <script>
        // konfirmasi()
        // pesanToast()
    </script>
    <?php
    $query = "SELECT anak.*, orang_tua.no_kk FROM anak 
    INNER JOIN orang_tua ON anak.orangtua_id = orang_tua.id";

    $resultSet = mysqli_query($koneksi, $query);

    if (!$resultSet) {
        die("Query error: " . mysqli_error($koneksi));
    }
    ?>
</div>
<div id="bawah" class="row mt-3">
    <div class="col">
        <div class="card my-card">
            <table class="table bg-white rounded shadow-sm  table-hover" id="example">
                <thead>
                    <tr>
                        <th width="50">ID</th>
                        <th>No KK</th>
                        <th>Anak</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Umur</th>
                        <th width="80">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($resultSet)) {
                    ?>
                        <tr class="align-middle">
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['no_kk'] ?></td>
                            <td><?= $row['nama_anak'] ?></td>
                            <td><?= $row['tanggal_lahir'] ?></td>
                            <td><?= $row['jenis_kelamin'] ?></td>
                            <td><?= $row['umur'] ?></td>
                            <td>
                                <a href="?page=anakubah&id=<?= $row['id'] ?>" class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <a href="?page=anakhapus&id=<?= $row['id'] ?>" onclick="javascript: return confirm('Yakin hapus?');" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i> Hapus
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