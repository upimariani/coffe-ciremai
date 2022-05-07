<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6 mb-5 mt-5">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Bahan Baku Masuk</h4>

            </div>
        </div>
    </div>
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
                                    <th>Tanggal Masuk</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($bahan_masuk as $key => $value) {
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $value->nama_bahan ?></td>
                                        <td><?= $value->tgl_masuk ?> | <?= $value->time ?></td>
                                        <td><?php if ($value->stokp == '0') {
                                                echo '<span class="badge badge-danger">Stok Habis!</span>';
                                            } else {
                                            ?>
                                                <?= $value->stokp ?>
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
                </div>
            </div>
        </div>
        <!-- data table end -->
        <!-- Dark table end -->
    </div>
</div>
</div>
<!-- main content area end --