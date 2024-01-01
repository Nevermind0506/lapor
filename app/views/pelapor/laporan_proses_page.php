<?php
include "../../connection.php";
$db = new database();
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Lapor!</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="../../assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../../assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="../../text/css" href="assets/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../assets/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../lapor_logo_bgr.png" />
    <style>
        .ellipsis {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 200px;
            /* Sesuaikan dengan lebar maksimum yang diinginkan */
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="index.html"><b>Lapor!</b></a>
                <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../../lapor_logo_bgr.png" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
                <ul class="navbar-nav mr-lg-2">
                    <li class="nav-item nav-search d-none d-lg-block">
                        <div class="input-group">
                            <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                                <span class="input-group-text" id="search">
                                    <i class="icon-search"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-nav-right">

                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <img src="../../logout_icon.png" alt="profile" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">

                            <a href="../../controller/logout_controller.php" class="dropdown-item">
                                <i class="ti-power-off text-primary"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">


            <!-- Start Sidebar Left -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">

                <ul class="nav">

                    <!-- DASHBOARD -->
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard_page.php">
                            <i class="icon-grid menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <!-- LAPORAN -->
                    <li class="nav-item active">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                            <i class="icon-paper menu-icon"></i>
                            <span class="menu-title">Laporan</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="laporan_total_page.php">Total</a></li>
                                <li class="nav-item"> <a class="nav-link" href="laporan_baru_page.php">Baru</a></li>
                                <li class="nav-item"> <a class="nav-link" href="laporan_ditinjau_page.php">Ditinjau</a></li>
                                <li class="nav-item"> <a class="nav-link" href="laporan_proses_page.php">Proses</a></li>
                                <li class="nav-item"> <a class="nav-link" href="laporan_selesai_page.php">Selesai</a></li>

                            </ul>
                        </div>
                    </li>
                    <!-- TAMBAH LAPORAN -->
                    <!-- Buat Laporan -->
                    <li class="nav-item">
                        <a class="nav-link" href="buat_laporan_page.php">
                            <i class="icon-plus menu-icon"></i>
                            <span class="menu-title">Buat Laporan</span>
                        </a>
                    </li>


                </ul>
            </nav>
            <!-- TEST -->
            <!-- End Sidebar Left -->
            <!-- Dashboard start -->
            <!-- Start main panel -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="row">
                                <div class="col-12 col-xl-8 mb-4 mb-xl-0">

                                    <h3 class="font-weight-bold">Total Laporan dengan status <span class="text-warning">"PROSES"</span> berjumlah <span class="text-warning"><?php echo $db->CountAllLaporanDiprosesWithNik($_SESSION['nik_log']); ?></span></h3>

                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Start Row1 -->
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h4 class="card-title">Total Laporan Anda</h4>
                                    <p class="card-description" style="font-size:small;">
                                        Penjelasan warna pada status :
                                        <small style="font-weight: bolder;" class=" mx-1 text-primary">Baru</small>
                                        <small style="font-weight: bolder;" class=" mx-1 text-info">Ditinjau</small>
                                        <small style="font-weight: bolder;" class=" mx-1 text-warning">Diproses</small>
                                        <small style="font-weight: bolder;" class=" mx-1 text-success">Selesai</small>


                                    </p>
                                </div>




                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Kategori
                                                </th>
                                                <th>
                                                    Deskripsi
                                                </th>
                                                <th>
                                                    Tanggal
                                                </th>
                                                <th>
                                                    Lokasi
                                                </th>
                                                <th>
                                                    Status
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($db->ShowAllLaporanDiprosesWithNik($_SESSION['nik_log']) == 0) {
                                            ?>
                                                <tr>
                                                    <td colspan="5">
                                                        <p class="text-center">Belum ada laporan</p>
                                                    </td>
                                                </tr>
                                                <?php
                                            } else {
                                                $SA_LAPORAN = $db->ShowAllLaporanDiprosesWithNik($_SESSION['nik_log']);
                                                foreach ($SA_LAPORAN as $all_laporan) {
                                                ?>
                                                    <tr>
                                                        <td class="py-1">
                                                            <?php echo $all_laporan['nama_kategori']; ?>
                                                        </td>
                                                        <td>
                                                            <p class="ellipsis"><a href="" data-toggle="modal" data-target="#detailLaporan<?php echo $all_laporan['id_laporan']; ?>"><?php echo $all_laporan['deskripsi_laporan']; ?></a></p>
                                                        </td>
                                                        <td>
                                                            <?php echo $all_laporan['tgl_laporan']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $all_laporan['lokasi_laporan']; ?>
                                                        </td>
                                                        <td>
                                                            <div class="progress">
                                                                <?php
                                                                if ($all_laporan['status_laporan'] == 'baru') {
                                                                ?>
                                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                                <?php
                                                                } elseif ($all_laporan['status_laporan'] == 'ditinjau') {
                                                                ?>
                                                                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                                <?php
                                                                } elseif ($all_laporan['status_laporan'] == 'diproses') {
                                                                ?>
                                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                                <?php
                                                                } elseif ($all_laporan['status_laporan'] == 'selesai') {
                                                                ?>
                                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                                <?php
                                                                }
                                                                ?>
                                                                <div class="modal fade" id="detailDeskripsi<?php echo $all_laporan['id_laporan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">×</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <p>This is a modal with default size</p>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                <button type="button" class="btn btn-primary">Save changes</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>

                                                    </tr>
                                                    <!-- Modal Detail Laporan -->
                                                    <div class="modal fade" id="detailLaporan<?php echo $all_laporan['id_laporan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title text-primary" id="exampleModalLabel">Detail Laporan</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <h6>Deskripsi</h6>
                                                                    <p style="color: darkgrey;"><?php echo $all_laporan['deskripsi_laporan']; ?></p>
                                                                    <hr>
                                                                    <h6>Lokasi</h6>
                                                                    <p><?php echo $all_laporan['lokasi_laporan']; ?></p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                            <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Row1 -->




                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024. Kelompok 7</a> from SMK Al Amanah. All rights reserved.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
                    </div>

                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
            <!-- Dashboard end -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->




    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->

    <!-- Plugin js for this page -->
    <script src="../../assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../../assets/vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="../../assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="../../assets/js/dataTables.select.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/template.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../../assets/js/dashboard.js"></script>
    <script src="../../assets/js/Chart.roundedBarCharts.js"></script>
    <!-- End custom js for this page-->
</body>

</html>