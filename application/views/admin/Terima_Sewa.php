<?php $this->load->view('admin/_partials/header'); ?>

<!-- ============ Body content start ============= -->
<div class="main-content-wrap d-flex flex-column">
	<div class="main-content">
		<div class="breadcrumb">
			<h1 class="mr-2">Request Entry</h1>
			<ul>
				<li>Permintaan</li>
				<li>Peminjaman Mobil</li>
			</ul>
		</div>
		<div class="separator-breadcrumb border-top"></div>
		<div class="row mb-4">
			<div class="col-md-12">
				<a class="btn btn-primary btn-rounded" href="<?= base_url()?>admin/Sewa/?>">
                <i class="i-Arrow-Left"></i>
                Back
              </a>
			</div>
		</div>


		<div class="row">
			<div class="col-md-12 mb-4">
				<div class="card text-left">
					<div class="card-body">
						<form action="<?= $terima_action ?>/<?= $id ?>" method="post">
							<div class="modal-body">

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="">Mobil*</label>
											<select class="form-control form-control-rounded" name="id_mobil" id="id_mobil" required>
												<option value="" selected disabled>-Pilih Mobil-</option>
												<?php foreach ($list_mobil as $value) { ?>
													<option value="<?= $value->id_mobil ?>"> <?= $value->nopol ?> - <?= $value->merk_mobil ?> - <?= $value->kapasitas ?> org
													</option>
												<?php  } ?>
											</select>

										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="">Driver*</label>
											<select class="form-control form-control-rounded" name="id_driver" id="id_driver" required>
												<option value="" selected disabled>-Pilih Driver-</option>
												<?php foreach ($list_driver as $value2) { ?>
													<option value="<?= $value2->id_driver ?>"> <?= $value2->nama_driver ?>
													</option>
												<?php  } ?>
											</select>
											<!-- <ul id="catsSelect" class="catsSelect"></ul> -->

										</div>
									</div>

									<div class="col-md-6">
									<div class="form-group">
										<label for="">Cost (Rp)*</label>
										<input name="cost" type="text" id="nominal1" class="form-control form-control-rounded" placeholder="Enter Cost Perjalanan" min="1" required />
										<div class="invalid-feedback">
											Cost is Required
										</div>
									</div>
								</div>
								</div>
								<b>*harus diisi</b>

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
<script>
	var rupiah1 = document.getElementById("nominal1");
	rupiah1.addEventListener("keyup", function(e) {
		rupiah1.value = convertRupiah(this.value, "Rp ");
	});
	rupiah1.addEventListener('keydown', function(event) {
		return isNumberKey(event);
	});

	var rupiah2 = document.getElementById("nominal2");
	rupiah2.addEventListener("keyup", function(e) {
		rupiah2.value = convertRupiah(this.value);
	});
	rupiah2.addEventListener('keydown', function(event) {
		return isNumberKey(event);
	});

	function convertRupiah(angka, prefix) {
		var number_string = angka.replace(/[^,\d]/g, "").toString(),
			split = number_string.split(","),
			sisa = split[0].length % 3,
			rupiah = split[0].substr(0, sisa),
			ribuan = split[0].substr(sisa).match(/\d{3}/gi);

		if (ribuan) {
			separator = sisa ? "." : "";
			rupiah += separator + ribuan.join(".");
		}

		rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
		return prefix == undefined ? rupiah : rupiah ? prefix + rupiah : "";
	}

	function isNumberKey(evt) {
		key = evt.which || evt.keyCode;
		if (key != 188 // Comma
			&&
			key != 8 // Backspace
			&&
			key != 17 && key != 86 & key != 67 // Ctrl c, ctrl v
			&&
			(key < 48 || key > 57) // Non digit
		) {
			evt.preventDefault();
			return;
		}
	}
</script>

<?php $this->load->view('admin/_partials/js'); ?>
