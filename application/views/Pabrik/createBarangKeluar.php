<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6 mb-5 mt-5">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Create New Bahan Keluar</h4>

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
                        <h4 class="header-title">Create New Bahan Keluar</h4>
                        <form action="<?= base_url('Pabrik/cBahanBakuKeluar/create') ?>" method="POST">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Bahan Baku</label>
                                        <select id="bhn_baku" class="form-control" name="bahan_baku">
                                            <option value="">---Pilih Bahan Baku---</option>
                                            <?php
                                            foreach ($bahan_baku as $key => $value) {
                                            ?>
                                                <option data-tglMasuk="<?= $value->tgl_masuk ?>" data-qty="<?= $value->stokp ?>" value="<?= $value->id_bbmasukp ?>"><?= $value->nm_bahanbaku ?> | <?= $value->tgl_masuk ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <?= form_error('bahan_baku', '<small id="emailHelp" class="form-text text-danger">', '</small>') ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tanggal Masuk</label>
                                        <input type="text" class="tanggal form-control" placeholder="Enter Tanggal Masuk" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Stok Barang</label>
                                        <input type="number" class="stok form-control" name="stok" placeholder="Enter Stok Barang" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Quantity Keluar</label>
                                        <input type="number" value="<?= set_value('stok') ?>" name="qty_kel" class="form-control" placeholder="Enter Quantity Keluar">
                                        <?= form_error('qty_kel', '<small id="emailHelp" class="form-text text-danger">', '</small>') ?>
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