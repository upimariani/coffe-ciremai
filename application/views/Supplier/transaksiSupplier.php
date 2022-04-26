<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6 mb-5 mt-5">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Pemesanan Bahan Baku</h4>

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
                    <h4 class="header-title">Informasi Status Pemesanan</h4>
                    <div class="data-tables">
                        <table id="dataTable" class="text-center">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th>No</th>
                                    <th>Id Transaksi</th>
                                    <th>Atas Nama</th>
                                    <th>Tanggal Order</th>
                                    <th>Total Pembayaran</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($pesanan as $key => $value) {
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $value->id_tpabrik ?>
                                            <?php
                                            if ($value->status_order == '0') {
                                                echo ' <span class="badge badge-danger">Belum Bayar</span>';
                                            } else if ($value->status_order == '1') {
                                                echo '<span class="badge badge-warning">Menunggu Konfirmasi</span>';
                                            } else if ($value->status_order == '2') {
                                                echo ' <span class="badge badge-info">Diproses</span>';
                                            } else if ($value->status_order == '3') {
                                                echo '<span class="badge badge-primary">Dikirim</span>';
                                            } else if ($value->status_order == '4') {
                                                echo '<span class="badge badge-success">Selesai</span>';
                                            }
                                            ?>
                                        </td>
                                        <td><?= $value->nama_user ?></td>
                                        <td><?= $value->tgl_order ?></td>
                                        <td>Rp. <?= number_format($value->total_bayar) ?></td>
                                        <td><a href="<?= base_url('Supplier/cPemesanan/detail_pesanan/' . $value->id_tpabrik) ?>">Detail</a></td>
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