<div id="atas" class="row mb-3">
    <div class="col">
        <div class="row">
            <div class="col-md-6">
                <h3>Ubah Data Desa</h3>
            </div>
            <div class="col-md-6">
                <a href="?page=desadata" class="btn btn-primary float-end">
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
            $nama_desa = $_POST['nama_desa'];
            $nama_kecamatan = $_POST['nama_kecamatan'];
            $checkSQL = "SELECT * FROM desa WHERE nama_desa = '$nama_desa' AND id!=$id";
            $resultCheck = mysqli_query($koneksi, $checkSQL);
            $sudahAda = (mysqli_num_rows($resultCheck) > 0) ? true : false;
            if ($sudahAda) {
        ?>
                <div class="alert alert-danger" role="alert">
                    <i class="fa fa-exclamation-circle"></i>
                    Nama desa sama sudah ada
                </div>
                <?php
            } else {
                $updateSQL = "UPDATE desa SET nama_desa='$nama_desa', 
                nama_kecamatan='$nama_kecamatan'
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
        $selectSQL = "SELECT * FROM desa WHERE id=$id";
        $result = mysqli_query($koneksi, $selectSQL);
        if (!$result || mysqli_num_rows($result) == 0) {
            echo "<meta http-equiv='refresh' content='0;url=?page=desadata'>";
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
                    <label for="nama_desa">Nama Desa</label>
                    <input type="text" class="form-control" name="nama_desa" value="<?= $row['nama_desa'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="nama_kecamatan">Nama Kecamatan</label>
                    <input type="text" class="form-control" name="nama_kecamatan" value="<?= $row['nama_kecamatan'] ?>" required>
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