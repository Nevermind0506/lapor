<?php
session_start();
class database
{

    var $host = "localhost";
    var $username = "root";
    var $password = "";
    var $database = "lapor_v1";
    var $connection = "";

    function __construct()
    {
        $this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if (mysqli_connect_errno()) {
            echo "Koneksi database gagal : " . mysqli_connect_error();
        }
    }

    function RegistPelapor($nik_pelapor, $nama_pelapor, $username_pelapor, $pass_pelapor, $telp_pelapor)
    {
        $sql = "INSERT INTO `pelapor` (`nik_pelapor`, `nama_pelapor`, `username_pelapor`, `pass_pelapor`, `telp_pelapor`) VALUES ('" . $nik_pelapor . "', '" . $nama_pelapor . "', '" . $username_pelapor . "', '" . $pass_pelapor . "', '" . $telp_pelapor . "')";
        $sql_execute = mysqli_query($this->connection, $sql);
        if ($sql_execute) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    function Login($username_log, $pass_log)
    {
        $sql = "SELECT * FROM `pelapor` WHERE username_pelapor = '" . $username_log . "' AND pass_pelapor = '" . $pass_log . "'";
        $sql_execute = mysqli_query($this->connection, $sql);
        $data_found = mysqli_num_rows($sql_execute);
        if ($data_found == 1) {
            $user_data = mysqli_fetch_array($sql_execute);
            $nama_lengkap = $user_data['nama_pelapor'];
            $_SESSION['nama_log'] = $nama_lengkap;
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }
}
