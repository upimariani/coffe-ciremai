<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6 mb-5 mt-5">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Pemesanan Bahan Baku</h4>

            </div>
            <a href="<?= base_url('Pabrik/cPemesanan/pilih_supplier') ?>">Pesan</a>
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
                                    <th>No</th>
                                    <th>Id Transaksi</th>
                                    <th>Atas Nama</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Total Transaksi</th>
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
                                        <td><?= $value->id_invoicep ?>
                                            <?php
                                            if ($value->status_orderpabrik == '0') {
                                                echo ' <span class="badge badge-danger">Belum Bayar</span>';
                                            } else if ($value->status_orderpabrik == '1') {
                                                echo '<span class="badge badge-warning">Menunggu Konfirmasi</span>';
                                            } else if ($value->status_orderpabrik == '2') {
                                                echo ' <span class="badge badge-info">Diproses</span>';
                                            } else if ($value->status_orderpabrik == '3') {
                                                echo '<span class="badge badge-primary">Dikirim</span>';
                                            } else if ($value->status_orderpabrik == '4') {
                                                echo '<span class="badge badge-success">Selesai</span>';
                                            }
                                            ?>
                                        </td>
                                        <td><?= $value->nama_user ?></td>
                                        <td><?= $value->tgl_orderpabrik ?></td>
                                        <td>Rp. <?= number_format($value->total_bayarpabrik, 0) ?></td>

                                        <td><a href="<?= base_url('Pabrik/cPemesanan/detail_pesanan/' . $value->id_invoicep) ?>">Detail</a></td>
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