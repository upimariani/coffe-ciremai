<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6 mb-5 mt-5">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Bahan Baku Keluar</h4>

            </div>
            <a href="<?= base_url('Pabrik/cBahanBakuKeluar/create') ?>">Create Bahan Baku</a>
        </div>
    </div>
    <?php
    if ($this->session->userdata('success')) {
        echo '<div class="alert alert-success" role="alert">
    <strong>Well done! </strong>';
        echo $this->session->userdata('success');
        echo ' </div>';
    }
    ?>
</div>
<!-- page title area end -->
<div class="main-content-inner">
    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Data Table Default</h4>
                    <div class="data-tables">
                        <table id="dataTable" class="text-center">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Bahan Baku</th>
                                    <th>Nama Bahan Jadi</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Tanggal Keluar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($bahan_keluar as $key => $value) {
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $value->nama_bahan ?><br>
                                            Quantity : <?= $value->stokpk ?></td>
                                        <td><?= $value->nm_bhn_jd ?><br>
                                            Quantity: <?= $value->qty_bj ?></td>
                                        <td><?= $value->tgl_masuk ?></td>
                                        <td><?= $value->tgl_keluar ?></td>

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
        <!-- data table end -->
        <!-- Dark table end -->
    </div>
</div>
</div>
<!-- main content area end --