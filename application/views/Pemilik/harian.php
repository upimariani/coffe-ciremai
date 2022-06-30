<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6 mb-5 mt-5">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Cetak Laporan Tanggal <?= $tanggal ?> / <?= $bulan ?> / <?= $tahun ?></h4>

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
                                        <th scope="col">Nama Bahan Baku</th>
                                        <th scope="col">Tanggal Keluar</th>
                                        <th scope="col">Quantity Keluar</th>
                                        <th scope="col">Bahan Masuk Tanggal</th>
                                        <th scope="col">Id Transaksi</th>
                                        <th scope="col">Transaksi Atas Nama</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($laporan as $key => $value) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value->nm_bahanbaku ?></td>
                                            <td><?= $value->tgl_keluar ?></td>
                                            <td><?= $value->stokpk ?> pcs</td>
                                            <td><?= $value->tgl_masuk ?></td>
                                            <td><?= $value->id_invoicep ?></td>
                                            <td><?= $value->nama_user ?></td>
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