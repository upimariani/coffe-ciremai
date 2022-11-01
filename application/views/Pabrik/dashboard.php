<div class="page-title-area">
	<div class="row align-items-center">
		<div class="col-sm-6 mb-5 mt-5">
			<div class="breadcrumbs-area clearfix">
				<h4 class="page-title pull-left">DASHBOARD</h4>

			</div>
		</div>

	</div>

</div>
<!-- page title area end -->
<div class="main-content-inner">
	<!-- sales report area start -->
	<div class="sales-report-area sales-style-two">
		<div class="row">
			<div class="col-lg-12">
				<div class="card mt-5">

					<div class="card-body">
						<h4 class="header-title">Informasi Penawaran Supplier</h4>
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>No.</th>
										<th>Nama Bahan Baku</th>
										<th>Tanggal Penawaran</th>
										<th>Harga</th>
										<th>Quantity Penawaran</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($penawaran_supplier as $key => $value) {
									?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $value->nm_bahanbaku ?></td>
											<td><?= $value->tgl_penawaran ?></td>
											<td>Rp.<?= number_format($value->harga_bb)  ?></td>
											<td>
												<?= $value->jml_tawaran ?>

											</td>
											<form action="<?= base_url('Pabrik/cPemesanan/cart/' . $value->id_user) ?>" method="POST">
												<input type="hidden" name="price" value="<?= $value->harga_bb ?>">
												<input type="hidden" name="stok" value="<?= $value->stok_bb ?>">
												<input type="hidden" name="name" value="<?= $value->nm_bahanbaku ?>">
												<input type="hidden" name="id" value="<?= $value->id_bahanbaku ?>">
												<input type="hidden" name="qty" value="<?= $value->jml_tawaran ?>">
												<td><button class="btn btn-success" type="submit">Konfirmasi</button></td>

											</form>
										</tr>
									<?php
									}
									?>

								</tbody>
							</table>
						</div>
						<div class="pagination_area pull-right mt-5">
							<ul>
								<li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
								<li><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="alert alert-success" role="alert">
					<strong>Sukses!</strong> Selamat Datang Pabrik Coffe Ciremai!
				</div>
			</div>
			<!-- visitor graph area end -->
			<!-- order list area start -->
			<div class="col-lg-6">
				<?php
				foreach ($bahan_baku as $key => $value) {
					if ($value->stok <= 20) {
				?>
						<div class="alert alert-danger" role="alert">
							<strong><?= $value->nm_bahanbaku ?> Stok <?= $value->stok ?>!</strong> Segera Melakukan Pemesanan
						</div>
				<?php
					}
				}
				?>

				<div class="card mt-5">

					<div class="card-body">
						<h4 class="header-title">Informasi Stok Bahan Baku Pabrik</h4>
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>No.</th>
										<th>Nama Bahan Baku</th>
										<th>Deskripsi</th>
										<th>Harga</th>
										<th>Stok</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($bahan_baku as $key => $value) {
									?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $value->nm_bahanbaku ?></td>
											<td><?= $value->deskripsi_bb ?></td>
											<td>Rp.<?= number_format($value->harga_bb)  ?></td>
											<td>
												<?php
												if ($value->stok <= '20') {

												?>
													<span class="text-danger"><?= $value->stok ?><i class="ti-arrow-down"></i></span>
												<?php
												} else {
												?>
													<span class="text-success"><?= $value->stok ?><i class="ti-arrow-up"></i></span>
												<?php
												}
												?>

											</td>
										</tr>
									<?php
									}
									?>

								</tbody>
							</table>
						</div>
						<div class="pagination_area pull-right mt-5">
							<ul>
								<li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
								<li><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-6">
				<?php
				foreach ($bahan_jadi as $key => $value) {
					if ($value->stok <= 20) {
				?>
						<div class="alert alert-danger" role="alert">
							<strong><?= $value->nm_produk ?> Stok <?= $value->stok ?>!</strong> Segera Melakukan Pemesanan
						</div>
				<?php
					}
				}
				?>
				<div class="card mt-5">
					<div class="card-body">
						<h4 class="header-title">Informasi Stok Bahan Jadi Pabrik</h4>
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>No.</th>
										<th>Nama Bahan Jadi</th>
										<th>Deskripsi</th>
										<th>Harga</th>
										<th>Stok</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($bahan_jadi as $key => $value) {
									?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $value->nm_produk ?></td>
											<td><?= $value->deskripsi ?></td>
											<td>Rp.<?= number_format($value->harga)  ?></td>
											<td>
												<?php
												if ($value->stok <= '20') {
												?>
													<span class="text-danger"><?= $value->stok ?><i class="ti-arrow-down"></i></span>
												<?php
												} else {
												?>
													<span class="text-success"><?= $value->stok ?><i class="ti-arrow-up"></i></span>
												<?php
												}
												?>

											</td>
										</tr>
									<?php
									}
									?>

								</tbody>
							</table>
						</div>
						<div class="pagination_area pull-right mt-5">
							<ul>
								<li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
								<li><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>


		</div>
	</div>
	<!-- main content area end -->
	<footer>

	</footer>
	<!-- footer area end-->
</div>
<!-- page container area end -->
<!-- offset area start -->

<!-- offset area end -->
<!-- jquery latest version -->
<script src="<?= base_url('asset/srtdash/srtdash/') ?>assets/js/vendor/jquery-2.2.4.min.js"></script>
<!-- bootstrap 4 js -->
<script src="<?= base_url('asset/srtdash/srtdash/') ?>assets/js/popper.min.js"></script>
<script src="<?= base_url('asset/srtdash/srtdash/') ?>assets/js/bootstrap.min.js"></script>
<script src="<?= base_url('asset/srtdash/srtdash/') ?>assets/js/owl.carousel.min.js"></script>
<script src="<?= base_url('asset/srtdash/srtdash/') ?>assets/js/metisMenu.min.js"></script>
<script src="<?= base_url('asset/srtdash/srtdash/') ?>assets/js/jquery.slimscroll.min.js"></script>
<script src="<?= base_url('asset/srtdash/srtdash/') ?>assets/js/jquery.slicknav.min.js"></script>


<!-- Start datatable js -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
<!-- others plugins -->
<script src="<?= base_url('asset/srtdash/srtdash/') ?>assets/js/plugins.js"></script>
<script src="<?= base_url('asset/srtdash/srtdash/') ?>assets/js/scripts.js"></script>

</body>

</html>
