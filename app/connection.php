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

    //Regist Pelapor
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

    //Login
    function Login($username_log, $pass_log)
    {
        $sql_pelapor = "SELECT * FROM `pelapor` WHERE username_pelapor = '" . $username_log . "' AND pass_pelapor = '" . $pass_log . "'";
        $sql_execute_pelapor = mysqli_query($this->connection, $sql_pelapor);
        $data_found_pelapor = mysqli_num_rows($sql_execute_pelapor);
        //Mencari di tabel pelapor
        if ($data_found_pelapor == 1) {
            $user_data = mysqli_fetch_array($sql_execute_pelapor);
            $nama_lengkap = $user_data['nama_pelapor'];
            $nik = $user_data['nik_pelapor'];


            $_SESSION['nama_log']   = $nama_lengkap;
            $_SESSION['nik_log']    = $nik;
            $_SESSION['level_log']  = 'pelapor';
            $result = "pelapor_log";
            return $result;
            //Mencari di tabel petugas(untuk admin dan petugas)
        } elseif ($data_found_pelapor == 0) {
            $sql_petugas = "SELECT * FROM `petugas` WHERE username_petugas = '" . $username_log . "' AND pass_petugas = '" . $pass_log . "'";
            $sql_execute_petugas = mysqli_query($this->connection, $sql_petugas);
            $data_found_petugas = mysqli_num_rows($sql_execute_petugas);
            if ($data_found_petugas == 1) {
                $user_data = mysqli_fetch_array($sql_execute_petugas);
                $nama_lengkap   = $user_data['nama_petugas'];
                $nik            = $user_data['nik_petugas'];
                $level          = $user_data['level_petugas'];

                $_SESSION['nama_log']       = $nama_lengkap;
                $_SESSION['nik_log']        = $nik;
                $_SESSION['level_log']      = $level;
                $result = "petugas_log";
                return $result;
            }
        }
    }

    //Tambah Laporan
    function AddLaporan($nik_log, $id_kategori, $tgl_laporan, $lokasi_laporan, $deskripsi_laporan)
    {
        $sql = "INSERT INTO `laporan`(`id_laporan`, `nik_pelapor`, `id_kategori`, `tgl_laporan`, `lokasi_laporan`, `deskripsi_laporan`, `status_laporan`) VALUES (NULL,'" . $nik_log . "','" . $id_kategori . "','" . $tgl_laporan . "','" . $lokasi_laporan . "','" . $deskripsi_laporan . "','baru')";
        $sql_execute = mysqli_query($this->connection, $sql);
        if ($sql_execute) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }
    //Tampil semua laporan
    function ShowAllLaporan()
    {
        $sql = "SELECT * FROM `laporan`";
        $sql_execute = mysqli_query($this->connection, $sql);
        $count = mysqli_num_rows($sql_execute);
        return $sql_execute;
    }
    //Jumlah semua laporan masuk
    function CountTotalLaporan()
    {
        $sql = "SELECT * FROM `laporan`";
        $sql_execute = mysqli_query($this->connection, $sql);
        $countAllLaporan = mysqli_num_rows($sql_execute);
        return $countAllLaporan;
    }
    //Jumlah semua laporan tergantung nik login
    function CountAllLaporanWithNik($nik_log)
    {
        $sql = "SELECT * FROM `laporan` WHERE nik_pelapor = '" . $nik_log . "'";
        $sql_execute = mysqli_query($this->connection, $sql);
        $count = mysqli_num_rows($sql_execute);
        return $count;
    }
    //Tampil semua laporan tergantung nik login
    function ShowAllLaporanWithNik($nik_log)
    {
        $sql = "SELECT id_laporan, pelapor.nama_pelapor, kategori_laporan.nama_kategori, deskripsi_laporan, tgl_laporan, lokasi_laporan, status_laporan FROM laporan INNER JOIN pelapor ON pelapor.nik_pelapor = laporan.nik_pelapor INNER JOIN kategori_laporan ON kategori_laporan.id_kategori = laporan.id_kategori WHERE laporan.nik_pelapor = '" . $nik_log . "'";
        $sql_execute = mysqli_query($this->connection, $sql);
        $count = mysqli_num_rows($sql_execute);
        if ($count == 0) {
            return $all_laporan = 0;
        }
        while ($row = mysqli_fetch_array($sql_execute)) {
            $all_laporan[] = $row;
        }
        return $all_laporan;
    }
    //Jumlah semua laporan tergantung nik login & Status = baru
    function CountAllLaporanBaruWithNik($nik_log)
    {
        $sql = "SELECT * FROM `laporan` WHERE nik_pelapor = '" . $nik_log . "' AND status_laporan = 'baru';";
        $sql_execute = mysqli_query($this->connection, $sql);
        $count = mysqli_num_rows($sql_execute);
        return $count;
    }
    //Tampil semua laporan tergantung nik login & Status = baru
    function ShowAllLaporanBaruWithNik($nik_log)
    {
        $sql = "SELECT id_laporan, pelapor.nama_pelapor, kategori_laporan.nama_kategori, deskripsi_laporan, tgl_laporan, lokasi_laporan, status_laporan FROM laporan INNER JOIN pelapor ON pelapor.nik_pelapor = laporan.nik_pelapor INNER JOIN kategori_laporan ON kategori_laporan.id_kategori = laporan.id_kategori WHERE laporan.nik_pelapor = '" . $nik_log . "' AND laporan.status_laporan = 'baru';";
        $sql_execute = mysqli_query($this->connection, $sql);
        $count = mysqli_num_rows($sql_execute);
        if ($count == 0) {
            return $all_laporan_baru = 0;
        }
        while ($row = mysqli_fetch_array($sql_execute)) {
            $all_laporan_baru[] = $row;
        }
        return $all_laporan_baru;
    }
    //Jumlah semua laporan tergantung nik login & Status = ditinjau
    function CountAllLaporanDitinjauWithNik($nik_log)
    {
        $sql = "SELECT * FROM `laporan` WHERE nik_pelapor = '" . $nik_log . "' AND status_laporan = 'ditinjau';";
        $sql_execute = mysqli_query($this->connection, $sql);
        $count = mysqli_num_rows($sql_execute);
        return $count;
    }
    //Tampil semua laporan tergantung nik login & Status = ditinjau
    function ShowAllLaporanDitinjauWithNik($nik_log)
    {
        $sql = "SELECT id_laporan, pelapor.nama_pelapor, kategori_laporan.nama_kategori, deskripsi_laporan, tgl_laporan, lokasi_laporan, status_laporan FROM laporan INNER JOIN pelapor ON pelapor.nik_pelapor = laporan.nik_pelapor INNER JOIN kategori_laporan ON kategori_laporan.id_kategori = laporan.id_kategori WHERE laporan.nik_pelapor = '" . $nik_log . "' AND laporan.status_laporan = 'ditinjau';";
        $sql_execute = mysqli_query($this->connection, $sql);
        $count = mysqli_num_rows($sql_execute);
        if ($count == 0) {
            return $all_laporan_ditinjau = 0;
        }
        while ($row = mysqli_fetch_array($sql_execute)) {
            $all_laporan_ditinjau[] = $row;
        }
        return $all_laporan_ditinjau;
    }
    //Jumlah semua laporan tergantung nik login & Status = diproses
    function CountAllLaporanDiprosesWithNik($nik_log)
    {
        $sql = "SELECT * FROM `laporan` WHERE nik_pelapor = '" . $nik_log . "' AND status_laporan = 'diproses';";
        $sql_execute = mysqli_query($this->connection, $sql);
        $count = mysqli_num_rows($sql_execute);
        return $count;
    }
    //Tampil semua laporan tergantung nik login & Status = diproses
    function ShowAllLaporanDiprosesWithNik($nik_log)
    {
        $sql = "SELECT id_laporan, pelapor.nama_pelapor, kategori_laporan.nama_kategori, deskripsi_laporan, tgl_laporan, lokasi_laporan, status_laporan FROM laporan INNER JOIN pelapor ON pelapor.nik_pelapor = laporan.nik_pelapor INNER JOIN kategori_laporan ON kategori_laporan.id_kategori = laporan.id_kategori WHERE laporan.nik_pelapor = '" . $nik_log . "' AND laporan.status_laporan = 'diproses';";
        $sql_execute = mysqli_query($this->connection, $sql);
        $count = mysqli_num_rows($sql_execute);
        if ($count == 0) {
            return $all_laporan_diproses = 0;
        }
        while ($row = mysqli_fetch_array($sql_execute)) {
            $all_laporan_diproses[] = $row;
        }
        return $all_laporan_diproses;
    }
    //Jumlah semua laporan tergantung nik login & Status = selesai
    function CountAllLaporanSelesaiWithNik($nik_log)
    {
        $sql = "SELECT * FROM `laporan` WHERE nik_pelapor = '" . $nik_log . "' AND status_laporan = 'selesai';";
        $sql_execute = mysqli_query($this->connection, $sql);
        $count = mysqli_num_rows($sql_execute);
        return $count;
    }
    //Tampil semua laporan tergantung nik login & Status = selesai
    function ShowAllLaporanSelesaiWithNik($nik_log)
    {
        $sql = "SELECT id_laporan, pelapor.nama_pelapor, kategori_laporan.nama_kategori, deskripsi_laporan, tgl_laporan, lokasi_laporan, status_laporan FROM laporan INNER JOIN pelapor ON pelapor.nik_pelapor = laporan.nik_pelapor INNER JOIN kategori_laporan ON kategori_laporan.id_kategori = laporan.id_kategori WHERE laporan.nik_pelapor = '" . $nik_log . "' AND laporan.status_laporan = 'selesai';";
        $sql_execute = mysqli_query($this->connection, $sql);
        $count = mysqli_num_rows($sql_execute);
        if ($count == 0) {
            return $all_laporan_selesai = 0;
        }
        while ($row = mysqli_fetch_array($sql_execute)) {
            $all_laporan_selesai[] = $row;
        }
        return $all_laporan_selesai;
    }
    //Tampil Semua Kategori
    function ShowAllCategory()
    {
        $sql = "SELECT * FROM `kategori_laporan`";
        $sql_execute = mysqli_query($this->connection, $sql);
        while ($row = mysqli_fetch_array($sql_execute)) {
            $all_category[] = $row;
        }
        return $all_category;
    }
    //Jumlah Seluruh Pelapor
    function CountAllUsers()
    {
        $sql = "SELECT * FROM `pelapor`";
        $sql_execute = mysqli_query($this->connection, $sql);
        $count = mysqli_num_rows($sql_execute);
        return $count;
    }

    //----------------PETUGAS--------------------

    //Tampil semua laporan
    function PetugasShowAllLaporan()
    {
        $sql = "SELECT id_laporan, pelapor.nama_pelapor, kategori_laporan.nama_kategori, deskripsi_laporan, tgl_laporan, lokasi_laporan, status_laporan FROM laporan INNER JOIN pelapor ON pelapor.nik_pelapor = laporan.nik_pelapor INNER JOIN kategori_laporan ON kategori_laporan.id_kategori = laporan.id_kategori;";
        $sql_execute = mysqli_query($this->connection, $sql);
        $count = mysqli_num_rows($sql_execute);
        if ($count == 0) {
            return $all_laporan = 0;
        }
        while ($row = mysqli_fetch_array($sql_execute)) {
            $all_laporan[] = $row;
        }
        return $all_laporan;
    }
    //Tampil Tanggapan
    function ShowTanggapan($id_laporan)
    {
        $sql = "SELECT laporan.id_laporan, tanggapan.id_tanggapan, tanggapan.tanggapan, tanggapan.tgl_tanggapan, petugas.nama_petugas FROM `tanggapan` INNER JOIN laporan ON laporan.id_laporan = tanggapan.id_laporan INNER JOIN petugas ON petugas.nik_petugas = tanggapan.nik_petugas WHERE laporan.id_laporan = '" . $id_laporan . "';";
        $sql_execute = mysqli_query($this->connection, $sql);
        $count = mysqli_num_rows($sql_execute);
        if ($count == 0) {
            return $tanggapan = 0;
        }
        while ($row = mysqli_fetch_array($sql_execute)) {
            $tanggapan[] = $row;
        }
        return $tanggapan;
    }
    //Add Tanggapan
    function AddTanggapan($id_laporan, $nik_petugas, $tgl_tanggapan, $tanggapan)
    {
        $sql = "INSERT INTO `tanggapan`(`id_laporan`, `tgl_tanggapan`, `tanggapan`, `nik_petugas`) VALUES ('" . $id_laporan . "','" . $tgl_tanggapan . "','" . $tanggapan . "','" . $nik_petugas . "')";
        $sql_execute = mysqli_query($this->connection, $sql);
        return $sql_execute;
    }
    //Ubah Status Laporan
    function EditStatusLaporan($status_laporan, $id_laporan)
    {
        $sql = "UPDATE `laporan` SET `status_laporan` = '" . $status_laporan . "' WHERE `laporan`.`id_laporan` = '" . $id_laporan . "';";
        $sql_execute = mysqli_query($this->connection, $sql);
        return $sql_execute;
    }
}
