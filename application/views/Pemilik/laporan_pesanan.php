<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6 mb-5 mt-5">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Cetak Laporan Pemesanan Bahan Baku Pabrik</h4>

            </div>
        </div>
    </div>
</div>
<!-- page title area end -->
<div class="main-content-inner">
    <div class="row">


        <div class="col-md-4">
            <div class="card card-light">
                <div class="card-header">
                    <h3 class="card-title">Laporan Penjualan Harian</h3>
                </div>
                <div class="card-body">
                    <?php
                    echo form_open('Pemilik/cLaporan/lap_harian_pesanan') ?>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Tanggal</label>
                                <select name="tanggal" class="form-control">
                                    <?php
                                    $mulai = 1;
                                    for ($i = $mulai; $i < $mulai + 31; $i++) {
                                        $sel = $i == date('Y') ? 'selected="selected"' : '';
                                        echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Bulan</label>
                                <select name="bulan" class="form-control">
                                    <?php
                                    $mulai = 1;
                                    for ($i = $mulai; $i < $mulai + 12; $i++) {
                                        $sel = $i == date('Y') ? 'selected="selected"' : '';
                                        echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Tahun</label>
                                <select name="tahun" class="form-control">
                                    <?php
                                    $mulai = date('Y') - 1;
                                    for ($i = $mulai; $i < $mulai + 10; $i++) {
                                        $sel = $i == date('Y') ? 'selected="selected"' : '';
                                        echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-light btn-block"><i class="fa fa-print"></i> Cetak Laporan</button>
                            </div>
                        </div>
                    </div>
                    <?php
                    echo form_close() ?>
                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="card card-light">
                <div class="card-header">
                    <h3 class="card-title">Laporan Penjualan Bulanan</h3>
                </div>
                <div class="card-body">
                    <?php
                    echo form_open('Pemilik/cLaporan/lap_bulanan_pesanan') ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Bulan</label>
                                <select name="bulan" class="form-control">
                                    <?php
                                    $mulai = 1;
                                    for ($i = $mulai; $i < $mulai + 12; $i++) {
                                        $sel = $i == date('Y') ? 'selected="selected"' : '';
                                        echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Tahun</label>
                                <select name="tahun" class="form-control">
                                    <?php
                                    $mulai = date('Y') - 1;
                                    for ($i = $mulai; $i < $mulai + 10; $i++) {
                                        $sel = $i == date('Y') ? 'selected="selected"' : '';
                                        echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-light btn-block"><i class="fa fa-print"></i> Cetak Laporan</button>
                            </div>
                        </div>
                    </div>
                    <?php
                    echo form_close() ?>
                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="card card-light">
                <div class="card-header">
                    <h3 class="card-title">Laporan Penjualan Tahunan</h3>
                </div>
                <div class="card-body">
                    <?php
                    echo form_open('Pemilik/cLaporan/lap_tahunan_pesanan') ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Tahun</label>
                                <select name="tahun" class="form-control">
                                    <?php
                                    $mulai = date('Y') - 1;
                                    for ($i = $mulai; $i < $mulai + 10; $i++) {
                                        $sel = $i == date('Y') ? 'selected="selected"' : '';
                                        echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-light btn-block"><i class="fa fa-print"></i> Cetak Laporan</button>
                            </div>
                        </div>
                    </div>
                    <?php
                    echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- main content area end --