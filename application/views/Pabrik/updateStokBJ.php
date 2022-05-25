<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6 mb-5 mt-5">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Update Stok Bahan Jadi</h4>

            </div>
            <a href="<?= base_url('Pabrik/cBahanBakuKeluar') ?>">Kembali</a>
        </div>
    </div>
</div>
<!-- page title area end -->
<div class="main-content-inner">
    <div class="row">
        <div class="col-lg-8 col-ml-12">
            <!-- basic form start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Update Stok</h4>
                        <form action="<?= base_url('Pabrik/cBahanBakuKeluar/updateStokBahanJadi') ?>" method="POST">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Bahan Baku</label>
                                        <select id="bhn_jd" class="form-control" name="bahan_jadi">
                                            <option value="">---Pilih Bahan Jadi---</option>
                                            <?php
                                            foreach ($bahan_jadi as $key => $value) {
                                            ?>
                                                <option data-qty="<?= $value->stok ?>" value="<?= $value->id_produk ?>"><?= $value->nm_produk ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <?= form_error('bahan_baku', '<small id="emailHelp" class="form-text text-danger">', '</small>') ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Stok Sebelumnya</label>
                                        <input type="text" class="stok form-control" name="qty" placeholder="Enter Bahan Jadi" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tambah Stok Bahan Jadi</label>
                                        <input type="number" class="form-control" name="stok" placeholder="Enter Stok Bahan Jadi">
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