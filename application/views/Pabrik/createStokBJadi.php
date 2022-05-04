<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6 mb-5 mt-5">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Update Stok Bahan Jadi</h4>

            </div>
            <a href="<?= base_url('Pabrik/cBahanBakuKeluar') ?>">Kembali</a>
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
        <div class="col-lg-8 col-ml-12">
            <!-- basic form start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Update Stok Bahan Jadi</h4>
                        <form action="<?= base_url('Pabrik/cBahanBakuKeluar/stok_bjadi') ?>" method="POST">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Bahan Jadi</label>
                                        <select id="stok-bjadi" class="form-control" name="bahan_jadi">
                                            <option value="">---Pilih Bahan Jadi---</option>
                                            <?php
                                            foreach ($bahan_jadi as $key => $value) {
                                            ?>
                                                <option data-qty="<?= $value->stok ?>" value="<?= $value->id_bahan_jadi ?>"><?= $value->nm_bhn_jd  ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <?= form_error('bahan_baku', '<small id="emailHelp" class="form-text text-danger">', '</small>') ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Stok Bahan Jadi Sebelumnya</label>
                                        <input type="number" class="stok form-control" name="stok_sebelumnya" placeholder="Enter Stok Barang" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Stok Masuk</label>
                                        <input type="number" value="<?= set_value('stok_masuk') ?>" name="stok_masuk" class="form-control" placeholder="Enter Quantity Keluar">
                                        <?= form_error('stok_masuk', '<small id="emailHelp" class="form-text text-danger">', '</small>') ?>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>