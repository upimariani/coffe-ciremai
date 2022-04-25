<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6 mb-5 mt-5">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Dashboard</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="index.html">Home</a></li>
                    <li><span>Datatable</span></li>
                </ul>
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
                        <h4 class="header-title">Update Bahan Baku</h4>
                        <form action="<?= base_url('Supplier/cBahanBaku/edit/' . $bahan->id_bahan) ?>" method="POST">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Bahan Baku</label>
                                <input type="text" value="<?= $bahan->nama_bahan ?>" name="nama" class="form-control" placeholder="Enter Nama">
                                <?= form_error('nama', '<small id="emailHelp" class="form-text text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Deskripsi</label>
                                <input type="text" value="<?= $bahan->deskripsi ?>" name="deskripsi" class="form-control" placeholder="Enter Deskripsi">
                                <?= form_error('deskripsi', '<small id="emailHelp" class="form-text text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Harga</label>
                                <input type="number" value="<?= $bahan->harga ?>" name="harga" class="form-control" placeholder="Enter Harga">
                                <?= form_error('harga', '<small id="emailHelp" class="form-text text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Stok</label>
                                <input type="number" value="<?= $bahan->stok ?>" name="stok" class="form-control" placeholder="Enter Stok">
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