<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6 mb-5 mt-5">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Create Bahan Keluar</h4>

            </div>
            <a href="<?= base_url('Distributor/cBahanKeluar') ?>">Kembali</a>
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
</div>
<!-- page title area end -->
<div class="main-content-inner">
    <div class="row">
        <div class="col-lg-6 col-ml-12">
            <!-- basic form start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Create Bahan Jadi Keluar</h4>
                        <form action="<?= base_url('Distributor/cBahanKeluar/create') ?>" method="POST">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Produk</label>
                                <select id="bhn-jd" name="bahan_jadi" class="custom-select">
                                    <option value="">---Pilih Produk---</option>
                                    <?php
                                    foreach ($bahan_jadi as $key => $value) {
                                        if ($value->stokd != 0) {

                                    ?>
                                            <option data-harga="Rp. <?= number_format($value->harga, 0)  ?>" data-stok="<?= $value->stokd ?>" value="<?= $value->id_masukd ?>" <?php if (set_value('bahan_jadi') == $value->id_masukd) {
                                                                                                                                                                                    echo 'selected';
                                                                                                                                                                                } ?>><?= $value->nm_produk ?> | Stok Tgl <?= $value->tgl_masuk ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <?= form_error('bahan_jadi', '<small id="emailHelp" class="form-text text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Stok Sebelumnya</label>
                                <input type="text" name="stok" value="<?= set_value('stok') ?>" class="stok form-control" placeholder="Enter Bahan Jadi" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Harga</label>
                                <input type="text" name="harga" value="<?= set_value('harga') ?>" class="harga form-control" placeholder="Enter Harga" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Quantity Keluar</label>
                                <input type="number" value="<?= set_value('qty') ?>" name="qty" class="form-control" placeholder="Enter Quantity Keluar">
                                <?= form_error('qty', '<small id="emailHelp" class="form-text text-danger">', '</small>') ?>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>