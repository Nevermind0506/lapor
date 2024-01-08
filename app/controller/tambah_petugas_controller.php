<?php
include "../connection.php";
$db = new database();

$nik_petugas = $_POST['nik_petugas'];
$nama_petugas = $_POST['nama_petugas'];
$username_petugas = $_POST['username_petugas'];
$pass_petugas = $_POST['pass_petugas'];
$telp_petugas = $_POST['telp_petugas'];
$level_petugas = $_POST['level_petugas'];

$process = $db->AddPetugas($nik_petugas, $nama_petugas, $username_petugas, $pass_petugas, $telp_petugas, $level_petugas);
if ($process) {
    header("location: ../views/admin/tambah_petugas_page.php");
}
