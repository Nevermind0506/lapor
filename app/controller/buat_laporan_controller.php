<?php
include "../connection.php";
$db = new database();

echo $nik_log        = $_SESSION['nik_log'];
$id_kategori = $_POST['id_kategori'];
$tgl_laporan = $_POST['tgl_laporan'];

$lokasi_laporan = $_POST['lokasi_laporan'];
$deskripsi_laporan = $_POST['deskripsi_laporan'];

$process = $db->AddLaporan($nik_log, $id_kategori, $tgl_laporan, $lokasi_laporan, $deskripsi_laporan);
if ($process == true) {
    $_SESSION["sukses"] = 'Data Berhasil Disimpan';
    header("location: ../views/pelapor/buat_laporan_page.php");
} else {
    echo "gagal membuat laporan baru";
}
