<div id="atas" class="row mb-3">
    <div class="col">
        <div class="row">
            <div class="col-md-6">
                <h3>Tambah Data Anak</h3>
            </div>
            <div class="col-md-6">
                <a href="?page=anakdata" class="btn btn-primary float-end">
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
            $orangtua_id = $_POST['orangtua_id'];
            $tanggal_lahir = $_POST['tanggal_lahir'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $umur = $_POST['umur'];

            $insertSQL = "INSERT INTO anak SET orangtua_id='$orangtua_id', tanggal_lahir='$tanggal_lahir', 
            jenis_kelamin='$jenis_kelamin', umur='$umur'";
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
                $selectSQLOrangtua = "SELECT * FROM orang_tua";
                $resultSetOrangtua = mysqli_query($koneksi, $selectSQLOrangtua);
                ?>
                <div class="mb-3">
                    <label for="id">No KK</label>
                    <select name="orangtua_id" id="" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php
                        while ($rowOrangtua = mysqli_fetch_assoc($resultSetOrangtua)) {
                        ?>
                            <option value="<?= $rowOrangtua["id"] ?>"><?= $rowOrangtua["no_kk"] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nama_anak">Nama Anak</label>
                    <input type="text" class="form-control" name="nama_anak" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tanggal_lahir" required>
                </div>
                <div class="mb-3">
                    <label for="id">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="" class="form-control" required>
                        <option value="">-- Pilih --</option>
                        <option value="Perempuan">Perempuan</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="umur">Umur</label>
                    <input type="text" class="form-control" name="umur" required>
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