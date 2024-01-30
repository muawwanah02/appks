<style type="text/css">
    table {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    th {
        border: 1px solid;
        padding: 8px;
        text-align: center;
        background-color: #ddd;
    }

    td {
        border: 1px solid;
        padding: 8px;
    }

    td.angka {
        text-align: right;
    }


    td.garisbawah {
        text-align: center;
        border-bottom: 1px solid;
        padding-bottom: 6px;
    }

    td.info {
        border: 0px;
        padding: 2px;
    }

    td.tebal {
        font-weight: bold;
    }

    td.spasi-ttd {
        border: 0px;
        height: 32px;
    }

    .center {
        height: 100px;
    }

    .judul {
        font-size: 20px;
        font-weight: bold;
        display: table;
        margin: 0 auto;
    }
</style>
<table>
    <colgroup>
        <col style="width: 100%">
    </colgroup>
    <tbody>
        <tr>
            <td class="info garisbawah">
                <img style="height: 100px;" src="../assets/images/kop.jpg" alt="">
            </td>
        </tr>
    </tbody>
</table>
<br>
<div style="text-align: center;">
    <span class="judul">Laporan Anak</span>
</div>
<br>
<br>
<table>
    <colgroup>
        <col style="width: 5%" class="angka">
        <col style="width: 20%">
        <col style="width: 20%">
        <col style="width: 20%">
        <col style="width: 20%">
        <col style="width: 10%">
        <col style="width: 5%">
    </colgroup>
    <thead>
        <tr>
            <th>No</th>
            <th>No KK</th>
            <th>Nama Anak</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Umur</th>
            <th>Qty</th>
        </tr>
    </thead>
    <tbody>
        <?php
        session_start();
        $sql = "SELECT  YEAR(tanggal) tahun, MONTH(tanggal) bulan, A.id, A.nama_anak, COUNT(*) qty FROM anak A
            LEFT JOIN kasus_stunting KS ON KS.anak_id = A.id
            GROUP BY anak_id, tahun, bulan";

        $sql = "SELECT YEAR(tanggal) tahun, A.id, A.nama_anak, COUNT(*) qty FROM anak A
            LEFT JOIN kasus_stunting KS ON KS.anak_id = A.id
            GROUP BY anak_id, tahun";

        $sql = "SELECT A.*, O.no_kk, COUNT(*) qty FROM anak A
        LEFT JOIN kasus_stunting KS ON KS.anak_id = A.id
        LEFT JOIN orang_tua O ON A.orangtua_id = O.id
        GROUP BY A.id";

        $resultSet = mysqli_query($koneksi, $sql);

        $no = 1;
        while ($row = mysqli_fetch_assoc($resultSet)) {

        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['no_kk'] ?></td>
                <td><?= $row['nama_anak'] ?></td>
                <td><?= $row['tanggal_lahir'] ?></td>
                <td><?= $row['jenis_kelamin'] ?></td>
                <td><?= $row['umur'] ?></td>
                <td class="angka"><?= $row['qty'] ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<br>
<br>
<table>
    <colgroup>
        <col style="width: 70%">
        <col style="width: 30%">
    </colgroup>
    <tbody>
        <tr>
            <td class="info"></td>
            <td class="info">Banjarbaru, <?= tanggalIndonesia(date("Y-m-d")) ?></td>
        </tr>
        <tr>
            <td rowspan="1" class="spasi-ttd"></td>
        </tr>
        <tr>
            <td class="info"></td>
            <td class="info"><?= $_SESSION['nama_pegawai'] ?></td>
        </tr>
    </tbody>
</table>