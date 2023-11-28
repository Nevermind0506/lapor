<?php
include "../connection.php";
$db = new database();
$username_log   = $_POST['username_log'];
$pass_log       = $_POST['pass_log'];

if ($db->Login($username_log, $pass_log) == true) {
    header('location: ../views/main_page.php');
} else {
    echo "gagal login";
    die;
    header('location: ../views/login_page.php');
}
