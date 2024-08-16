<?php

include 'koneksi.php';

$no_trans = $_POST['id_trans'];
$tgl = $_POST['tgl'];
$bln = $_POST['bln'];
$thn = $_POST['thn'];
$nama_pasien = $_POST['nama_pasien'];
$dokter = $_POST['dokter'];
$keluhan = $_POST['keluhan'];
$biaya = $_POST['biaya'];

$tgl = $thn . '/' . $bln . '/' . $tgl;


$sql = "UPDATE tbl_transaksi SET id_pasien = '$nama_pasien', tgl_trans = '$tgl', dokter_id = '$dokter', keluhan = '$keluhan', biaya = '$biaya' WHERE id_trans = '$no_trans'";
$result = mysqli_query($conn, $sql);

header("location:index.php");
exit;
