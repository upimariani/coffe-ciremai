<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6 mb-5 mt-5">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Detail Pemesanan</h4>

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
        <div class="col-lg-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="invoice-area">
                        <div class="invoice-head">
                            <div class="row">
                                <div class="iv-left col-6">
                                    <span>INVOICE</span>
                                </div>
                                <div class="iv-right col-6 text-md-right">
                                    <span><?= $detail['transaksi']->id_invoicep ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="invoice-address">
                                    <h3>invoiced to</h3>
                                    <h5><?= $detail['transaksi']->nama_user ?></h5>
                                    <p><?= $detail['transaksi']->alamat ?></p>
                                    <p><?= $detail['transaksi']->no_hp ?></p>
                                </div>
                            </div>
                            <div class="col-md-6 text-md-right">
                                <ul class="invoice-date">
                                    <li>Invoice Date : <?= $detail['transaksi']->tgl_orderpabrik ?></li>
                                </ul>
                                <?php
                                if ($detail['transaksi']->status_orderpabrik != '0') {
                                ?>
                                    <hr>
                                    <h5 class="text-muted">Bukti Pembayaran</h5><br>
                                    <img style="width: 250px;" src="<?= base_url('asset/pembayaran-pabrik/' . $detail['transaksi']->bukti_bayarpabrik) ?>">
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                        <div class="invoice-table table-responsive mt-5">
                            <table class="table table-bordered table-hover text-right">
                                <thead>
                                    <tr class="text-capitalize">
                                        <th class="text-center" style="width: 5%;">No</th>
                                        <th class="text-left" style="width: 45%; min-width: 130px;">Nama Barang</th>
                                        <th>Quantity</th>
                                        <th style="min-width: 100px">Harga</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($detail['pesanan'] as $key => $value) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td class="text-left"><?= $value->nm_bahanbaku ?></td>
                                            <td><?= $value->qty_bb ?></td>
                                            <td>Rp. <?= number_format($value->harga_bb, 0) ?></td>
                                            <td>Rp. <?= number_format($value->harga_bb * $value->qty_bb) ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4">total balance :</td>
                                        <td>Rp. <?= number_format($detail['transaksi']->total_bayarpabrik) ?></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="invoice-buttons text-right">
                        <button onclick="window.print()" class="btn btn-success">PRINT INVOICE</button>
                        <?php
                        if ($detail['transaksi']->status_orderpabrik == '1') {
                        ?>
                            <a href="<?= base_url('Supplier/cPemesanan/konfirmasi_pembayaran/' . $detail['transaksi']->id_invoicep) ?>" class="btn btn-success">Konfirmasi Pembayaran</a>
                        <?php
                        } else if ($detail['transaksi']->status_orderpabrik == '2') {
                        ?>
                            <a href="<?= base_url('Supplier/cPemesanan/pesanan_dikirim/' . $detail['transaksi']->id_invoicep) ?>" class="btn btn-success">Pesanan Dikirim</a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>