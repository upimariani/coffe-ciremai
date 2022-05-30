<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6 mb-5 mt-5">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Bahan Masuk</h4>
            </div>
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
                    <h4 class="header-title">Informasi Barang Masuk</h4>
                    <div class="data-tables">
                        <table id="dataTable" class="text-center">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th>No</th>
                                    <th>Bahan Jadi</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Stok</th>
                                    <th>Harga Beli</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($masuk as $key => $value) {
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $value->nm_produk ?></td>
                                        <td><?= $value->tgl_masuk ?> pcs</td>
                                        <td><?php if ($value->stokd == '0') {
                                                echo '<span class="badge badge-danger">Stok Habis!</span>';
                                            } else {
                                                echo $value->stokd . 'pcs';
                                            } ?></td>
                                        <td>Rp. <?= number_format($value->harga, 0)  ?></td>
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