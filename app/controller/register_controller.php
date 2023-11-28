<?php
include "../connection.php";
$nik_pelapor        = $_POST["nik_pelapor"];
$nama_pelapor       = $_POST["nama_pelapor"];
$username_pelapor   = $_POST["username_pelapor"];
$pass_pelapor       = $_POST["pass_pelapor"];
$telp_pelapor       = $_POST["telp_pelapor"];

$db = new database();

if ($db->RegistPelapor($nik_pelapor, $nama_pelapor, $username_pelapor, $pass_pelapor, $telp_pelapor) == true) {
    header("location: ../views/login_page.php");
} else {
    echo "register gagal";
}
