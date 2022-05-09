<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6 mb-5 mt-5">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">DASHBOARD</h4>

            </div>
        </div>

    </div>
    <div class="alert alert-success" role="alert">
        <strong>Sukses!</strong> Selamat Datang Supplier!
    </div>
</div>
<!-- page title area end -->
<div class="main-content-inner">
    <!-- sales report area start -->
    <div class="sales-report-area sales-style-two">
        <div class="row">

            <!-- visitor graph area end -->
            <!-- order list area start -->
            <div class="card mt-5">
                <div class="card-body">
                    <h4 class="header-title">Informasi Stok Bahan Baku Supplier</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Bahan Baku</th>
                                    <th>Deskripsi</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($bahan_jadi as $key => $value) {
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $value->nm_bhn_jd ?></td>
                                        <td><?= $value->deskripsi ?></td>
                                        <td>Rp.<?= number_format($value->harga)  ?></td>
                                        <td>
                                            <?php
                                            if ($value->stok <= '2') {
                                            ?>
                                                <span class="text-danger"><?= $value->stok ?><i class="ti-arrow-down"></i></span>
                                            <?php
                                            } else {
                                            ?>
                                                <span class="text-success"><?= $value->stok ?><i class="ti-arrow-up"></i></span>
                                            <?php
                                            }
                                            ?>

                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="pagination_area pull-right mt-5">
                        <ul>
                            <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- main content area end -->