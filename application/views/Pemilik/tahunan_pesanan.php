<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6 mb-5 mt-5">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Cetak Laporan Tahun <?= $tahun ?></h4>

            </div>
            <button class="btn btn-primary rounded-pill mt-3" onclick="window.print()"><i class="ti-printer"></i> | Print</button>
        </div>
    </div>
</div>
<!-- page title area end -->
<div class="main-content-inner">
    <div class="row">
        <div class="col-lg-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Laporan Bahan Baku Keluar</h4>
                    <div class="single-table">
                        <div class="table-responsive">
                            <table class="table text-center">
                                <thead class="text-uppercase bg-light">
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">id Invoice</th>
                                        <th scope="col">Supplier</th>

                                        <th scope="col">Tanggal Transaksi</th>
                                        <th scope="col">Total Bayar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $total = 0;
                                    foreach ($laporan as $key => $value) {
                                        $total += $value->total_bayarpabrik;
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value->id_invoicep ?></td>
                                            <td><?= $value->nama_user ?></td>
                                            <td><?= $value->tgl_orderpabrik ?></td>
                                            <td>Rp. <?= number_format($value->total_bayarpabrik) ?></td>

                                        </tr>
                                    <?php
                                    }
                                    ?>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>
                                            <h4>Total:</h4>
                                        </td>
                                        <td>
                                            <h5>Rp. <?= number_format($total) ?></h5>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>