<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <form action="proses_tambah.php" method="post">
            <tr>
                <td>No Transaksi</td>
                <td>
                    <?php
                    include 'koneksi.php';
                    $sql = "SELECT * FROM tbl_transaksi";
                    $result = mysqli_query($conn, $sql);
                    $no_trans = mysqli_num_rows($result) + 1;
                    $no_trans = "TR00" . $no_trans;
                    ?>
                    <input type="text" name="id_trans" id="" value="<?= $no_trans; ?>" readonly>
                </td>
            </tr>
            <tr>
                <td>Tanggal Transaksi</td>
                <td>
                    <!-- membuat select untuk tanggal -->
                    <select name="tgl" id="">
                        <option value="">- Pilih Tanggal -</option>
                        <?php
                        for ($i = 1; $i <= 31; $i++) { ?>
                            <option value="<?= $i; ?>"><?= $i; ?></option>
                        <?php } ?>
                    </select>

                    <!-- membuat select untuk bulan -->
                    <select name="bln" id="">
                        <option value="">- Pilih Bulan -</option>
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

                    <input type="text" name="thn" id="">
                </td>
            </tr>
            <tr>
                <td>Nama Pasien</td>
                <td>
                    <select name="nama_pasien" id="">
                        <option value="">- Pilih Nama Pasien -</option>
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
                        <option value="">- Pilih Dokter -</option>
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
                    <input type="text" name="keluhan" id="">
                </td>
            </tr>
            <tr>
                <td>Biaya</td>
                <td>
                    <input type="text" name="biaya" id="">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Tambah Data">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </form>
    </table>
</body>

</html>