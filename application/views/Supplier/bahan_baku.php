<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6 mb-5 mt-5">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Bahan Baku</h4>

            </div>
            <a href="<?= base_url('Supplier/cBahanBaku/create') ?>">Create Bahan Baku</a> | <a href="<?= base_url('Supplier/cBahanBaku/update_stok') ?>">Update Stok Bahan Baku</a>
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
                    <h4 class="header-title">Data Table Default</h4>
                    <div class="data-tables">
                        <table id="dataTable" class="text-center">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Bahan Baku</th>
                                    <th>Deskripsi</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($bahan as $key => $value) {
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $value->nm_bahanbaku ?></td>
                                        <td><?= $value->deskripsi_bb ?></td>
                                        <td>Rp. <?= number_format($value->harga_bb, 0)  ?></td>
                                        <td><?= $value->stok_bb ?> kg</td>
                                        <td><a href="<?= base_url('Supplier/cBahanBaku/edit/' . $value->id_bahanbaku) ?>" type="button" class="btn btn-success btn-sm">Update</a>
                                            <a href="<?= base_url('Supplier/cBahanBaku/delete/' . $value->id_bahanbaku) ?>" type="button" class="btn btn-danger btn-sm">Delete</a>
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