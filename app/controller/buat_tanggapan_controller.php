<?php
include "../connection.php";
$db = new database();

$id_laporan = $_POST['id_laporan'];
$nik_log    = $_POST['nik_petugas'];
$tanggapan  = $_POST['tanggapan'];
$tgl_tanggapan = date("Y-m-d");

$status_laporan = $_POST['status_laporan'];

$addTanggapan = $db->AddTanggapan($id_laporan, $nik_log, $tgl_tanggapan, $tanggapan);
$updateStatusLaporan = $db->EditStatusLaporan($status_laporan, $id_laporan);

if ($addTanggapan and $updateStatusLaporan) {
    header("location: ../views/petugas/laporan_total_page.php");
}





// echo $id_laporan;
// echo "<br>";
// echo $nik_log;
// echo "<br>";
// echo $tanggapan;
// echo "<br>";
// echo $tgl_tanggapan;
// echo "<br>";
// echo $status_laporan;
