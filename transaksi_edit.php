<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <form action="proses_edit.php" method="post">
            <tr>
                <td>No Transaksi</td>
                <td>
                    <?php
                    include 'koneksi.php';

                    $id = $_GET['id'];
                    $sql = "SELECT * FROM tbl_pasien INNER JOIN(tbl_poli INNER JOIN(tbl_dokter INNER JOIN tbl_transaksi ON tbl_dokter.id_dokter = tbl_transaksi.dokter_id)ON tbl_poli.poli_id = tbl_dokter.id_poli)ON tbl_pasien.id_pasien = tbl_transaksi.id_pasien WHERE  tbl_transaksi.id_trans = '$id'";
                    $result = mysqli_query($conn, $sql);
                    $result = mysqli_fetch_array($result);
                    $id_trans = $result['id_trans'];
                    $id_pasien = $result['id_pasien'];
                    $napas = $result['nama_pasien'];
                    $tgl = $result['tgl_trans'];
                    $dokter = $result['dokter_id'];
                    $nadok = $result['nama_dokter'];
                    $keluhan = $result['keluhan'];
                    $biaya = $result['biaya'];

                    $tanggal = explode('/', $tgl);
                    $tgl = $tanggal[2];
                    $bln = $tanggal[1];
                    $thn = $tanggal[0];
                    ?>
                    <input type="text" name="id_trans" id="" value="<?= $id_trans ?>" readonly>
                </td>
            </tr>
            <tr>
                <td>Tanggal Transaksi</td>
                <td>
                    <!-- membuat select untuk tanggal -->
                    <select name="tgl" id="">
                        <option value="<?= $tgl ?>"><?= $tgl; ?></option>
                        <?php
                        for ($i = 1; $i <= 31; $i++) { ?>
                            <option value="<?= $i; ?>"><?= $i; ?></option>
                        <?php } ?>
                    </select>

                    <!-- membuat select untuk bulan -->
                    <select name="bln" id="">
                        <option value="<?= $bln ?>"><?= $bln; ?></option>
                        <?php
                        $bulan = [
                            '1' => 'Januari',
                            '2' => 'Februari',
                            '3' => 'Maret',
                            '4' => 'April',
                            '5' => 'Mei',
                            '6' => 'Juni',
                            '7' => 'Juli',
                            '8' => 'Agustus',
                            '9' => 'September',
                            '10' => 'Oktober',
                            '11' => 'November',
                            '12' => 'Desember'
                        ];
                        foreach ($bulan as $key => $value) { ?>
                            <option value="<?= $key; ?>"><?= $value; ?></option>
                        <?php } ?>
                    </select>

                    <input type="text" name="thn" id="" value="<?= $thn; ?>">
                </td>
            </tr>
            <tr>
                <td>Nama Pasien</td>
                <td>
                    <select name="nama_pasien" id="">
                        <option value="<?= $id_pasien; ?>"><?= $napas; ?></option>
                        <?php
                        include 'koneksi.php';
                        $sql = "SELECT * FROM tbl_pasien";
                        $result = mysqli_query($conn, $sql);
                        foreach ($result as $row) { ?>
                            <option value="<?= $row['id_pasien']; ?>"><?= $row['nama_pasien']; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Dokter</td>
                <td>
                    <select name="dokter" id="">
                        <option value="<?= $dokter; ?>"><?= $nadok; ?></option>
                        <?php
                        include 'koneksi.php';
                        $sql = "SELECT * FROM tbl_dokter";
                        $result = mysqli_query($conn, $sql);
                        foreach ($result as $row) { ?>
                            <option value="<?= $row['id_dokter']; ?>"><?= $row['nama_dokter']; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Keluhan</td>
                <td>
                    <input type="text" name="keluhan" id="" value="<?= $keluhan; ?>">
                </td>
            </tr>
            <tr>
                <td>Biaya</td>
                <td>
                    <input type="text" name="biaya" id="" value="<?= $biaya; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Update">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </form>
    </table>
</body>

</html>