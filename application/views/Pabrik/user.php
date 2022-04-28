<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6 mb-5 mt-5">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">User Akun</h4>

            </div>
            <a href="<?= base_url('Pabrik/cUser/create') ?>">Create New User Akun</a>
        </div>
    </div>
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
        <!-- data table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Informasi User</h4>
                    <div class="data-tables">
                        <table id="dataTable" class="text-center">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th>No.</th>
                                    <th>Nama User</th>
                                    <th>Alamat</th>
                                    <th>No Telepon</th>
                                    <th>Akun</th>
                                    <th>Level User</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($user as $key => $value) {
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $value->nama_user ?></td>
                                        <td><?= $value->alamat ?></td>
                                        <td><?= $value->no_hp ?></td>
                                        <td>Username : <span class="badge badge-info"><?= $value->username ?></span><br>
                                            Password : <span class="badge badge-warning"> <?= $value->password ?></span></td>
                                        <td><?php if ($value->level_user == '1') {
                                                echo 'Supplier';
                                            } else if ($value->level_user == '2') {
                                                echo 'Pabrik';
                                            } else {
                                                echo 'Distributor';
                                            } ?></td>
                                        <td><a href="<?= base_url('Pabrik/cUser/edit/' . $value->id_user) ?>" type="button" class="btn btn-success btn-sm">Update</a>
                                            <a href="<?= base_url('Pabrik/cUser/delete/' . $value->id_user) ?>" type="button" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- data table end -->
        <!-- Dark table end -->
    </div>
</div>
</div>
<!-- main content area end --