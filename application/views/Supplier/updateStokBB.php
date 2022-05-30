<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6 mb-5 mt-5">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Update Stok Bahan Baku</h4>

            </div>
            <a href="<?= base_url('Supplier/cBahanBaku') ?>">Kembali</a>
        </div>
    </div>
</div>
<!-- page title area end -->
<div class="main-content-inner">
    <div class="row">
        <div class="col-lg-6 col-ml-12">
            <!-- basic form start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Stok Bahan Baku</h4>
                        <form action="<?= base_url('Supplier/cBahanBaku/update_stok') ?>" method="POST">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Bahan Baku</label>
                                <select id="stok-bb" class="form-control" name="id_bb">
                                    <option value="">---Pilih Bahan Baku---</option>
                                    <?php
                                    foreach ($bahan_baku as $key => $value) {
                                    ?>
                                        <option data-stok="<?= $value->stok_bb ?>" value="<?= $value->id_bahanbaku ?>"><?= $value->nm_bahanbaku ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <?= form_error('id_bb', '<small id="emailHelp" class="form-text text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Stok Sebelumnya</label>
                                <input type="text" name="stok" class="stok form-control" placeholder="Enter Stok">
                                <?= form_error('stok', '<small id="emailHelp" class="form-text text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Stok Masuk</label>
                                <input type="number" name="qty" class="form-control" placeholder="Enter Quantity">
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