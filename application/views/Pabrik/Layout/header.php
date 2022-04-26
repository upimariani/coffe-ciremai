<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <h3 class="text-warning">PABRIK</h3>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li <?php if ($this->uri->segment(1) == 'Pabrik' && $this->uri->segment(2) == 'cDashboard') {
                                    echo 'class="active"';
                                }  ?>><a href="<?= base_url('Pabrik/cDashboard') ?>"><i class="ti-dashboard"></i> <span>Dashboard</span></a></li>

                            <li <?php if ($this->uri->segment(1) == 'Pabrik' && $this->uri->segment(2) == 'cBahanJadi') {
                                    echo 'class="active"';
                                }  ?>><a href="<?= base_url('Pabrik/cBahanJadi') ?>"><i class="ti-archive"></i> <span>Pengelolaan Bahan Jadi</span></a></li>

                            <li <?php if ($this->uri->segment(1) == 'Pabrik' && $this->uri->segment(2) == 'cUser') {
                                    echo 'class="active"';
                                }  ?>><a href="<?= base_url('Pabrik/cUser') ?>"><i class="ti-user"></i> <span>Pengelolaan Data User</span></a></li>

                            <li <?php if ($this->uri->segment(1) == 'Pabrik' && $this->uri->segment(2) == 'cPemesanan') {
                                    echo 'class="active"';
                                }  ?>><a href="<?= base_url('Pabrik/cPemesanan') ?>"><i class="ti-bag"></i> <span>Pemesanan</span></a></li>

                            <li <?php if ($this->uri->segment(1) == 'Pabrik' && $this->uri->segment(2) == 'cBahanBakuMasuk') {
                                    echo 'class="active"';
                                }  ?>><a href="<?= base_url('Pabrik/cBahanBakuMasuk') ?>"><i class="ti-import"></i> <span>Bahan Baku Masuk</span></a></li>

                            <li <?php if ($this->uri->segment(1) == 'Pabrik' && $this->uri->segment(2) == 'cBahanBakuKeluar') {
                                    echo 'class="active"';
                                }  ?>><a href="<?= base_url('Pabrik/cBahanBakuKeluar') ?>"><i class="ti-export"></i> <span>Bahan Baku Keluar</span></a></li>

                            <li <?php if ($this->uri->segment(1) == 'Pabrik' && $this->uri->segment(2) == 'cTransaksiDistributor') {
                                    echo 'class="active"';
                                }  ?>><a href="<?= base_url('Pabrik/cTransaksiDistributor') ?>"><i class="ti-shopping-cart-full"></i> <span>Transaksi Distributor</span></a></li>
                            <li><a href="<?= base_url('cLogin/logout') ?>"><i class="ti-shift-right"></i> <span>LogOut</span></a></li>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="search-box pull-left">
                            <form action="#">
                                <input type="text" name="search" placeholder="Search..." required>
                                <i class="ti-search"></i>
                            </form>
                        </div>
                    </div>
                    <!-- profile info & task notification -->

                </div>
            </div>
            <!-- header area end -->