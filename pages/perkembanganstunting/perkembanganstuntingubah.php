<div id="atas" class="row mb-3">
    <div class="col">
        <div class="row">
            <div class="col-md-6">
                <h3>Ubah Perkembangan Stunting</h3>
            </div>
            <div class="col-md-6">
                <a href="?page=perkembanganstuntingdata" class="btn btn-primary float-end">
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
            $anak_id = $_POST['anak_id'];
            $tanggal_tercatat = $_POST['tanggal_tercatat'];
            $kategori_stunting = $_POST['kategori_stunting'];
            $pegawai_id = $_POST['pegawai_id'];

            $updateSQL = "UPDATE perkembangan_stunting SET anak_id=$anak_id,
                tanggal_tercatat='$tanggal_tercatat', 
                kategori_stunting='$kategori_stunting',
                pegawai_id='$pegawai_id' 
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
        $selectSQL = "SELECT * FROM perkembangan_stunting WHERE id=$id";
        $result = mysqli_query($koneksi, $selectSQL);
        if (!$result || mysqli_num_rows($result) == 0) {
            echo "<meta http-equiv='refresh' content='0;url=?page=perkembanganstuntingdata'>";
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
                $selectSQLAnak = "SELECT anak.*, perkembangan_gizi.status_gizi FROM anak 
                LEFT JOIN perkembangan_gizi ON anak.id = perkembangan_gizi.anak_id WHERE perkembangan_gizi.status_gizi = 'kurang'";
                $resultSetAnak = mysqli_query($koneksi, $selectSQLAnak);
                ?>
                <div class="mb-3">
                    <label for="id">Nama Anak</label>
                    <select name="anak_id" id="" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php
                        while ($rowAnak = mysqli_fetch_assoc($resultSetAnak)) {
                            $selected = $rowAnak["id"] == $row["anak_id"] ? " selected" : "";
                        ?>
                            <option value="<?= $rowAnak["id"] ?>" <?= $selected ?>><?= $rowAnak["nama_anak"] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tanggal_tercatat">Tanggal Tercatat</label>
                    <input type="date" class="form-control" name="tanggal_tercatat" value="<?= $row['tanggal_tercatat'] ?>" required>
                </div>
                <?php
                $ringanSelected = $row["kategori_stunting"] == "Ringan" ? " selected" : "";
                $sedangSelected = $row["kategori_stunting"] == "Sedang" ? " selected" : "";
                $parahSelected = $row["kategori_stunting"] == "Parah" ? " selected" : "";
                ?>
                <div class="mb-3">
                    <label for="id">Kategori Stunting</label>
                    <select name="kategori_stunting" id="" class="form-control" required>
                        <option value="">-- Pilih --</option>
                        <option value="Ringan" <?= $ringanSelected ?>>Ringan</option>
                        <option value="Sedang" <?= $sedangSelected ?>>Sedang</option>
                        <option value="Parah" <?= $parahSelected ?>>Parah</option>
                    </select>
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
                            $selected = $rowPegawai["id"] == $row["pegawai_id"] ? " selected" : "";
                        ?>
                            <option value="<?= $rowPegawai["id"] ?>" <?= $selected ?>><?= $rowPegawai["nama_pegawai"] ?></option>
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