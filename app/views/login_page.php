<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="../assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../assets/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../lapor_logo_bgr.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">

                <div class="row w-100 mx-0">

                    <div class="col-lg-4 mx-auto">

                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">

                            <div class="brand-logo text-center">
                                <img src="../lapor!_logo.jpeg" alt="logo" style="width: 80px;">
                            </div>

                            <h3 class="mt-0 text-center text-primary">Lapor!</h3>

                            <h6 class="text-center font-weight-light">Silahkan masukan akun anda</h6>
                            <form action="../controller/login_controller.php" method="post" class="pt-3">
                                <div class="form-group">
                                    <input required name="username_log" type="text" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input required name="pass_log" type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">LOGIN</button>
                                </div>


                                <div class="text-center mt-4 font-weight-light">
                                    Belum punya akun? <a href="register_page.php" class="text-primary">Buat akun</a>
                                    <br>
                                    <br>
                                    <a class="btn btn-sm btn-outline-primary" href="landing_page.php"><i class="icon-grid mr-2"></i>Dashboard</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/template.js"></script>
    <script src="../assets/js/settings.js"></script>
    <script src="../assets/js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>