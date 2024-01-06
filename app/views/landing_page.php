<?php
include "../connection.php";
$db = new database();
if (!empty($_SESSION['nik_log'])) {
    if ($_SESSION['level_log'] == 'pelapor') {
        header("location: ../views/pelapor/dashboard_page.php");
    } elseif ($_SESSION['level_log'] == 'petugas') {
        header("location: ../views/petugas/dashboard_page.php");
    } elseif ($_SESSION['level_log'] == 'admin') {
        header("location: ../views/admin/dashboard_page.php");
    }
}
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
    <link rel="stylesheet" href="../assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="assets/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../assets/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../lapor_logo_bgr.png" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="index.html"><b>Lapor!</b></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">

                <ul class="navbar-nav mr-lg-2">
                    <li class="nav-item nav-search d-none d-lg-block">

                    </li>
                </ul>
                <ul class="navbar-nav navbar-nav-right">

                    <li class="nav-item nav-profile dropdown">
                        <div class="nav-link">
                            <a type="button" class="btn btn-primary" href="login_page.php">Login</a>
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

            <div class="">
                <div class="content-wrapper">
                    <!-- <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="row">
                                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                                    <h3 class="font-weight-bold">Welcome David Maulana Ibrahim</h3>
                                    <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>
                                </div>

                            </div>
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card tale-bg">
                                <div class="card-people mt-auto">
                                    <img src="../assets/images/dashboard/people.svg" alt="people">
                                    <div class="weather-info">
                                        <div class="d-flex">
                                            <!-- <div>
                                                <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>31<sup>C</sup></h2>
                                            </div> -->
                                            <!-- <div class="ml-2">
                                                <h4 class="location font-weight-normal">Bangalore</h4>
                                                <h6 class="font-weight-normal">India</h6>
                                            </div> -->
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
                                            <p>berdasarkan data terbaru</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4 stretch-card transparent">
                                    <div class="card card-dark-blue">
                                        <div class="card-body">
                                            <p class="mb-4">Total Laporan Masuk</p>
                                            <p class="fs-30 mb-2"><?php echo $db->CountTotalLaporan(); ?></p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                                    <div class="card card-light-blue">
                                        <div class="card-body">
                                            <p class="mb-4">Total Tanggapan</p>
                                            <p class="fs-30 mb-2">3</p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 stretch-card transparent">
                                    <div class="card card-light-danger">
                                        <div class="card-body">
                                            <p class="mb-4">Total Petugas</p>
                                            <p class="fs-30 mb-2">105</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title text-primary">Tentang Aplikasi</p>
                                    <p class="font-weight-500">Aplikasi pelaporan kejadian masyarakat adalah platform online yang memungkinkan pengguna untuk dengan mudah melaporkan kejadian atau situasi di sekitar mereka, seperti kecelakaan, tindakan kriminal, atau kondisi darurat lainnya. Pengguna dapat mengisi formulir pelaporan dengan detail kejadian, dan laporan tersebut secara otomatis diteruskan ke pihak berwajib. Pihak berwajib kemudian merespons laporan, memberikan status, dan memastikan penanganan yang cepat. Melalui aplikasi ini, diharapkan tercipta keterlibatan aktif masyarakat dalam menjaga keamanan lingkungan, serta memudahkan pihak berwajib dalam merespon dan menanggapi situasi secara efisien.</p>


                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <p class="card-title text-primary">Tujuan Aplikasi</p>
                                    </div>
                                    <p class="font-weight-500">meningkatkan transparansi dan partisipasi masyarakat dalam keamanan dan kenyamanan lingkungan. Dengan memberikan saluran yang mudah dan cepat untuk melaporkan kejadian, aplikasi ini mempercepat respons pihak berwajib, mendorong keterlibatan masyarakat, dan memungkinkan pemantauan serta analisis data untuk meningkatkan kebijakan dan respons. Tujuan utamanya adalah menciptakan lingkungan yang lebih aman, responsif, dan melibatkan masyarakat secara aktif dalam menjaga ketertiban.</p>
                                    <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">


                        <div class="col-md-12 stretch-card grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title text-primary">Mengapa di kategorikan?</p>
                                    <p class="font-weight-500">Mengkategorikan jenis laporan masyarakat memiliki manfaat utama dalam manajemen informasi. Pertama, kategorisasi memungkinkan organisasi menentukan prioritas penanganan dengan menilai tingkat urgensi dan kepentingan berbagai jenis laporan. Kedua, dengan mengetahui jenis laporan yang paling umum atau kritis, organisasi dapat mengalokasikan sumber daya mereka secara efektif, termasuk personel, waktu, dan anggaran. Ketiga, kategorisasi memungkinkan analisis data yang lebih baik, membantu organisasi dalam mengevaluasi tren, pola, dan statistik terkait dengan berbagai masalah atau kejadian. Dengan merancang sistem kategorisasi yang efisien, organisasi dapat meningkatkan efisiensi, akurasi, dan responsabilitas dalam menangani laporan masyarakat.</p>
                                </div>

                            </div>

                        </div>

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
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->

        <!-- plugins:js -->
        <script src="assets/vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="assets/vendors/chart.js/Chart.min.js"></script>
        <script src="assets/vendors/datatables.net/jquery.dataTables.js"></script>
        <script src="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
        <script src="assets/js/dataTables.select.min.js"></script>

        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="assets/js/off-canvas.js"></script>
        <script src="assets/js/hoverable-collapse.js"></script>
        <script src="assets/js/template.js"></script>
        <script src="assets/js/settings.js"></script>
        <script src="assets/js/todolist.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <script src="assets/js/dashboard.js"></script>
        <script src="assets/js/Chart.roundedBarCharts.js"></script>
        <!-- End custom js for this page-->
</body>

</html>