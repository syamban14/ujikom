<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="transaksi.php">Tambah Data Transaksi</a>
    <table border="1">
        <tr>
            <th>No Transaksi</th>
            <th>Tanggal Transaksi</th>
            <th>Nama Pasien</th>
            <th>Usia</th>
            <th>Keluhan</th>
            <th>Poli</th>
            <th>Dokter</th>
            <th>Biaya</th>
            <th>Aksi</th>
        </tr>
        <?php include 'koneksi.php';

        $sql = "SELECT * FROM tbl_pasien INNER JOIN(tbl_poli INNER JOIN(tbl_dokter INNER JOIN tbl_transaksi ON tbl_dokter.id_dokter = tbl_transaksi.dokter_id)ON tbl_poli.poli_id = tbl_dokter.id_poli)ON tbl_pasien.id_pasien = tbl_transaksi.id_pasien";
        $result = mysqli_query($conn, $sql);




        foreach ($result as $row) {

            $tgl_lahir = date_create($row['tgl_lahir']);
            $tgl_skr = date_create(datetime: 'now');
            $usia = date_diff($tgl_lahir, $tgl_skr);
        ?>
            <tr>
                <td><?= $row['id_trans'] ?></td>
                <td><?= $row['tgl_trans'] ?></td>
                <td><?= $row['nama_pasien'] ?></td>
                <td><?= $usia->y; ?></td>
                <td><?= $row['keluhan'] ?></td>
                <td><?= $row['nama_poli'] ?></td>
                <td><?= $row['nama_dokter'] ?></td>
                <td><?= $row['biaya'] ?></td>
                <td>
                    <a href="transaksi_edit.php?id=<?= $row['id_trans'] ?>">Edit</a>
                    <a href="delete.php?id=<?= $row['id_trans'] ?>">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>