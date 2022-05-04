<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6 mb-5 mt-5">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Dashboard</h4>
            </div>
        </div>
    </div>
</div>
<!-- page title area end -->
<div class="main-content-inner">
    <!-- sales report area start -->
    <div class="sales-report-area mt-5 mb-5">
        <div class="row">
            <!-- Live Crypto Price area start -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Informasi Stok Bahan Baku Pabrik</h4>
                        <div class="cripto-live mt-5">
                            <ul>
                                <?php
                                foreach ($bahan_baku as $key => $value) {
                                ?>
                                    <li>
                                        <?= $value->nama_bahan ?><span><i class="<?php if ($value->stok_pabrik <= 3) {
                                                                                        echo 'fa fa-long-arrow-down';
                                                                                    } else {
                                                                                        echo 'fa fa-long-arrow-up';
                                                                                    } ?>"></i>Stok: <span <?php if ($value->stok_pabrik <= 3) {
                                                                                                                echo 'class="badge badge-danger"';
                                                                                                            } else {
                                                                                                                echo 'class="badge badge-success"';
                                                                                                            } ?>> <?= $value->stok_pabrik ?></span></span>
                                    </li>
                                <?php
                                }
                                ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Informasi Stok Bahan Baku Supplier</h4>
                        <div class="cripto-live mt-5">
                            <ul>
                                <?php
                                foreach ($bahan_baku as $key => $value) {
                                ?>
                                    <li>
                                        <?= $value->nama_bahan ?><span><i class="<?php if ($value->stok <= 3) {
                                                                                        echo 'fa fa-long-arrow-down';
                                                                                    } else {
                                                                                        echo 'fa fa-long-arrow-up';
                                                                                    } ?>"></i>Stok: <span <?php if ($value->stok <= 3) {
                                                                                                                echo 'class="badge badge-danger"';
                                                                                                            } else {
                                                                                                                echo 'class="badge badge-success"';
                                                                                                            } ?>> <?= $value->stok ?></span></span>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main content area end -->
</div>