<?php $this->load->view('admin/_partials/header'); ?>

<!-- ============ Body content start ============= -->
<div class="main-content-wrap d-flex flex-column">
	<div class="main-content">
		<div class="breadcrumb">
			<h1 class="mr-2">Completed Trip</h1>
			<ul>
				<li>Permintaan</li>
				<li>Peminjaman Mobil</li>
			</ul>
		</div>
		<div class="separator-breadcrumb border-top"></div>
		

		<div class="row">
			<div class="col-md-12 mb-4">
				<div class="card text-left">
					<div class="card-body">
						<div class="table-responsive">

							<table class="display table table-striped table-bordered" id="responsive_table_mine" style="width: 100%">
								<thead>
									<tr>
										<th class="text-center" style="width: 5%">#</th>
										<th style="width: 15%">Status</th>
										<th style="width: 15%">Tgl Keberangkatan</th>
										<th style="width: 20%">Fakultas</th>
										<th style="width: 10%">Jml Orang</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($list_sewa_masuk as $value) { ?>

										<tr>
											<td style="text-align: center;"><?= $no++ ?></td>
											<td>
												<span class="badge badge-success">Selesai</span>												
											</td>
											<td><?php $time = strtotime($value->tgl_pergi);				echo date('d F Y - H:i', $time); ?></td>
											<td><?= $value->nama_fakultas ?></td>
											<td><?= $value->jml_penumpang ?> org</td>
											<td class="text-center">												
												<a class="text-success mr-2" href="#" data-toggle="modal" data-target="#detail<?= $value->id_order ?>">
													<i class="nav-icon i-Eye font-weight-bold">Detail</i>
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


<?php foreach ($list_sewa_masuk as $key) { ?>
	<div class="modal fade" id="detail<?= $key->id_order ?>" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="ExampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="ExampleModalLabel">Detail Permintaan</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				
				<span class="badge badge-success">Selesai</span>
				        
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
							<td>Tgl Keberangkatan</td>
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
						<tr>
							<td>Mobil</td>
							<td>:</td>
							<td>
								<?php 
									if($key->id_mobil != Null){
										echo $key->merk_mobil;	
									}else{
										echo "-";
									}
								?>

							</td>
						</tr>
						<tr>
							<td>Total KM</td>
							<td>:</td>
							<td>
								<?php 
									if($key->total_km != Null){
										echo "<b>".$key->total_km." km</b>";	
									}else{
										echo "-";
									}
								?>


							</td>
						</tr>
						<tr>
							<td><b>Driver</b></td>
							<td>:</td>
							<td>
								<?php 
									if($key->id_driver != Null){
										echo "<b>".$key->nama_driver."</b>";	
									}else{
										echo "-";
									}
								?>

							</td>
						</tr>
						<tr>
							<td><b>No.HP Driver</b></td>
							<td>:</td>
							<td>
								<?php 
									if($key->id_driver != Null){
										echo "<b>".$key->no_hp."</b>";	
									}else{
										echo "-";
									}
								?>

							</td>
						</tr>
						<tr>
							<td>Cost Perjalanan</td>
							<td>:</td>
							<td>
								<?php 
									if($key->cost != Null){
										echo "Rp".number_format($key->cost,2);	
									}else{
										echo "-";
									}
								?>

							</td>
						</tr>
						<?php
                    				if($key->id_feedback==True){
                    			?>

                    					
                    						<tr>
												<td><b>Rating</b></td>
												<td>:</td>
												<td><?= number_format($key->rating,2) ?></td>
											</tr>
											<tr>
												<td><b>Komentar</b></td>
												<td>:</td>
												<td><?= $key->komentar ?></td>
											</tr>
                    					
                    			<?php
                    				}else{
                    			?>
                    					<tr>
												<td><b>Rating</b></td>
												<td>:</td>
												<td>-</td>
											</tr>
											<tr>
												<td><b>Komentar</b></td>
												<td>:</td>
												<td>-</td>
											</tr>
                    			<?php
                    				}
                    			?>
						
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
