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
                    <li class="nav-item active">
                        <a class="nav-link" href="dashboard_page.php">
                            <i class="icon-grid menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <!-- LAPORAN -->
                    <li class="nav-item">
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
                                    <p><?php echo $_SESSION['nik_log']; ?></p>
                                    <h3 class="font-weight-bold">Welcome <?php echo $_SESSION['nama_log']; ?></h3>
                                    <h6 class="font-weight-normal mb-0">Selamat datang dihalaman dashboard! <span class="text-primary">3 unread alerts!</span></h6>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Start Row1 -->
                    <div class="row">
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card tale-bg">
                                <div class="card-people mt-auto">
                                    <img src="../../assets/images/dashboard/people.svg" alt="people">
                                    <div class="weather-info">
                                        <div class="d-flex">
                                            <div>
                                                <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>31<sup>C</sup></h2>
                                            </div>
                                            <div class="ml-2">
                                                <h4 class="location font-weight-normal">Bangalore</h4>
                                                <h6 class="font-weight-normal">India</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 grid-margin transparent">
                            <div class="row">
                                <div class="col-md-6 mb-4 stretch-card transparent">
                                    <div class="card card-tale">
                                        <div class="card-body">
                                            <p class="mb-4">Total Pengguna</p>
                                            <p class="fs-30 mb-2"><?php echo $db->CountAllUsers(); ?></p>
                                            <p>10.00% (30 days)</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4 stretch-card transparent">
                                    <div class="card card-dark-blue">
                                        <div class="card-body">
                                            <p class="mb-4">Total Laporan Masuk</p>
                                            <p class="fs-30 mb-2"><?php echo $db->CountTotalLaporan(); ?></p>
                                            <p>22.00% (30 days)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                                    <div class="card card-light-blue">
                                        <div class="card-body">
                                            <p class="mb-4">Total Laporan Anda</p>
                                            <p class="fs-30 mb-2"><?php echo $db->CountAllLaporanWithNik($_SESSION['nik_log']); ?></p>
                                            <p>2.00% (30 days)</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 stretch-card transparent">
                                    <div class="card card-light-danger">
                                        <div class="card-body">
                                            <p class="mb-4">Total Petugas</p>
                                            <p class="fs-30 mb-2">105</p>
                                            <p>0.22% (30 days)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Row1 -->
                    <!-- Start Row2 -->
                    <div class="row">
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title">Tentang Aplikasi</p>
                                    <p class="font-weight-500">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
                                    <div class="d-flex flex-wrap mb-5">
                                        <div class="mr-5 mt-3">
                                            <p class="text-muted">Order value</p>
                                            <h3 class="text-primary fs-30 font-weight-medium">12.3k</h3>
                                        </div>
                                        <div class="mr-5 mt-3">
                                            <p class="text-muted">Orders</p>
                                            <h3 class="text-primary fs-30 font-weight-medium">14k</h3>
                                        </div>
                                        <div class="mr-5 mt-3">
                                            <p class="text-muted">Users</p>
                                            <h3 class="text-primary fs-30 font-weight-medium">71.56%</h3>
                                        </div>
                                        <div class="mt-3">
                                            <p class="text-muted">Downloads</p>
                                            <h3 class="text-primary fs-30 font-weight-medium">34040</h3>
                                        </div>
                                    </div>
                                    <canvas id="order-chart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <p class="card-title">Sales Report</p>
                                        <a href="#" class="text-info">View all</a>
                                    </div>
                                    <p class="font-weight-500">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
                                    <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
                                    <canvas id="sales-chart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Row2 -->
                    <!-- Start Row3 -->
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card position-relative">
                                <div class="card-body">
                                    <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <div class="row">
                                                    <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                                                        <div class="ml-xl-4 mt-3">
                                                            <p class="card-title">Detailed Reports</p>
                                                            <h1 class="text-primary">$34040</h1>
                                                            <h3 class="font-weight-500 mb-xl-4 text-primary">North America</h3>
                                                            <p class="mb-2 mb-xl-0">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-xl-9">
                                                        <div class="row">
                                                            <div class="col-md-6 border-right">
                                                                <div class="table-responsive mb-3 mb-md-0 mt-3">
                                                                    <table class="table table-borderless report-table">
                                                                        <tr>
                                                                            <td class="text-muted">Illinois</td>
                                                                            <td class="w-100 px-0">
                                                                                <div class="progress progress-md mx-4">
                                                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <h5 class="font-weight-bold mb-0">713</h5>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-muted">Washington</td>
                                                                            <td class="w-100 px-0">
                                                                                <div class="progress progress-md mx-4">
                                                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <h5 class="font-weight-bold mb-0">583</h5>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-muted">Mississippi</td>
                                                                            <td class="w-100 px-0">
                                                                                <div class="progress progress-md mx-4">
                                                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <h5 class="font-weight-bold mb-0">924</h5>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-muted">California</td>
                                                                            <td class="w-100 px-0">
                                                                                <div class="progress progress-md mx-4">
                                                                                    <div class="progress-bar bg-info" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <h5 class="font-weight-bold mb-0">664</h5>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-muted">Maryland</td>
                                                                            <td class="w-100 px-0">
                                                                                <div class="progress progress-md mx-4">
                                                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <h5 class="font-weight-bold mb-0">560</h5>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-muted">Alaska</td>
                                                                            <td class="w-100 px-0">
                                                                                <div class="progress progress-md mx-4">
                                                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <h5 class="font-weight-bold mb-0">793</h5>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 mt-3">
                                                                <canvas id="north-america-chart"></canvas>
                                                                <div id="north-america-legend"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <div class="row">
                                                    <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                                                        <div class="ml-xl-4 mt-3">
                                                            <p class="card-title">Detailed Reports</p>
                                                            <h1 class="text-primary">$34040</h1>
                                                            <h3 class="font-weight-500 mb-xl-4 text-primary">North America</h3>
                                                            <p class="mb-2 mb-xl-0">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-xl-9">
                                                        <div class="row">
                                                            <div class="col-md-6 border-right">
                                                                <div class="table-responsive mb-3 mb-md-0 mt-3">
                                                                    <table class="table table-borderless report-table">
                                                                        <tr>
                                                                            <td class="text-muted">Illinois</td>
                                                                            <td class="w-100 px-0">
                                                                                <div class="progress progress-md mx-4">
                                                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <h5 class="font-weight-bold mb-0">713</h5>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-muted">Washington</td>
                                                                            <td class="w-100 px-0">
                                                                                <div class="progress progress-md mx-4">
                                                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <h5 class="font-weight-bold mb-0">583</h5>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-muted">Mississippi</td>
                                                                            <td class="w-100 px-0">
                                                                                <div class="progress progress-md mx-4">
                                                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <h5 class="font-weight-bold mb-0">924</h5>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-muted">California</td>
                                                                            <td class="w-100 px-0">
                                                                                <div class="progress progress-md mx-4">
                                                                                    <div class="progress-bar bg-info" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <h5 class="font-weight-bold mb-0">664</h5>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-muted">Maryland</td>
                                                                            <td class="w-100 px-0">
                                                                                <div class="progress progress-md mx-4">
                                                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <h5 class="font-weight-bold mb-0">560</h5>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-muted">Alaska</td>
                                                                            <td class="w-100 px-0">
                                                                                <div class="progress progress-md mx-4">
                                                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <h5 class="font-weight-bold mb-0">793</h5>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 mt-3">
                                                                <canvas id="south-america-chart"></canvas>
                                                                <div id="south-america-legend"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#detailedReports" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#detailedReports" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Row3 -->
                    <div class="row">
                        <div class="col-md-7 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title mb-0">Top Products</p>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-borderless">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Price</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Search Engine Marketing</td>
                                                    <td class="font-weight-bold">$362</td>
                                                    <td>21 Sep 2018</td>
                                                    <td class="font-weight-medium">
                                                        <div class="badge badge-success">Completed</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Search Engine Optimization</td>
                                                    <td class="font-weight-bold">$116</td>
                                                    <td>13 Jun 2018</td>
                                                    <td class="font-weight-medium">
                                                        <div class="badge badge-success">Completed</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Display Advertising</td>
                                                    <td class="font-weight-bold">$551</td>
                                                    <td>28 Sep 2018</td>
                                                    <td class="font-weight-medium">
                                                        <div class="badge badge-warning">Pending</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Pay Per Click Advertising</td>
                                                    <td class="font-weight-bold">$523</td>
                                                    <td>30 Jun 2018</td>
                                                    <td class="font-weight-medium">
                                                        <div class="badge badge-warning">Pending</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>E-Mail Marketing</td>
                                                    <td class="font-weight-bold">$781</td>
                                                    <td>01 Nov 2018</td>
                                                    <td class="font-weight-medium">
                                                        <div class="badge badge-danger">Cancelled</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Referral Marketing</td>
                                                    <td class="font-weight-bold">$283</td>
                                                    <td>20 Mar 2018</td>
                                                    <td class="font-weight-medium">
                                                        <div class="badge badge-warning">Pending</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Social media marketing</td>
                                                    <td class="font-weight-bold">$897</td>
                                                    <td>26 Oct 2018</td>
                                                    <td class="font-weight-medium">
                                                        <div class="badge badge-success">Completed</div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">To Do Lists</h4>
                                    <div class="list-wrapper pt-2">
                                        <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
                                            <li>
                                                <div class="form-check form-check-flat">
                                                    <label class="form-check-label">
                                                        <input class="checkbox" type="checkbox">
                                                        Meeting with Urban Team
                                                    </label>
                                                </div>
                                                <i class="remove ti-close"></i>
                                            </li>
                                            <li class="completed">
                                                <div class="form-check form-check-flat">
                                                    <label class="form-check-label">
                                                        <input class="checkbox" type="checkbox" checked>
                                                        Duplicate a project for new customer
                                                    </label>
                                                </div>
                                                <i class="remove ti-close"></i>
                                            </li>
                                            <li>
                                                <div class="form-check form-check-flat">
                                                    <label class="form-check-label">
                                                        <input class="checkbox" type="checkbox">
                                                        Project meeting with CEO
                                                    </label>
                                                </div>
                                                <i class="remove ti-close"></i>
                                            </li>
                                            <li class="completed">
                                                <div class="form-check form-check-flat">
                                                    <label class="form-check-label">
                                                        <input class="checkbox" type="checkbox" checked>
                                                        Follow up of team zilla
                                                    </label>
                                                </div>
                                                <i class="remove ti-close"></i>
                                            </li>
                                            <li>
                                                <div class="form-check form-check-flat">
                                                    <label class="form-check-label">
                                                        <input class="checkbox" type="checkbox">
                                                        Level up for Antony
                                                    </label>
                                                </div>
                                                <i class="remove ti-close"></i>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="add-items d-flex mb-0 mt-2">
                                        <input type="text" class="form-control todo-list-input" placeholder="Add new task">
                                        <button class="add btn btn-icon text-primary todo-list-add-btn bg-transparent"><i class="icon-circle-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TABLE -->
                    <!-- <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title">Advanced Table</p>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="table-responsive">
                                                <table id="example" class="display expandable-table" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Quote#</th>
                                                            <th>Product</th>
                                                            <th>Business type</th>
                                                            <th>Policy holder</th>
                                                            <th>Premium</th>
                                                            <th>Status</th>
                                                            <th>Updated at</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div> -->
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