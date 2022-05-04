<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6 mb-5 mt-5">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Laporan Transaksi Supplier</h4>

            </div>
        </div>
    </div>
</div>
<!-- page title area end -->
<div class="main-content-inner">
    <div class="row">
        <!-- basic table start -->
        <div class="col-lg-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Informasi Transaksi Supplier</h4>
                    <div class="single-table">
                        <div class="table-responsive">
                            <table class="table text-center">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Id Transaksi</th>
                                        <th scope="col">Atas Nama</th>
                                        <th scope="col">Tanggal Order</th>
                                        <th scope="col">Total Bayar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($transaksi as $key => $value) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value->id_tpabrik ?></td>
                                            <td><?= $value->nama_user ?></td>
                                            <td><?= $value->tgl_order ?></td>
                                            <td><?= $value->total_bayar ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>