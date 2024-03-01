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
                    <i class="fa fa-print"></i> Laporan Anak
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
    // Perhatikan bahwa Anda sekarang hanya menggunakan satu variabel $selectSQL
    $selectSQL = "SELECT anak.*, orang_tua.no_kk, desa.nama_desa FROM anak 
    LEFT JOIN orang_tua ON anak.orangtua_id = orang_tua.id
    LEFT JOIN desa ON anak.desa_id = desa.id";
    $resultSet = mysqli_query($koneksi, $selectSQL);

    // Periksa apakah query berhasil dieksekusi
    if ($resultSet) {
    ?>
        <div id="bawah" class="row mt-3">
            <div class="col">
                <div class="card my-card">
                    <table class="table bg-white rounded shadow-sm  table-hover" id="example">
                        <thead>
                            <tr>
                                <th width="50">ID</th>
                                <th>No KK</th>
                                <th>Nama Anak</th>
                                <th>Nama Desa</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Umur</th>
                                <th width="80">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($resultSet)) {
                                // Hitung umur berdasarkan tanggal lahir
                                $tanggal_lahir = new DateTime($row['tanggal_lahir']);
                                $today = new DateTime();
                                $umur = $tanggal_lahir->diff($today);
                                $umur_tahun = $umur->y;
                                $umur_bulan = $umur->m;
                                $umur_teks = "$umur_tahun tahun $umur_bulan bulan";
                            ?>
                                <tr class="align-middle">
                                    <td><?= $row['id'] ?></td>
                                    <td><?= $row['no_kk'] ?></td>
                                    <td><?= $row['nama_anak'] ?></td>
                                    <td><?= $row['nama_desa'] ?></td>
                                    <td><?= $row['tanggal_lahir'] ?></td>
                                    <td><?= $row['jenis_kelamin'] ?></td>
                                    <td><?= $umur_teks ?></td>
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
    <?php
    } else {
        // Jika query gagal dieksekusi, tampilkan pesan kesalahan
        echo "Query error: " . mysqli_error($koneksi);
    }
    ?>

    <?php
    // Query SQL untuk mengambil data no KK, nama anak, nama ayah, dan nama ibu
    $selectSQLOrangtua = "SELECT anak.*, orang_tua.no_kk, orang_tua.nama_ayah, orang_tua.nama_ibu FROM anak 
                    LEFT JOIN orang_tua ON anak.orangtua_id = orang_tua.id
                    ORDER BY orang_tua.no_kk";
    $resultSetOrangtua = mysqli_query($koneksi, $selectSQLOrangtua);

    // Periksa apakah query berhasil dieksekusi
    if ($resultSetOrangtua) {
    ?>
        <div class="row mt-3">
            <div class="col">
                <div class="card my-card">
                    <table class="table bg-white rounded shadow-sm  table-hover">
                        <thead>
                            <tr>
                                <th>No KK</th>
                                <th>Nama Ayah</th>
                                <th>Nama Ibu</th>
                                <th>Nama Anak</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($rowOrangtua = mysqli_fetch_assoc($resultSetOrangtua)) {
                            ?>
                                <tr>
                                    <td><?= $rowOrangtua['no_kk'] ?></td>
                                    <td><?= $rowOrangtua['nama_ayah'] ?></td>
                                    <td><?= $rowOrangtua['nama_ibu'] ?></td>
                                    <td><?= $rowOrangtua['nama_anak'] ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php
    } else {
        // Jika query gagal dieksekusi, tampilkan pesan kesalahan
        echo "Query error: " . mysqli_error($koneksi);
    }
    ?>
</div>
