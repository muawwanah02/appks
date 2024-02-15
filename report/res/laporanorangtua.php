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
    <span class="judul">Laporan Orang tua</span>
</div>
<br>
<br>
<table>
    <colgroup>
        <col style="width: 5%" class="angka">
        <col style="width: 15%">
        <col style="width: 18%">
        <col style="width: 18%">
        <col style="width: 20%">
        <col style="width: 15%">
        <col style="width: 8%">
    </colgroup>
    <thead>
        <tr>
            <th>No</th>
            <th>No KK</th>
            <th>Nama Ayah</th>
            <th>Nama Ibu</th>
            <th>Alamat</th>
            <th>Nomor Telepon</th>
            <th>Jumlah</th>
        </tr>
    </thead>
    <tbody>
        <?php
        session_start();
        $sql = "SELECT  O.*, COUNT(A.id) as qty FROM orang_tua O
        LEFT JOIN anak A ON A.orangtua_id = O.id
        GROUP BY O.id";

        $resultSet = mysqli_query($koneksi, $sql);

        $no = 1;
        while ($row = mysqli_fetch_assoc($resultSet)) {

        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['no_kk'] ?></td>
                <td><?= $row['nama_ayah'] ?></td>
                <td><?= $row['nama_ibu'] ?></td>
                <td><?= $row['alamat'] ?></td>
                <td><?= $row['nomor_telepon'] ?></td>
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
