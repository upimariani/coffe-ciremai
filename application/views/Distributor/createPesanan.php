<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6 mb-5 mt-5">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Pesan Bahan Jadi</h4>

            </div>
            <a href="<?= base_url('Distributor/cPemesanan') ?>">Kembali</a>
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
                        <h4 class="header-title">Pesan Bahan Jadi</h4>
                        <form action="<?= base_url('Distributor/cPemesanan/add_cart') ?>" method="POST">
                            <input type="hidden" name="price" class="harga">
                            <input type="hidden" name="stok" class="stok">
                            <input type="hidden" name="name" class="nama">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Bahan Jadi</label>
                                <select id="bahan-jadi" name="id" class="custom-select">
                                    <option value=" ">---Pilih Bahan Baku---</option>
                                    <?php
                                    foreach ($bahan_jadi as $key => $value) {
                                    ?>
                                        <option data-nama="<?= $value->nm_produk ?>" data-harga="<?= $value->harga ?>" data-stok="<?= $value->stok ?>" value="<?= $value->id_produk ?>"><?= $value->nm_produk ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <?= form_error('id', '<small id="emailHelp" class="form-text text-danger">', '</small>') ?>
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
                                <input type="number" min="1" value="<?= set_value('qty') ?>" name="qty" class="form-control" placeholder="Enter Quantity">
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
                                                    <td><a href="<?= base_url('Distributor/cPemesanan/delete_cart/' . $value['rowid']) ?>"><i class="ti-trash"></i></a></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>Ongkir :</td>
                                                <td class="ongkir">Rp. </td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>Sub Total :</td>
                                                <td>Rp. <?= number_format($this->cart->total())  ?></td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>Total :</td>
                                                <td class="total">Rp. </td>
                                                <td>&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <hr>
                                    <h4>Masukkan Alamat Pengiriman</h4>
                                    <form action="<?= base_url('Distributor/cPemesanan/order') ?>" method="POST">
                                        <?php $id_transaksi = date('Ymd') . strtoupper(random_string('alnum', 8));
                                        ?>
                                        <?php
                                        $tgl1 = date('Y-m-d'); // pendefinisian tanggal awal
                                        $tgl2 = date('Y-m-d', strtotime('+1 days', strtotime($tgl1))); //operasi penjumlahan tanggal sebanyak 6 hari

                                        ?>
                                        <input type="hidden" name="tgl" value="<?= $tgl2 ?>">
                                        <input type="hidden" name="id_transaksi" value="<?= $id_transaksi ?>">
                                        <input type="hidden" name="id_user" value="<?= $this->session->userdata('id') ?>">
                                        <input type="hidden" name="total" class="total">
                                        <input type="hidden" name="ongkir" class="ongkir">

                                        <div class="form-group">
                                            <select name="kecamatan" id="kecamatan" class="custom-select">
                                                <option value="">---Pilih Kecamatan---</option>
                                                <option data-total="<?= $this->cart->total() + 7000 ?>" data-ongkir="7000" value="Kuningan">Kuningan</option>
                                                <option data-total="<?= $this->cart->total()  + 8000 ?>" data-ongkir="8000" value="Kramatmulya">Kramatmulya</option>
                                                <option data-total="<?= $this->cart->total()  + 9000 ?>" data-ongkir=" 9000" value="Ciniru">Ciniru</option>
                                                <option data-total="<?= $this->cart->total()  + 10000 ?>" data-ongkir="10000" value="Hantara">Hantara</option>
                                                <option data-total="<?= $this->cart->total()  + 11000 ?>" data-ongkir="11000" value="Cigugur">Cigugur</option>
                                                <option data-total="<?= $this->cart->total()  + 12000 ?>" data-ongkir="12000" value="Luragung">Luragung</option>
                                                <option data-total="<?= $this->cart->total()  + 13000 ?>" data-ongkir="13000" value="Cimahi">Cimahi</option>
                                                <option data-total="<?= $this->cart->total()  + 14000 ?>" data-ongkir="14000" value="Cibingbin">Cibingbin</option>
                                                <option data-total="<?= $this->cart->total()  + 15000 ?>" data-ongkir="15000" value="Cibeureum">Cibeureum</option>
                                                <option data-total="<?= $this->cart->total()  + 16000 ?>" data-ongkir="16000" value="Ciwaru">Ciwaru</option>
                                                <option data-total="<?= $this->cart->total()  + 17000 ?>" data-ongkir="17000" value="Karangkancana">Karangkancana</option>
                                                <option data-total="<?= $this->cart->total()  + 18000 ?>" data-ongkir="18000" value="Garawang">Garawangi</option>
                                                <option data-total="<?= $this->cart->total()  + 19000 ?>" data-ongkir="19000" value="Maleber">Maleber</option>
                                                <option data-total="<?= $this->cart->total()  + 20000 ?>" data-ongkir="20000" value="Cidahu">Cidahu</option>
                                                <option data-total="<?= $this->cart->total()  + 21000 ?>" data-ongkir="21000" value="Kalimang">Kalimanggis</option>
                                                <option data-total="<?= $this->cart->total()  + 22000 ?>" data-ongkir="22000" value="Ciawigebang">Ciawigebang</option>
                                                <option data-total="<?= $this->cart->total()  + 23000 ?>" data-ongkir="23000" value="Cipicung">Cipicung</option>
                                                <option data-total="<?= $this->cart->total()  + 24000 ?>" data-ongkir="24000" value="Sindanga">Sindangagung</option>
                                                <option data-total="<?= $this->cart->total()  + 25000 ?>" data-ongkir="25000" value="Lebakwan">Lebakwangi</option>
                                                <option data-total="<?= $this->cart->total()  + 26000 ?>" data-ongkir="26000" value="Darma">Darma</option>
                                                <option data-total="<?= $this->cart->total()  + 27000 ?>" data-ongkir="27000" value="Cilimus">Cilimus</option>
                                                <option data-total="<?= $this->cart->total()  + 28000 ?>" data-ongkir="28000" value="Cigandam">Cigandamekar</option>
                                                <option data-total="<?= $this->cart->total()  + 29000 ?>" data-ongkir="29000" value="Jalaksan">Jalaksana</option>
                                                <option data-total="<?= $this->cart->total()  + 30000 ?>" data-ongkir="30000" value="Japara">Japara</option>
                                                <option data-total="<?= $this->cart->total()  + 31000 ?>" data-ongkir="31000" value="Mandirancan">Mandirancan</option>
                                                <option data-total="<?= $this->cart->total()  + 32000 ?>" data-ongkir="32000" value="Pancalang">Pancalang</option>
                                                <option data-total="<?= $this->cart->total()  + 33000 ?>" data-ongkir="33000" value="Pasawahan">Pasawahan</option>
                                                <option data-total="<?= $this->cart->total()  + 34000 ?>" data-ongkir="34000" value="Kadugede">Kadugede</option>
                                                <option data-total="<?= $this->cart->total()  + 35000 ?>" data-ongkir="35000" value="Nusaherang">Nusaherang</option>
                                                <option data-total="<?= $this->cart->total()  + 36000 ?>" data-ongkir="36000" value="Selajambe">Selajambe</option>
                                                <option data-total="<?= $this->cart->total()  + 37000 ?>" data-ongkir="37000" value="Subang">Subang</option>
                                                <option data-total="<?= $this->cart->total()  + 38000 ?>" data-ongkir="38000" value="Cilebak">Cilebak</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="pengiriman" class="form-control" placeholder="Masukkan Alamat Detail...">
                                        </div>

                                        <button type="submit" class="btn btn-success mt-3">Pesan</button>
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