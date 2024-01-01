<?php
include "../../connection.php";
$db = new database();
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <script src="../../assets/js/sweetalert2@10.js"></script>
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
                    <li class="nav-item">
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
                    <li class="nav-item active">
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

                                    <h3 class="font-weight-bold">Silahkan buat laporan anda!</h3>

                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Start Row3 -->
                    <div class="row">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title text-primary">Buat Laporan Baru</h4>
                                    <form action="../../controller/buat_laporan_controller.php" method="post" class="form-sample">


                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Kategori</label>
                                                    <div class="col-sm-9">
                                                        <select name="id_kategori" class="form-control" required>
                                                            <?php
                                                            foreach ($db->ShowAllCategory() as $nama_kategori) {
                                                            ?>
                                                                <option value="<?= $nama_kategori['id_kategori']; ?>"><?= $nama_kategori['nama_kategori']; ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Tanggal</label>
                                                    <div class="col-sm-9">
                                                        <input name="tgl_laporan" type="date" class="form-control" placeholder="dd/mm/yyyy" required />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Lokasi</label>
                                                    <div class="col-sm-9">
                                                        <div class="form-group">
                                                            <textarea name="lokasi_laporan" class="form-control" id="exampleTextarea1" rows="4" required></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Deskripsi</label>
                                                    <div class="col-sm-9">
                                                        <div class="form-group">
                                                            <textarea name="deskripsi_laporan" class="form-control" id="exampleTextarea1" rows="4" required></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary ml-1">Buat Laporan</button>
                                        <button type="button" class="btn btn-success" id="triggerButton">Pencet Saya!</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Row3 -->



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

    <!-- sweet alert -->

    <script>
        // Ambil referensi ke tombol
        const triggerButton = document.getElementById('triggerButton');

        // Tambahkan event listener ke tombol
        triggerButton.addEventListener('click', () => {
            // Tampilkan SweetAlert saat tombol diklik
            Swal.fire({
                title: 'Hello!',
                text: 'Ini adalah SweetAlert yang dipicu dari tombol.',
                icon: 'success',
            });
        });
    </script>








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