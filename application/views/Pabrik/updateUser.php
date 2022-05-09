<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6 mb-5 mt-5">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Update User Akun</h4>

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
                        <h4 class="header-title">Update User Akun</h4>
                        <form action="<?= base_url('Pabrik/cUser/edit/' . $user->id_user) ?>" method="POST">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama User*</label>
                                <input type="text" value="<?= $user->nama_user ?>" name="nama" class="form-control" placeholder="Enter Nama User">
                                <?= form_error('nama', '<small id="emailHelp" class="form-text text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Alamat*</label>
                                <input type="text" value="<?= $user->alamat ?>" name="alamat" class="form-control" placeholder="Enter Alamat">
                                <?= form_error('alamat', '<small id="emailHelp" class="form-text text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">No Telepon*</label>
                                <input type="number" value="<?= $user->no_hp ?>" name="no_hp" class="form-control" placeholder="Enter No Telepon">
                                <?= form_error('no_hp', '<small id="emailHelp" class="form-text text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Username*</label>
                                <input type="text" value="<?= $user->username ?>" name="username" class="form-control" placeholder="Enter Username">
                                <?= form_error('username', '<small id="emailHelp" class="form-text text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password*</label>
                                <input type="text" value="<?= $user->password ?>" name="password" class="form-control" placeholder="Enter Password">
                                <?= form_error('password', '<small id="emailHelp" class="form-text text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Level User*</label>
                                <select name="level" class="form-control">
                                    <option value="">---Pilih Level User---</option>
                                    <option value="1" <?php if ($user->level_user == '1') {
                                                            echo 'selected';
                                                        } ?>>Supplier</option>
                                    <option value="2" <?php if ($user->level_user == '2') {
                                                            echo 'selected';
                                                        } ?>>Pabrik</option>
                                    <option value="3" <?php if ($user->level_user == '3') {
                                                            echo 'selected';
                                                        } ?>>Distributor</option>
                                    <option value="4" <?php if ($user->level_user == '4') {
                                                            echo 'selected';
                                                        } ?>>Pemilik</option>
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