<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6 mb-5 mt-5">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Create New User Akun</h4>

            </div>
            <a href="<?= base_url('Pabrik/cUser') ?>">Kembali</a>
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
                        <h4 class="header-title">Create New User Akun</h4>
                        <form action="<?= base_url('Pabrik/cUser/create') ?>" method="POST">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama User*</label>
                                <input type="text" value="<?= set_value('nama') ?>" name="nama" class="form-control" placeholder="Enter Nama User">
                                <?= form_error('nama', '<small id="emailHelp" class="form-text text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Alamat*</label>
                                <input type="text" value="<?= set_value('alamat') ?>" name="alamat" class="form-control" placeholder="Enter Alamat">
                                <?= form_error('alamat', '<small id="emailHelp" class="form-text text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">No Telepon*</label>
                                <input type="number" value="<?= set_value('no_hp') ?>" name="no_hp" class="form-control" placeholder="Enter No Telepon">
                                <?= form_error('no_hp', '<small id="emailHelp" class="form-text text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Username*</label>
                                <input type="number" value="<?= set_value('username') ?>" name="username" class="form-control" placeholder="Enter Username">
                                <?= form_error('username', '<small id="emailHelp" class="form-text text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password*</label>
                                <input type="number" value="<?= set_value('password') ?>" name="password" class="form-control" placeholder="Enter Password">
                                <?= form_error('password', '<small id="emailHelp" class="form-text text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Level User*</label>
                                <select name="level" class="form-control">
                                    <option value="">---Pilih Level User---</option>
                                    <option value="1">Supplier</option>
                                    <option value="2">Pabrik</option>
                                    <option value="3">Distributor</option>
                                </select>
                                <?= form_error('level', '<small id="emailHelp" class="form-text text-danger">', '</small>') ?>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>