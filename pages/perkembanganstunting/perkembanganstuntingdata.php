<div id="atas" class="row">
    <div class="col">
        <div class="row">
            <div class="col-md-6">
                <h3>Perkembangan Kasus Stunting</h3>
            </div>
            <div class="col-md-6">
                <a href="?page=perkembanganstuntingtambah" class="btn btn-success float-end">
                    <i class="fa fa-plus-circle"></i> Tambah
                </a>
                <a href="report/laporanperkembanganstunting.php" class="btn btn-primary float-end me-1" target="_blank">
                    <i class="fa fa-print"></i> Laporan Perkembangan Kasus Stunting
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
    $selectSQL = "SELECT perkembangan_stunting.*, anak.nama_anak, desa.nama_desa, pegawai.nama_pegawai 
    FROM perkembangan_stunting 
    LEFT JOIN anak ON perkembangan_stunting.anak_id = anak.id
    LEFT JOIN desa ON anak.desa_id = desa.id
    LEFT JOIN pegawai ON perkembangan_stunting.pegawai_id = pegawai.id";

    $resultSet = mysqli_query($koneksi, $selectSQL);
    if ($resultSet) {

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
                        <th>Keterangan</th>
                        <th width="50">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($resultSet)) {
                        // Mendefinisikan keterangan berdasarkan kategori stunting
                        $keterangan = '';
                        if ($row['kategori_stunting'] == 'Ringan') {
                            $keterangan = 'Disarankan untuk banyak minum susu';
                        } elseif ($row['kategori_stunting'] == 'Sedang') {
                            $keterangan = 'Perlu pemantauan gizi dan pola makan';
                        } elseif ($row['kategori_stunting'] == 'Parah') {
                            $keterangan = 'Perlu konsultasi dengan dokter gizi';
                        }
                    ?>
                        <tr class="align-middle">
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['nama_anak'] ?></td>
                            <td><?= $row['nama_desa'] ?></td>
                            <td><?= $row['tanggal_tercatat'] ?></td>
                            <td><?= $row['kategori_stunting'] ?></td>
                            <td><?= $row['nama_pegawai'] ?></td>
                            <td><?= $keterangan ?></td>
                            <td>
                                <a href="?page=perkembanganstuntingubah&id=<?= $row['id'] ?>" class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <a href="#" onclick="konfirmasi('?page=perkembanganstuntinghapus&id=<?= $row['id'] ?>');" class="btn btn-sm btn-danger">
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