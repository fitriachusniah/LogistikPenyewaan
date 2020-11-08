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
				<button class="btn btn-primary btn-rounded" type="button" data-toggle="modal" data-target="#addSewa">
					<i class="i-Add"></i>
					Input Peminjaman Mobil
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
										<th style="width: 10%">Status</th>
										<th>Due</th>
										<th style="width: 17%">Tgl Pergi</th>
										<th style="width: 17%">Tgl Pulang</th>
										<th style="width: 20%">Fakultas</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($list_sewa_masuk as $value) { ?>

										<tr>
											<td style="text-align: center;"><?= $no++ ?></td>
											<td><b>
													  <?php
				                                        if($value->stat_adm==0 && $value->status==0){
				                                      ?>
				                                          <span class="badge" style="color: #fff; background-color: 	#FF8C00;">Perlu Konfirmasi</span>
				                                      <?php
				                                        }else if($value->stat_adm==0 && $value->status==2){
				                                       ?>
				                                          <span class="badge btn-danger">Expired, Terlambat Dikonfirmasi.<br>Silahkan Input Peminjaman Baru.</span>
				                                      <?php
				                                        }
				                                      ?>
				                                       
												</b>
											</td>
											<td>
												<?php 
													if($value->daysRemaining<0){
														echo "passed";
													}else if($value->daysRemaining==0){
														echo "hari ini";
													}
													else{
														echo $value->daysRemaining." hari lagi";
													}
												?>
											</td>
											<td><?php $time = strtotime($value->tgl_pergi);				echo date('d F Y - H:i', $time); ?>
												<a class="text-success mr-2" href="#" data-toggle="modal" data-target="#editprg<?= $value->id_order ?>">
															<i class="nav-icon i-Pen-2 font-weight-bold">Edit</i>
														</a>
											</td>
											<td><?php $time = strtotime($value->tgl_pulang);				echo date('d F Y - H:i', $time); ?>
												<a class="text-success mr-2" href="#" data-toggle="modal" data-target="#editplg<?= $value->id_order ?>">
															<i class="nav-icon i-Pen-2 font-weight-bold">Edit</i>
														</a>
											</td>
											<td><?= $value->nama_fakultas ?></td>
											<td class="text-center">
												<a class="text-success mr-2" href="#" data-toggle="modal" data-target="#detail<?= $value->id_order ?>">
															<i class="nav-icon i-Eye font-weight-bold">Detail</i>
												</a>

												<?php
				                                        if($value->stat_adm==0 && $value->status==0){
				                                      ?>
				                                           <a class="text-success" href="<?= base_url()?>admin/Sewa/terima_sewa/<?= $value->id_order ?>">
								                            
								                              <i class="nav-icon i-Yes font-weight-bold">Terima</i>
								                            
								                          </a>
														<a class="text-danger mr-2" href="#" data-toggle="modal" href="#" data-target="#tolak<?= $value->id_order ?>">
															<i class="nav-icon i-Close-Window font-weight-bold">Tolak</i>
														</a>
												
				                                      <?php
				                                        }else{
				                                       ?>
				                                       		<a class="text-danger mr-2" href="#" data-toggle="modal" href="#" data-target="#hapus<?= $value->id_order ?>">
																<i class="nav-icon i-Close-Window font-weight-bold">Hapus</i>
															</a>
				                                       <?php
				                                        }
				                                       ?>
				                                          
														
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

<?php foreach ($list_sewa_masuk as $key) { ?>
	<div class="modal fade" id="tolak<?= $key->id_order ?>" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="ExampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="ExampleModalLabel">Decline Request Confirmation</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Yakin untuk menolak permintaan ini ?</p>
				</div>
				<div class="modal-footer justify-content-between">
					<a href="<?= site_url() ?>admin/Sewa/tolak/<?= $key->id_order ?>" class="btn btn-danger">Tolak</a>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
<?php } ?>

<?php foreach ($list_sewa_masuk as $key) { ?>
	<div class="modal fade" id="detail<?= $key->id_order ?>" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="ExampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="ExampleModalLabel">Detail Permintaan Peminjaman</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				                     
				                                     
				                                      
				<?php
				       
				        if ($key->alasan==True) {
				        ?>
				        	<br>Perjalanan ini perlu konfirmasi ulang karena telah <b>DITOLAK</b> oleh <b><?= $key->nama_driver ?></b><br>
							Dengan <b>alasan</b> : <?= $key->alasan ?><br><br>
				        <?php
				        }
				?>

				 
				<table>
						<tr>
							<td>KAUR Fakultas</td>
							<td>:</td>
							<td><?= $key->nama_kaur.' - '.$key->jabatan ?></td>
						</tr>
						<tr>
							<td>Fakultas</td>
							<td>:</td>
							<td><?= $key->nama_fakultas ?></td>
						</tr>
						<tr>
							<td>Tgl Pergi</td>
							<td>:</td>
							<td><b><?php $time = strtotime($key->tgl_pergi);echo date('d F Y - H:i', $time); ?></b></td>
						</tr>
						<tr>
							<td>Tgl Pulang</td>
							<td>:</td>
							<td><b><?php $time = strtotime($key->tgl_pulang);echo date('d F Y - H:i', $time); ?></b></td>
						</tr>
						<tr>
							<td>Durasi</td>
							<td>:</td>
							<td><b>
								<?php 
									
									$hourdiff = round((strtotime($key->tgl_pulang) - strtotime($key->tgl_pergi))/3600, 1);
									echo $hourdiff." jam";
							 	?>
							 
							 </b>
							</td>
						</tr>
						<tr>
							<td>Tujuan</td>
							<td>:</td>
							<td><b><?= $key->tujuan ?></b></td>
						</tr>
						<tr>
							<td>Penumpang</td>
							<td>:</td>
							<td><b><?= $key->jml_penumpang ?> orang</b></td>
						</tr>
						<tr>
							<td>Keperluan</td>
							<td>:</td>
							<td><?= $key->keterangan ?></td>
						</tr>
						<tr>
							<td>Catatan Khusus</td>
							<td>:</td>
							<td>
								<?php 
									if($key->note != Null){
										echo $key->note;	
									}else{
										echo "-";
									}
								?>

							</td>
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

<?php foreach ($list_sewa_masuk as $key) { ?>
	<div class="modal fade" id="hapus<?= $key->id_order ?>" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="ExampleModalLabel">
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
					<a href="<?= site_url() ?>admin/Sewa/hapus/<?= $key->id_order ?>" class="btn btn-danger">Yes</a>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
<?php } ?>

<?php foreach ($list_sewa_masuk as $key) { ?>
	<div class="modal fade" id="editprg<?= $key->id_order ?>" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="ExampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="ExampleModalLabel">Edit Tanggal Berangkat</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= $edit_action ?>/<?= $key->id_order?>" method="post">
					<div class="modal-body">
						
						 <div class="col-md-12">
	                                                        <div class="form-group">
	                                                        	<h6><b>Berangkat</b> pada tanggal : <b><?php $time = strtotime($key->tgl_pergi);echo date('d F Y - H:i', $time); ?></b></h6>
	                                                            <label for="">Ubah Tanggal dan Jam Berangkat*</label>
	                                                             <?php $datetime = new DateTime('now');
	                                                                    $min_date = $datetime->format('Y-m-d');
	                                                                    $max_date = strtotime("+7 day", time());
	                                                              ?>
	                                                            <input name="tgl_pergi" type="datetime-local" class="form-control form-control-rounded" min="<?= $min_date ?>"  required/>
	                                                        </div>
	                                                    </div>
	                                                   <input type="hidden" name="tgl_pulang" value="<?= $key->tgl_pulang ?>">
					</div>
					<div class="modal-footer justify-content-between">
						<button type="submit" class="btn btn-primary ml-2">Simpan Perubahan</button>
					</div>
				</form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
<?php } ?>

<?php foreach ($list_sewa_masuk as $key) { ?>
	<div class="modal fade" id="editplg<?= $key->id_order ?>" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="ExampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="ExampleModalLabel">Edit Tanggal Pulang</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= $edit_action ?>/<?= $key->id_order?>" method="post">
					<div class="modal-body">
						
						 <div class="col-md-12">
	                                                        <div class="form-group">
	                                                        	<h6><b>Pulang</b> pada tanggal : <b><?php $time = strtotime($key->tgl_pulang);echo date('d F Y - H:i', $time); ?></b></h6>
	                                                            <label for="">Ubah Tanggal dan Jam Pulang*</label>
	                                                             <?php $datetime = new DateTime('now');
	                                                                    $min_date = $datetime->format('Y-m-d');
	                                                                    $max_date = strtotime("+7 day", time());
	                                                              ?>
	                                                            <input name="tgl_pulang" type="datetime-local" class="form-control form-control-rounded" min="<?= $min_date ?>"  required/>
	                                                        </div>
	                                                    </div>
	                                                   <input type="hidden" name="tgl_pergi" value="<?= $key->tgl_pergi ?>">
					</div>
					<div class="modal-footer justify-content-between">
						<button type="submit" class="btn btn-primary ml-2">Simpan Perubahan</button>
					</div>
				</form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
<?php } ?>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" id="addSewa">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">
                                            Form Peminjaman Mobil
                                        </h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <form name="vform" action="<?= $add_action ?>" method="post" class="needs-validation" novalidate>
                                        <div class="modal-body">
                                            <div class="row">
	                                            	<div class="col-md-12">
														<div class="form-group">
															<label for="">Fakultas*</label>
															<select class="form-control form-control-rounded" name="id_fakultas" id="id_fakultas" required>
																<option value="" selected disabled>-Pilih Fakultas-</option>
																<?php foreach ($list_fakultas as $value3) { ?>
																	<option value="<?= $value3->fakultas_id ?>"> <?= $value3->nama_fakultas ?>
																	</option>
																<?php  } ?>
															</select>
															
														</div>
													</div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Tanggal dan Jam Berangkat*</label>
                                                             <?php $datetime = new DateTime('now');
                                                                    $min_date = $datetime->format('Y-m-d');
                                                                    $max_date = strtotime("+7 day", time());
                                                              ?>
                                                            <input name="tgl_pergi" type="datetime-local" class="form-control form-control-rounded" min="<?= $min_date ?>"  required />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Tanggal dan Jam Pulang*</label>
                                                             <?php $datetime = new DateTime('now');
                                                                    $min_date = $datetime->format('Y-m-d');
                                                                    $max_date = strtotime("+7 day", time());
                                                              ?>
                                                            <input name="tgl_pulang" type="datetime-local" class="form-control form-control-rounded" min="<?= $min_date ?>"  required />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Lokasi Tujuan*</label>
                                                            <input name="tujuan" type="text" class="form-control form-control-rounded"  required />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Keperluan*</label>
                                                            <input name="keterangan" type="text" class="form-control form-control-rounded"  required />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Jumlah Penumpang*</label>
                                                            <input name="jml_penumpang" min="3" type="number" class="form-control form-control-rounded"  required />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Catatan Khusus(optional)</label>
                                                            <textarea name="note" class="form-control form-control-rounded"></textarea>
                                                        </div>
                                                    </div>
                                                                                                   
                                                
                                            </div>
                                            <b>isian bertanda (*) harus diisi</b>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" id="submit" class="btn btn-primary ml-2" onclick="return Validasi();">Tambah Peminjaman</button>
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
