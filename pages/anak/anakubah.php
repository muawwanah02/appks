<div id="atas" class="row mb-3">
    <div class="col">
        <div class="row">
            <div class="col-md-6">
                <h3>Ubah Data Anak</h3>
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
            $id = $_POST['id'];
            $orangtua_id = $_POST['orangtua_id'];
            $nama_anak = $_POST['nama_anak'];
            $desa_id = $_POST['desa_id'];
            $tanggal_lahir = $_POST['tanggal_lahir'];
            $jenis_kelamin = $_POST['jenis_kelamin'];

            $updateSQL = "UPDATE anak SET orangtua_id=$orangtua_id, 
                nama_anak='$nama_anak',
                desa_id='$desa_id',
                tanggal_lahir='$tanggal_lahir', 
                jenis_kelamin='$jenis_kelamin'
                WHERE id=$id";
            $result = mysqli_query($koneksi, $updateSQL);
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
                    Data berhasil diubah
                </div>
        <?php
            }
        }

        $id = $_GET['id'];
        $selectSQL = "SELECT * FROM anak WHERE id=$id";
        $result = mysqli_query($koneksi, $selectSQL);
        if (!$result || mysqli_num_rows($result) == 0) {
            echo "<meta http-equiv='refresh' content='0;url=?page=anakdata'>";
        } else {
            $row = mysqli_fetch_assoc($result);
        }
        ?>
    </div>
</div>
<div id="bawah" class="row">
    <div class="col">
        <div class="card px-3 py-3">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="id">ID</label>
                    <input type="text" class="form-control" name="id" value="<?= $row['id'] ?>" readonly>
                </div>
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
                            $selected = $rowOrangtua["id"] == $row["orangtua_id"] ? " selected" : "";
                        ?>
                            <option value="<?= $rowOrangtua["id"] ?>" <?= $selected ?>><?= $rowOrangtua["no_kk"] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nama_anak">Nama Anak</label>
                    <input type="text" class="form-control" name="nama_anak" value="<?= $row['nama_anak'] ?>" required>
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
                            $selected = $rowDesa["id"] == $row["desa_id"] ? " selected" : "";
                        ?>
                            <option value="<?= $rowDesa["id"] ?>" <?= $selected ?>><?= $rowDesa["nama_desa"] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tanggal_lahir" value="<?= $row['tanggal_lahir'] ?>" required>
                </div>
                <?php
                $lakilakiSelected = $row["jenis_kelamin"] == "Laki-Laki" ? " selected" : "";
                $perempuanSelected = $row["jenis_kelamin"] == "Perempuan" ? " selected" : "";
                ?>
                <div class="mb-3">
                    <label for="id">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="" class="form-control" required>
                        <option value="">-- Pilih --</option>
                        <option value="Laki-Laki" <?= $lakilakiSelected ?>>Laki-Laki</option>
                        <option value="Perempuan" <?= $perempuanSelected ?>>Perempuan</option>
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