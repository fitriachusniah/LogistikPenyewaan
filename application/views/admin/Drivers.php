<?php $this->load->view('admin/_partials/header'); ?>

<!-- ============ Body content start ============= -->
<div class="main-content-wrap d-flex flex-column">
	<div class="main-content">
		<div class="breadcrumb">
			<h1 class="mr-2">Drivers</h1>
			<ul>
				<li>Master Data</li>
				<li>Drivers</li>
			</ul>
		</div>
		<div class="separator-breadcrumb border-top"></div>
		<div class="row mb-4">
			<div class="col-md-12">
				<button class="btn btn-primary btn-rounded" type="button" data-toggle="modal" data-target="#addCustomer">
					<i class="i-Add"></i>
					Add New Driver
				</button>
				<!-- <a class="btn btn-primary btn-rounded" href="">
                <i class="i-Add"></i>
                Add New Customer
              </a> -->
			</div>
		</div>

		<div class="row">
			<div class="col-md-12 mb-4">
				<div class="card text-left">
					<div class="card-body">
						<div class="table-responsive">

							<table class="display table table-striped table-bordered" id="responsive_table_mine" style="width: 100%">
								<thead>
									<tr>
										<th class="text-center" style="width: 5%">#</th>
										<th>Nama Driver</th>
										<th>No. HP</th>
										<th>Rating(1-5)</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($drivers as $value) { ?>

										<tr>
											<td style="text-align: center;"><?= $no++ ?></td>
											<td><?= $value->nama_driver ?></td>
											<td><?= $value->no_hp ?></td>
											<td><?= number_format($value->avg_rating,2) ?></td>
											<td class="text-center">
												<a class="text-success mr-2" href="#" data-toggle="modal" data-target="#detail<?= $value->id_driver ?>">
													<i class="nav-icon i-Eye font-weight-bold"></i>
												</a>
												<a class="text-success mr-2" href="#" data-toggle="modal" data-target="#edit<?= $value->id_driver ?>">
													<i class="nav-icon i-Pen-2 font-weight-bold"></i>
												</a>
												<a class="text-danger mr-2" href="#" data-toggle="modal" href="#" data-target="#hapus<?= $value->id_driver ?>">
													<i class="nav-icon i-Close-Window font-weight-bold"></i>
												</a>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end of main-content -->
	</div>

	<!-- Footer Start -->
	<div class="flex-grow-1"></div>
	<div class="app-footer">
		<div class="footer-bottom pt-3 d-flex flex-column flex-sm-row align-items-center">
			<span class="flex-grow-1"></span>
			<div class="d-flex align-items-center">
				<img class="logo" src="<?= base_url() ?>assets/images/logo-default.svg" alt="" />
				<div>
					<p class="m-0">&copy; 2020</p>
					<p class="m-0">All rights reserved</p>
				</div>
			</div>
		</div>
	</div>
	<!-- fotter end -->
</div>

<!-- --------------------------------------- -->
<!--  Large Modal  for add new customer-->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" id="addCustomer">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle">
					Add New Production
				</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form name="vform" action="<?=$add_action?>" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
								<div class="form-group">
									<label for="">Nama*</label>
									<input name="nama_driver" type="text" class="form-control form-control-rounded" placeholder="Masukkan Nama Driver"  required />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="">No.HP*</label>
									<input name="no_hp" type="text" class="form-control form-control-rounded" placeholder="Masukkan No.HP Driver" required />
								</div>
							</div>
							<div class="col-md-6">
		                      <div class="form-group">
		                        <label for="">Username*</label>
		                        <input
		                          name="user_name"
		                          type="text"
		                          class="form-control form-control-rounded"
		                          placeholder="Set Username Akun Driver"
		                          required
		                        />
		                      </div>
		                    </div>
		                    <div class="col-md-6">
		                      <div class="form-group">
		                        <label for="">Password*</label>
		                        <input
		                          name="user_password"
		                          type="password"
		                          class="form-control form-control-rounded"
		                          placeholder="Set Password Akun Driver"
		                          required
		                        />
		                      </div>
		                    </div>
							<div class="col-md-6">
								<div class="form-group">
			                        <label for="foto_driver">Foto Driver(otional)</label>
			                        <input type="file" name="foto_driver" class="form-control form-control-rounded">
			                    </div>
							</div>						
						
					</div>
					<b>bertanda (*) harus diisi</b>

				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">
						Close
					</button>
					<button type="submit" id="submit" class="btn btn-primary ml-2" onclick="return Validasi();">Save</button>
				</div>
			</form>
			<script>
				// Example starter JavaScript for disabling form submissions if there are invalid fields
				(function() {
					'use strict';
					window.addEventListener('load', function() {
						// Fetch all the forms we want to apply custom Bootstrap validation styles to
						var forms = document.getElementsByClassName('needs-validation');
						// Loop over them and prevent submission
						var validation = Array.prototype.filter.call(forms, function(form) {
							form.addEventListener('submit', function(event) {
								if (form.checkValidity() === false) {
									event.preventDefault();
									event.stopPropagation();
								}
								form.classList.add('was-validated');
							}, false);
						});
					}, false);
				})();
			</script>

		</div>
	</div>
</div>

<!-- --------------------------------------- -->
<!--  END Large Modal  for add new customer-->

<?php foreach ($drivers as $key) { ?>
	<div class="modal fade" id="hapus<?= $key->id_driver ?>" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="ExampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="ExampleModalLabel">Delete Data Confirmation</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Are you sure to delete this data ?</p>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">No</button>
					<a href="<?= site_url() ?>admin/Drivers/hapus/<?= $key->id_driver ?>" class="btn btn-danger">Yes</a>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
<?php } ?>

<?php foreach ($drivers as $key) { ?>
	<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" id="edit<?= $key->id_driver ?>">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalCenterTitle">
						Edit Driver <b><?php echo $key->nama_driver ?></b>
					</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<form action="<?= $edit_action ?>/<?= $key->id_driver ?>" method="post">
					<div class="modal-body">

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Nama*</label>
									<input name="nama_driver" type="text" class="form-control form-control-rounded" value="<?= $key->nama_driver ?>" required />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="">No.HP*</label>
									<input name="no_hp" type="text" class="form-control form-control-rounded" value="<?= $key->no_hp ?>" required />
								</div>
							</div>
							
						</div>
						<b>bertanda (*) harus diisi</b>

					</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">
							Close
						</button>
						<button type="submit" class="btn btn-primary ml-2">Save changes</button>
					</div>
				</form>
			</div>

		</div>
	</div>
<?php } ?>

<?php foreach ($drivers as $key) { ?>
	<div class="modal fade" id="detail<?= $key->id_driver ?>" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="ExampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="ExampleModalLabel">Driver's Detail</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					
					<table>
						<tr>
							<td colspan="3">
								<center>
								<?php 
		                          if (!$key->foto_driver) { ?>
		                           <img src="<?= base_url()?>assets/foto_driver/driver_default.png" width='100px'>
		                           *driver belum set foto
		                         <?php } else { ?>
		                          <img src="<?= base_url()?>assets/foto_driver/<?=$key->foto_driver ?>"  width='100px'>
		                        <?php } ?>
		                        </center>
							</td>
						</tr>
						<tr>
							<td>Nama Driver</td>
							<td>:</td>
							<td><?= $key->nama_driver ?></td>
						</tr>
						<tr>
							<td>No.HP</td>
							<td>:</td>
							<td><b><?= $key->no_hp ?></b></td>
						</tr>
						<tr>
							<td>Username</td>
							<td>:</td>
							<td><?= $key->user_name ?></td>
						</tr>
						
					</table>
				
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
<?php } ?>

<!-- ============ Search UI Start ============= -->
<div class="search-ui">
	<div class="search-header">
		<img src="<?= base_url() ?>assets/images/logo.png" alt="" class="logo" />
		<button class="search-close btn btn-icon bg-transparent float-right mt-2">
			<i class="i-Close-Window text-22 text-muted"></i>
		</button>
	</div>
	<input type="text" placeholder="Type here" class="search-input" autofocus />
	<div class="search-title">
		<span class="text-muted">Search results</span>
	</div>
	
	<!-- PAGINATION CONTROL -->
	<div class="col-md-12 mt-5 text-center">
		<nav aria-label="Page navigation example">
			<ul class="pagination d-inline-flex">
				<li class="page-item">
					<a class="page-link" href="#" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
						<span class="sr-only">Previous</span>
					</a>
				</li>
				<li class="page-item"><a class="page-link" href="#">1</a></li>
				<li class="page-item"><a class="page-link" href="#">2</a></li>
				<li class="page-item"><a class="page-link" href="#">3</a></li>
				<li class="page-item">
					<a class="page-link" href="#" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
						<span class="sr-only">Next</span>
					</a>
				</li>
			</ul>
		</nav>
	</div>
</div>
<!-- ============ Search UI End ============= -->

<?php $this->load->view('admin/_partials/js'); ?>
