<?php
function hitungQty($koneksi, $nama_tabel)
{
    $select = "SELECT COUNT(*) qty FROM $nama_tabel";
    $result = mysqli_query($koneksi, $select);
    $row = mysqli_fetch_assoc($result);
    return $row['qty'];
}


$pegawai_qty = hitungQty($koneksi, "pegawai");
$orang_tua_qty = hitungQty($koneksi, "orang_tua");
$anak_qty = hitungQty($koneksi, "anak");
$desa_qty = hitungQty($koneksi, "desa");

?>
<div id="badges" class="row g-3 my-2">
    <?php
    if ($_SESSION["level"] == "admin") {
    ?>
        <div class="col-md-6 col-lg-3">
            <div class="p-3 bg-primary shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-2"><?= $pegawai_qty ?></h3>
                    <p class="fs-5 text-white">Pegawai</p>
                </div>
                <i class="fas fa-users fs-1 text-white bg-primary p-3"></i>
            </div>
        </div>
    <?php
    }
    ?>

    <div class="col-md-6 col-lg-3">
        <div class="p-3 hijo-bg shadow-sm d-flex justify-content-around align-items-center rounded">
            <div>
                <h3 class="fs-2"><?= $orang_tua_qty ?></h3>
                <p class="fs-5 text-white">Orang Tua</p>
            </div>
            <i class="fa-solid fa-people-roof fs-1 text-white hijo-bg p-3"></i>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="p-3 secondary-bg shadow-sm d-flex justify-content-around align-items-center rounded">
            <div>
                <h3 class="fs-2"><?= $anak_qty ?></h3>
                <p class="fs-5 text-white">Anak</p>
            </div>
            <i class="fa-solid fa-children fs-1 text-white secondary-bg p-3"></i>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="p-3 bg-info shadow-sm d-flex justify-content-around align-items-center rounded">
            <div>
                <h3 class="fs-2"><?= $desa_qty ?></h3>
                <p class="fs-5 text-white">Desa</p>
            </div>
            <i class="fa-solid fa-city fs-1 text-white bg-info p-3"></i>
        </div>
    </div>
</div>
