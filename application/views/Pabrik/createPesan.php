<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6 mb-5 mt-5">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Pesan Bahan Baku</h4>

            </div>
            <a href="<?= base_url('Supplier/cBahanBaku') ?>">Kembali</a>
        </div>

    </div>
    <?php
    if ($this->session->userdata('error')) {
        echo '<div class="alert alert-danger" role="alert">
    <strong>Well done! </strong>';
        echo $this->session->userdata('error');
        echo ' </div>';
    }
    ?>
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
        <div class="col-lg-6 col-ml-12">
            <!-- basic form start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Pesan Bahan Baku</h4>
                        <form action="<?= base_url('Pabrik/cPemesanan/cart') ?>" method="POST">
                            <input type="hidden" name="price" class="harga">
                            <input type="hidden" name="stok" class="stok">
                            <input type="hidden" name="name" class="nama">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Bahan Baku</label>
                                <select id="bahan-baku" name="id" class="form-control">
                                    <option>---Pilih Bahan Baku---</option>
                                    <?php
                                    foreach ($bahan_baku as $key => $value) {
                                    ?>
                                        <option data-nama="<?= $value->nama_bahan ?>" data-harga="<?= $value->harga ?>" data-stok="<?= $value->stok ?>" value="<?= $value->id_bahan ?>"><?= $value->nama_bahan ?></option>
                                    <?php
                                    }
                                    ?>

                                </select>
                                <?= form_error('nama', '<small id="emailHelp" class="form-text text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Harga</label>
                                <input type="number" name="harga" class="harga form-control" placeholder="Enter Harga" readonly>
                                <?= form_error('harga', '<small id="emailHelp" class="form-text text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Stok</label>
                                <input type="number" name="stok" class="stok form-control" placeholder="Enter Stok" readonly>
                                <?= form_error('stok', '<small id="emailHelp" class="form-text text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Quantity Pemesanan</label>
                                <input type="number" min="1" value="<?= set_value('qty') ?>" name="qty" class="form-control" placeholder="Enter Deskripsi">
                                <?= form_error('qty', '<small id="emailHelp" class="form-text text-danger">', '</small>') ?>
                            </div>


                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $tot = 0;
        foreach ($this->cart->contents() as $key => $value) {
            $tot += $value['price'];
        }
        if ($tot != 0) {
        ?>
            <div class="col-lg-6 col-ml-12">
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Keranjang Pemesanan</h4>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table text-center">
                                        <thead class="text-uppercase">
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Nama Barang</th>
                                                <th scope="col">Harga</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Subtotal</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($this->cart->contents() as $key => $value) {
                                            ?>
                                                <tr>
                                                    <th scope="row"><?= $no++ ?>.</th>
                                                    <td><?= $value['name'] ?></td>
                                                    <td><?= $value['price'] ?></td>
                                                    <td><?= $value['qty'] ?></td>
                                                    <td>Rp. <?= number_format($value['price'] * $value['qty'])  ?></td>
                                                    <td><a href="<?= base_url('Pabrik/cPemesanan/delete_cart/' . $value['rowid']) ?>"><i class="ti-trash"></i></a></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>

                                                <td>Total :</td>
                                                <td>Rp. <?= number_format($this->cart->total())  ?></td>
                                                <td>&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <form action="<?= base_url('Pabrik/cPemesanan/order') ?>" method="POST">
                                        <?php $id_transaksi = date('Ymd') . strtoupper(random_string('alnum', 8));
                                        ?>
                                        <input type="hidden" name="id_transaksi" value="<?= $id_transaksi ?>">
                                        <input type="hidden" name="total" value="<?= $this->cart->total() ?>">
                                        <input type="hidden" name="id_user" value="<?= $this->session->userdata('id') ?>">
                                        <button type="submit" class="btn btn-success">Pesan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>