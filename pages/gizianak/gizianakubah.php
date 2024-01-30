<div id="atas" class="row mb-3">
    <div class="col">
        <div class="row">
            <div class="col-md-6">
                <h3>Ubah Data Gizi Anak</h3>
            </div>
            <div class="col-md-6">
                <a href="?page=gizianakdata" class="btn btn-primary float-end">
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
            $bb = $_POST['bb'];
            $tb = $_POST['tb'];
            $tanggal = $_POST['tanggal'];
            $status_gizi = $_POST['status_gizi'];
            $keterangan = $_POST['keterangan'];

            $updateSQL = "UPDATE gizi_anak SET anak_id=$anak_id, 
                bb='$bb',
                tb='$tb', 
                tanggal='$tanggal', 
                status_gizi='$status_gizi',
                keterangan='$keterangan' 
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
        $selectSQL = "SELECT * FROM gizi_anak WHERE id=$id";
        $result = mysqli_query($koneksi, $selectSQL);
        if (!$result || mysqli_num_rows($result) == 0) {
            echo "<meta http-equiv='refresh' content='0;url=?page=gizianakdata'>";
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
                $selectSQLAnak = "SELECT * FROM anak";
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
                    <label for="bb">BB</label>
                    <input type="text" class="form-control" name="bb" value="<?= $row['bb'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="tb">TB</label>
                    <input type="text" class="form-control" name="tb" value="<?= $row['tb'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" name="tanggal" value="<?= $row['tanggal'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="status_gizi">Status Gizi</label>
                    <input type="text" class="form-control" name="status_gizi" value="<?= $row['status_gizi'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" value="<?= $row['keterangan'] ?>" required>
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