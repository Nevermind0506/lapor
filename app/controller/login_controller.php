<?php
include "../connection.php";
$db = new database();
$username_log   = $_POST['username_log'];
$pass_log       = $_POST['pass_log'];

$login_process = $db->Login($username_log, $pass_log);

if ($login_process == "pelapor_log") {
    header("location: ../views/pelapor/dashboard_page.php");
} elseif ($login_process == "petugas_log") {
    if ($_SESSION['level_log'] == 'petugas') {
        header("location: ../views/petugas/dashboard_page.php");
    } elseif ($_SESSION['level_log'] == 'admin') {
        header("location: ../views/admin/dashboard_page.php");
    }
} else {
    echo "gagal login";
    echo $_SESSION['nik_log'];
    echo $_SESSION['nama_log'];
    echo $login_process;

    die;
    header('location: ../views/login_page.php');
}
