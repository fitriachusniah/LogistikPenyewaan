<?php $this->load->view('driver/_partials/header'); ?>

<!-- ============ Body content start ============= -->
<div class="main-content-wrap d-flex flex-column">
	<div class="main-content">
		<div class="breadcrumb">
			<h1 class="mr-2">Update Profile</h1>
			<ul>
				<li>Driver</li>
				<li>Peminjaman Mobil</li>
			</ul>
		</div>
		<div class="separator-breadcrumb border-top"></div>
		<div class="row mb-4">
			<div class="col-md-12">
				<a class="btn btn-primary btn-rounded" href="<?= base_url()?>driver/Dashboard/?>">
                <i class="i-Arrow-Left"></i>
                Back
              </a>
			</div>
		</div>
		

		<div class="row">
			<div class="col-md-12 mb-4">
				<div class="card text-left">
					<div class="card-body">
						<form action="<?= $edit_action ?>/<?php echo $this->session->userdata('id') ?>" method="post" enctype="multipart/form-data">
							<div class="modal-body">

		                         <div class="col-md-6">
		                                <div class="form-group">
		                                    <center>
		                                        <?php 
		                                          if ($foto_driver==Null) { ?>
		                                           <img src="<?= base_url()?>assets/foto_driver/driver_default.png" width='100px'>

		                                         <?php } else { ?>
		                                          <img src="<?= base_url()?>assets/foto_driver/<?php echo $foto_driver ?>"  width='100px'>

		                                        <?php } ?>
		                                    </center>
		                                </div>
		                            </div>
		                             <div class="col-md-6">
		                                <div class="form-group">
		                                    <label for="foto_driver">Foto Driver</label>
		                                    <input type="file" name="foto_driver" class="form-control">
		                                </div>
		                            </div>

		                        <div class="row">

		                           
		                            <div class="col-md-6">
		                                <div class="form-group">
		                                    <label for="">Nama</label>
		                                    <input name="nama_driver" type="text" class="form-control form-control-rounded" value="<?php echo $nama_driver ?>" readonly />
		                                </div>
		                            </div>
		                            <div class="col-md-6">
		                                <div class="form-group">
		                                    <label for="">No.HP</label>
		                                    <input name="no_hp" type="text" class="form-control form-control-rounded" value="<?php echo $no_hp ?>" required />
		                                </div>
		                            </div>
		                            <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
		                            <div class="col-md-6">
				                      <div class="form-group">
				                        <label for="">Username</label>
				                        <input
				                          name="user_name"
				                          type="text"
				                          class="form-control form-control-rounded"
				                          value="<?php echo $user_name ?>"
				                          required
				                        />
				                      </div>
				                    </div>
				                    <div class="col-md-6">
				                      <div class="form-group">
				                        <label for="">Ubah Password</label>
				                        <input
				                          name="user_password"
				                          type="password"
				                          class="form-control form-control-rounded"
				                          placeholder="Masukkan Password Baru"
				                          required
				                        />
				                      </div>
				                    </div>
		                            
		                        </div>
		                        

		                    </div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-primary ml-2">Save changes</button>
							</div>
						</form>
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


<?php $this->load->view('driver/_partials/js'); ?>
