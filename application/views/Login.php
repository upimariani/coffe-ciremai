<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>LOGIN USER COFFE CIREMAI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="<?= base_url('asset/srtdash/srtdash/') ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('asset/srtdash/srtdash/') ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url('asset/srtdash/srtdash/') ?>assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url('asset/srtdash/srtdash/') ?>assets/css/metisMenu.css">
    <link rel="stylesheet" href="<?= base_url('asset/srtdash/srtdash/') ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('asset/srtdash/srtdash/') ?>assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="<?= base_url('asset/srtdash/srtdash/') ?>assets/css/typography.css">
    <link rel="stylesheet" href="<?= base_url('asset/srtdash/srtdash/') ?>assets/css/default-css.css">
    <link rel="stylesheet" href="<?= base_url('asset/srtdash/srtdash/') ?>assets/css/styles.css">
    <link rel="stylesheet" href="<?= base_url('asset/srtdash/srtdash/') ?>assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="<?= base_url('asset/srtdash/srtdash/') ?>assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area login-s2">
        <div class="container">
            <div class="login-box ptb--100">
                <form action="<?= base_url('cLogin') ?>" method="POST">
                    <div class="login-form-head">
                        <h4>Login User Ciremai Coffe</h4>
                        <?php
                        if ($this->session->userdata('error')) {
                            echo '<div class="alert alert-danger" role="alert">';
                            echo $this->session->userdata('error');
                            echo ' </div>';
                        }
                        ?>
                        <?php
                        if ($this->session->userdata('success')) {
                            echo '<div class="alert alert-success" role="alert">';
                            echo $this->session->userdata('success');
                            echo ' </div>';
                        }
                        ?>
                    </div>

                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" name="username" id="exampleInputEmail1">
                            <i class="ti-user"></i>
                            <?= form_error('username', '<div class="text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" id="exampleInputPassword1">
                            <i class="ti-lock"></i>
                            <?= form_error('password', '<div class="text-danger">', '</div>'); ?>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Submit <i class="ti-arrow-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->

    <!-- jquery latest version -->
    <script src="<?= base_url('asset/srtdash/srtdash/') ?>assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="<?= base_url('asset/srtdash/srtdash/') ?>assets/js/popper.min.js"></script>
    <script src="<?= base_url('asset/srtdash/srtdash/') ?>assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url('asset/srtdash/srtdash/') ?>assets/js/owl.carousel.min.js"></script>
    <script src="<?= base_url('asset/srtdash/srtdash/') ?>assets/js/metisMenu.min.js"></script>
    <script src="<?= base_url('asset/srtdash/srtdash/') ?>assets/js/jquery.slimscroll.min.js"></script>
    <script src="<?= base_url('asset/srtdash/srtdash/') ?>assets/js/jquery.slicknav.min.js"></script>

    <!-- others plugins -->
    <script src="<?= base_url('asset/srtdash/srtdash/') ?>assets/js/plugins.js"></script>
    <script src="<?= base_url('asset/srtdash/srtdash/') ?>assets/js/scripts.js"></script>
</body>

</html>