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
    <span class="judul">Laporan Gizi Anak</span>
</div>
<br>
<br>
<table>
    <colgroup>
        <col style="width: 5%" class="angka">
        <col style="width: 20%">
        <col style="width: 10%">
        <col style="width: 10%">
        <col style="width: 20%">
        <col style="width: 20%">
        <col style="width: 15%">
    </colgroup>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Anak</th>
            <th>BB</th>
            <th>TB</th>
            <th>Tanggal</th>
            <th>Status Gizi</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
    <?php
        session_start();

        $sql = "SELECT gizi_anak.*, anak.nama_anak FROM gizi_anak 
            INNER JOIN anak ON gizi_anak.anak_id = anak.id";

        $resultSet = mysqli_query($koneksi, $sql);

        $no = 1;
        while ($row = mysqli_fetch_assoc($resultSet)) {
        

        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['nama_anak'] ?></td>
                <td><?= $row['bb'] ?></td>
                <td><?= $row['tb'] ?></td>
                <td><?= $row['tanggal'] ?></td>
                <td><?= $row['status_gizi'] ?></td>
                <td><?= $row['keterangan'] ?></td>
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