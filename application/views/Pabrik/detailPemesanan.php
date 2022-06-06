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
                                    <p><?= $detail['transaksi']->no_hp ?></p><br>
                                    <hr>
                                </div>

                                <?php
                                if ($detail['transaksi']->status_orderpabrik == '0') {
                                ?>
                                    <p>Silahkan Upload Bukti Pembayaran*</p>
                                    <p>Transfer Via Bank <?= $detail['supplier']->nm_bank ?> <strong><?= $detail['supplier']->no_rek ?></strong></p>
                                    <hr>
                                    <p>Batas Pembayaran s/d <?= $detail['transaksi']->bts_bayarp ?></p>
                                    <small class="text-danger">*Catatan : Jika pembayaran belum dilakukan hingga batas waktu yang ditentukan maka, pemesanan akan dibatalkan secara otomatis</small>
                                    <?php echo form_open_multipart('Pabrik/cPemesanan/detail_pesanan/' . $detail['transaksi']->id_invoicep); ?>
                                    <input type="file" name="bukti" class="form-control">
                                    <button type="submit" class="btn btn-warning mt-2 btn-sm">Upload</button>
                                    </form>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="col-md-6 text-md-right">
                                <ul class="invoice-date">
                                    <li>Invoice Date : <?= $detail['transaksi']->tgl_orderpabrik ?></li>
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
                                            <td class="text-left"><?= $value->nm_bahanbaku ?></td>
                                            <td><?= $value->qty_bb ?> kg</td>
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
                        if ($detail['transaksi']->status_orderpabrik == '3') {
                        ?>
                            <a href="<?= base_url('Pabrik/cPemesanan/pesanan_diterima/' . $detail['transaksi']->id_invoicep) ?>">Pesanan Diterima</a>
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