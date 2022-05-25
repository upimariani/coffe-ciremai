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
                                    <span><?= $detail['transaksi']->id_invoiced ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="invoice-address">
                                    <h3>invoiced to</h3>
                                    <h5><?= $detail['transaksi']->nama_user ?></h5>
                                    <p><?= $detail['transaksi']->alamat ?></p>
                                    <p><?= $detail['transaksi']->no_hp ?></p><br>
                                    <hr>
                                </div>

                                <?php
                                if ($detail['transaksi']->status_orderdistr == '0') {
                                ?>
                                    <p>Silahkan Upload Bukti Pembayaran*</p>
                                    <?php echo form_open_multipart('Distributor/cPemesanan/detail_pesanan/' . $detail['transaksi']->id_invoiced); ?>
                                    <input type="file" name="bukti" class="form-control">
                                    <button type="submit" class="btn btn-warning mt-2 btn-sm">Upload</button>
                                    </form>
                                <?php
                                }
                                ?>



                            </div>
                            <div class="col-md-6 text-md-right">
                                <ul class="invoice-date">
                                    <li>Invoice Date : <?= $detail['transaksi']->tgl_orderdistr ?></li>
                                </ul>
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
                                            <td class="text-left"><?= $value->nm_produk ?></td>
                                            <td><?= $value->qty_produk ?></td>
                                            <td>Rp. <?= number_format($value->harga, 0) ?></td>
                                            <td>Rp. <?= number_format($value->harga * $value->qty_produk) ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4">total balance :</td>
                                        <td>Rp. <?= number_format($detail['transaksi']->total_bayardistr) ?></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="invoice-buttons text-right">
                        <button onclick="window.print()" class="btn btn-success">PRINT INVOICE</button>
                        <?php
                        if ($detail['transaksi']->status_orderdistr == '3') {
                        ?>
                            <a href="<?= base_url('Distributor/cPemesanan/pesanan_diterima/' . $detail['transaksi']->id_invoiced) ?>">Pesanan Diterima</a>
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