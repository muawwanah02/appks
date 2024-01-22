<div id="atas" class="row mb-3">
    <div class="col">
        <div class="row">
            <div class="col-md-6">
                <h3>Ubah Data Orang Tua</h3>
            </div>
            <div class="col-md-6">
                <a href="?page=orangtuadata" class="btn btn-primary btn-sm float-end">
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
            $kepala_keluarga = $_POST['kepala_keluarga'];
            $alamat = $_POST['alamat'];
            $nomor_telepon = $_POST['nomor_telepon'];
            $checkSQL = "SELECT * FROM orang_tua WHERE kepala_keluarga = '$kepala_keluarga' AND id!=$id";
            $resultCheck = mysqli_query($koneksi, $checkSQL);
            $sudahAda = (mysqli_num_rows($resultCheck) > 0) ? true : false;
            if ($sudahAda) {
        ?>
                <div class="alert alert-danger" role="alert">
                    <i class="fa fa-exclamation-circle"></i>
                    Nama orang tua sama sudah ada
                </div>
                <?php
            } else {
                $updateSQL = "UPDATE orang_tua SET kepala_keluarga='$kepala_keluarga', 
                alamat='$alamat',
                nomor_telepon='$nomor_telepon'
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
        }

        $id = $_GET['id'];
        $selectSQL = "SELECT * FROM orang_tua WHERE id=$id";
        $result = mysqli_query($koneksi, $selectSQL);
        if (!$result || mysqli_num_rows($result) == 0) {
            echo "<meta http-equiv='refresh' content='0;url=?page=orangtuadata'>";
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
                <div class="mb-3">
                    <label for="kepala_keluarga">Kepala Keluarga</label>
                    <input type="text" class="form-control" name="kepala_keluarga" value="<?= $row['kepala_keluarga'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" value="<?= $row['alamat'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="nomor_telepon">Nomor Telepon</label>
                    <input type="text" class="form-control" name="nomor_telepon" value="<?= $row['nomor_telepon'] ?>" required>
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