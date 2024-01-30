<div id="atas" class="row">
    <div class="col">
        <div class="row">
            <div class="col-md-6">
                <h3>Data Kasus Stunting</h3>
            </div>
            <div class="col-md-6">
                <a href="?page=kasusstuntingtambah" class="btn btn-success float-end">
                    <i class="fa fa-plus-circle"></i> Tambah
                </a>
                <a href="report/laporankasusstunting.php" class="btn btn-primary float-end me-1" target="_blank">
                    <i class="fa fa-print"></i> Laporan Kasus Stunting
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
    $query = "SELECT kasus_stunting.*, anak.nama_anak, desa.nama_desa, pegawai.nama_pegawai FROM kasus_stunting 
    INNER JOIN anak ON kasus_stunting.anak_id = anak.id
    INNER JOIN desa ON kasus_stunting.desa_id = desa.id
    INNER JOIN pegawai ON kasus_stunting.pegawai_id = pegawai.id";

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
                        <th width="50">No</th>
                        <th>Nama Anak</th>
                        <th>Nama Desa</th>
                        <th>Tanggal Tercatat</th>
                        <th>Kategori Stunting</th>
                        <th>Nama Pegawai</th>
                        <th width="50">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($resultSet)) {
                    ?>
                        <tr class="align-middle">
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['nama_anak'] ?></td>
                            <td><?= $row['nama_desa'] ?></td>
                            <td><?= $row['tanggal_tercatat'] ?></td>
                            <td><?= $row['kategori_stunting'] ?></td>
                            <td><?= $row['nama_pegawai'] ?></td>
                            <td>
                                <a href="?page=kasusstuntingubah&id=<?= $row['id'] ?>" class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <a href="#" onclick="konfirmasi('?page=kasusstuntinghapus&id=<?= $row['id'] ?>');" class="btn btn-sm btn-danger">
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