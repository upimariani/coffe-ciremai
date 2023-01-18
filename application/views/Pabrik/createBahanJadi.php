<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6 mb-5 mt-5">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Create New Produk</h4>

            </div>
            <a href="<?= base_url('Pabrik/cBahanJadi') ?>">Kembali</a>
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
                        <h4 class="header-title">Create New Produk</h4>
                        <form action="<?= base_url('Pabrik/cBahanJadi/create') ?>" method="POST">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Produk</label>
                                <input type="text" value="<?= set_value('nama') ?>" name="nama" class="form-control" placeholder="Enter Nama">
                                <?= form_error('nama', '<small id="emailHelp" class="form-text text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Deskripsi</label>
                                <input type="text" value="<?= set_value('deskripsi') ?>" name="deskripsi" class="form-control" placeholder="Enter Deskripsi">
                                <?= form_error('deskripsi', '<small id="emailHelp" class="form-text text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Harga</label>
                                <input type="number" value="<?= set_value('harga') ?>" name="harga" class="form-control" placeholder="Enter Harga">
                                <?= form_error('harga', '<small id="emailHelp" class="form-text text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Stok</label>
                                <input type="number" value="<?= set_value('stok') ?>" name="stok" class="form-control" placeholder="Enter Stok">
                                <?= form_error('stok', '<small id="emailHelp" class="form-text text-danger">', '</small>') ?>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>