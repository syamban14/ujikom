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


$sql = "INSERT INTO tbl_transaksi VALUES('$no_trans','$nama_pasien','$tgl','$dokter','$keluhan','$biaya')";
$result = mysqli_query($conn, $sql);

header("location:index.php");
exit;
