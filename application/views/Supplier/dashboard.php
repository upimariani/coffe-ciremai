<div class="page-title-area">
	<div class="row align-items-center">
		<div class="col-sm-6 mb-5 mt-5">
			<div class="breadcrumbs-area clearfix">
				<h4 class="page-title pull-left">DASHBOARD</h4>

			</div>
		</div>

	</div>
	<?php
	if ($this->session->userdata('success')) {
	?>
		<div class="alert alert-success" role="alert">
			<strong>Sukses!</strong> <?= $this->session->userdata('success') ?>
		</div>
	<?php
	}
	?>

</div>
<!-- page title area end -->
<div class="main-content-inner">
	<!-- sales report area start -->
	<div class="sales-report-area sales-style-two">
		<div class="row">
			<div class="col-lg-12">
				<div class="card mt-5">
					<div class="card-body">
						<h4 class="header-title">Laporan Penawaran Bahan Baku</h4>
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>No.</th>
										<th>Tanggal Penawaran</th>
										<th>Bahan Baku</th>
										<th>Kalimat</th>
										<th>Quantity Penawaran</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($penawaran as $key => $value) {
									?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $value->tgl_penawaran ?></td>
											<td><?= $value->nm_bahanbaku ?></td>
											<td><?= $value->kalimat ?></td>
											<td><?= $value->jml_tawaran ?></td>
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
		<div class="row">
			<div class="col-lg-12">
				<?php
				foreach ($bahan_baku as $key => $value) {
					if ($value->stok_bb <= 20) {
				?>
						<div class="alert alert-danger" role="alert">
							<strong><?= $value->nm_bahanbaku ?> Stok <?= $value->stok_bb ?>!</strong> Segera Melakukan Pemesanan
						</div>
				<?php
					}
				}
				?>
				<div class="row">
					<div class="col-lg-6">
						<div class="card mt-5">
							<div class="card-body">
								<h4 class="header-title">Informasi Stok Bahan Baku Supplier</h4>
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
														if ($value->stok_bb <= '20') {
														?>
															<span class="text-danger"><?= $value->stok_bb ?><i class="ti-arrow-down"></i></span>
														<?php
														} else {
														?>
															<span class="text-success"><?= $value->stok_bb ?><i class="ti-arrow-up"></i></span>
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
						<div class="card mt-5">
							<div class="card-body">
								<h4 class="header-title">Informasi Stok Bahan Baku Pabrik</h4>
								<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th>No.</th>
												<th>Nama Bahan Baku</th>
												<th>Stok Pabrik</th>
												<th>Lakukan Penawaran Transaksi</th>

											</tr>
										</thead>
										<tbody>
											<?php
											$no = 1;
											foreach ($stok_pabrik as $key => $value) {

											?>
												<?php
												if ($value->jml <= '10') {
												?>
													<tr>
														<td><?= $no++ ?></td>
														<td><?= $value->nm_bahanbaku ?></td>
														<td><?= $value->jml ?></td>
														<td class="text-center"><button data-toggle="modal" data-target="#exampleModalLong<?= $value->id_bahanbaku ?>" class="btn btn-danger btn-sm">Kirim</button></td>
													</tr><?php
														} else {
															?> <tr>
														<td><?= $no++ ?></td>
														<td><?= $value->nm_bahanbaku ?></td>
														<td><?= $value->jml ?></td>
														<td class="text-center"><span class="badge badge-success">Stok Masih Aman!!!</span></td>
													</tr> <?php
														}
															?>
												<!-- Modal -->
												<form action="<?= base_url('Supplier/cDashboard/penawaran/' . $value->id_bahanbaku) ?>" method="POST">
													<div class="modal fade" id="exampleModalLong<?= $value->id_bahanbaku ?>">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title">Lakukan Penawaran Bahan Baku</h5>
																	<button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
																</div>
																<div class="modal-body">
																	<div class="form-group">
																		<label for="exampleInputEmail1">Kalimat Penawaran*</label>
																		<input type="text" name="kalimat" class="form-control" placeholder="Enter Kalimat" required>
																	</div>
																	<div class="form-group">
																		<label for="exampleInputEmail1">Quantity Penawaran*</label>
																		<input type="number" name="qty" class="form-control" placeholder="Enter Quantity" required>
																	</div>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																	<button type="submit" class="btn btn-primary">Kirim</button>
																</div>
															</div>
														</div>
													</div>
												</form>
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
			<!-- visitor graph area end -->
			<!-- order list area start -->


		</div>
	</div>
	<!-- main content area end -->
	<footer>

	</footer>
	<!-- footer area end-->
</div>

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
