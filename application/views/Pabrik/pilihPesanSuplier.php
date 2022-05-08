<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6 mb-5 mt-5">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Pilih Supplier Pemesanan</h4>
            </div>
        </div>

    </div>
</div>
<!-- page title area end -->
<div class="main-content-inner">
    <div class="row">
        <div class="col-lg-12 col-ml-12">
            <!-- basic form start -->
            <div class="col-lg-6 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Informasi Supplier</h4>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table text-center">
                                    <thead class="text-uppercase bg-info">
                                        <tr class="text-white">
                                            <th scope="col">No.</th>
                                            <th scope="col">Nama Supplier</th>
                                            <th scope="col">Alamat</th>
                                            <th scope="col">No Telepon</th>
                                            <th scope="col">Pesan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($supplier as $key => $value) {
                                        ?>
                                            <tr>
                                                <th scope="row"><?= $no++ ?>.</th>
                                                <td><?= $value->nama_user ?></td>
                                                <td><?= $value->alamat ?></td>
                                                <td><?= $value->no_hp ?></td>
                                                <td><a href="<?= base_url('Pabrik/cPemesanan/pesan/' . $value->id_user) ?>"><i class="ti-arrow-top-right"></i></a></td>
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
            </div>
        </div>

    </div>
</div>