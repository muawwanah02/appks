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
    <span class="judul">Laporan Kasus Stunting</span>
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
        <col style="width: 17%">
    </colgroup>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Anak</th>
            <th>Nama Desa</th>
            <th>Tanggal Tercatat</th>
            <th>Kategori Stunting</th>
            <th>Nama Pegawai</th>
        </tr>
    </thead>
    <tbody>
        <?php
        session_start();

        $sql = "SELECT kasus_stunting.*, anak.nama_anak, desa.nama_desa, pegawai.nama_pegawai 
            FROM kasus_stunting 
            INNER JOIN anak ON kasus_stunting.anak_id = anak.id
            INNER JOIN desa ON kasus_stunting.desa_id = desa.id
            INNER JOIN pegawai ON kasus_stunting.pegawai_id = pegawai.id";

        $resultSet = mysqli_query($koneksi, $sql);

        $no = 1;
        while ($row = mysqli_fetch_assoc($resultSet)) {
        

        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['nama_anak'] ?></td>
                <td><?= $row['nama_desa'] ?></td>
                <td><?= $row['tanggal_tercatat'] ?></td>
                <td><?= $row['kategori_stunting'] ?></td>
                <td><?= $row['nama_pegawai'] ?></td>
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