<div id="atas" class="row">
    <div class="col">
        <div class="row">
            <div class="col-md-6">
                <h3>Gizi Anak</h3>
            </div>
            <div class="col-md-6">
                <a href="?page=gizianaktambah" class="btn btn-success float-end">
                    <i class="fa fa-plus-circle"></i> Tambah
                </a>
                <a href="report/laporangizianak.php" class="btn btn-primary float-end me-1" target="_blank">
                    <i class="fa fa-print"></i> Laporan Gizi Anak
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
    $query = "SELECT gizi_anak.*, anak.nama_anak FROM gizi_anak 
    INNER JOIN anak ON gizi_anak.anak_id = anak.id";

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
                        <th>Nama Anak</th>
                        <th>BB</th>
                        <th>TB</th>
                        <th>Tanggal</th>
                        <th>Status Gizi</th>
                        <th>Keterangan</th>
                        <th width="80">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($resultSet)) {
                    ?>
                        <tr class="align-middle">
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['nama_anak'] ?></td>
                            <td><?= $row['bb'] ?></td>
                            <td><?= $row['tb'] ?></td>
                            <td><?= $row['tanggal'] ?></td>
                            <td><?= $row['status_gizi'] ?></td>
                            <td><?= $row['keterangan'] ?></td>
                            <td>
                                <a href="?page=gizianakubah&id=<?= $row['id'] ?>" class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <a href="?page=gizianakhapus&id=<?= $row['id'] ?>" onclick="javascript: return confirm('Yakin hapus?');" class="btn btn-sm btn-danger">
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