<div id="atas" class="row mb-3">
    <div class="col">
        <div class="row">
            <div class="col-md-6">
                <h3>Tambah Data Kasus Stunting</h3>
            </div>
            <div class="col-md-6">
                <a href="?page=kasusstuntingdata" class="btn btn-primary float-end">
                    <i class="fa fa-arrow-circle-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>
<div id="tengah">
    <div class="col">
        <?php
        if (isset($_POST['simpan_button'])) {
            $anak_id = $_POST['anak_id'];
            $desa_id = $_POST['desa_id'];
            $tanggal_tercatat = $_POST['tanggal_tercatat'];
            $kategori_stunting = $_POST['kategori_stunting'];
            $pegawai_id = $_POST['pegawai_id'];

            $insertSQL = "INSERT INTO kasus_stunting SET anak_id='$anak_id', desa_id='$desa_id', tanggal_tercatat='$tanggal_tercatat',
            kategori_stunting='$kategori_stunting',
            pegawai_id='$pegawai_id'";
            $result = mysqli_query($koneksi, $insertSQL);
            if (!$result) {
        ?>
                <div class="alert alert-danger" role="alert">
                    <i class="fa fa-exclamation-circle"></i>
                    <?= mysqli_error($koneksi) ?>
                </div>
            <?php
            } else {
            ?>
                <div class="alert alert-success" role="alert">
                    <i class="fa fa-check-circle"></i>
                    Data berhasil ditambahkan
                </div>
        <?php
            }
        }
        ?>
    </div>
</div>
<div id="bawah" class="row">
    <div class="col">
        <div class="card px-3 py-3">
            <form action="" method="post">
                <?php
                $selectSQLAnak = "SELECT * FROM anak";
                $resultSetAnak = mysqli_query($koneksi, $selectSQLAnak);
                ?>
                <div class="mb-3">
                    <label for="id">Nama Anak</label>
                    <select name="anak_id" id="" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php
                        while ($rowAnak = mysqli_fetch_assoc($resultSetAnak)) {
                        ?>
                            <option value="<?= $rowAnak["id"] ?>"><?= $rowAnak["nama_anak"] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <?php
                $selectSQLDesa = "SELECT * FROM desa";
                $resultSetDesa = mysqli_query($koneksi, $selectSQLDesa);
                ?>
                <div class="mb-3">
                    <label for="id">Nama Desa</label>
                    <select name="desa_id" id="" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php
                        while ($rowDesa = mysqli_fetch_assoc($resultSetDesa)) {
                        ?>
                            <option value="<?= $rowDesa["id"] ?>"><?= $rowDesa["nama_desa"] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tanggal_tercatat">Tanggal Tercatat</label>
                    <input type="date" class="form-control" name="tanggal_tercatat" required>
                </div>
                <div class="mb-3">
                    <label for="kategori_stunting">Kategori Stunting</label>
                    <input type="text" class="form-control" name="kategori_stunting" required>
                </div>
                <?php
                $selectSQLPegawai = "SELECT * FROM pegawai";
                $resultSetPegawai = mysqli_query($koneksi, $selectSQLPegawai);
                ?>
                <div class="mb-3">
                    <label for="id">Nama Pegawai</label>
                    <select name="pegawai_id" id="" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php
                        while ($rowPegawai = mysqli_fetch_assoc($resultSetPegawai)) {
                        ?>
                            <option value="<?= $rowPegawai["id"] ?>"><?= $rowPegawai["nama_pegawai"] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col mb-3">
                    <button class="btn btn-success" type="submit" name="simpan_button">
                        <i class="fas fa-save"></i>
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>