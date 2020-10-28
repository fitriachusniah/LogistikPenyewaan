<?php $this->load->view('konsumen/_partials/header'); ?>

<!-- ============ Body content start ============= -->
<div class="main-content-wrap d-flex flex-column">
	<div class="main-content">
		<div class="breadcrumb">
			<h1 class="mr-2">History</h1>
			<ul>
				<li>History</li>
				<li>Pengajuan Peminjaman Mobil</li>
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
										<th>Due</th>
										<th>Tgl Keberangkatan</th>
										<th>Tujuan</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($list_sewa as $value) { ?>

										<tr>
											<td style="text-align: center;"><?= $no++ ?></td>
											<td>
												<?php 
													if($value->daysRemaining<0){
														echo "passed";
													}else{
														echo $value->daysRemaining." days";
													}
												?>
											</td>
											<td><?php $time = strtotime($value->tgl_pergi);				echo date('d F Y - H:i', $time); ?></td>
											<td><?= $value->tujuan ?></td>
											<td><b>
												 <?php
				                                        if($value->status_order==0){
				                                      ?>
				                                          <span class="badge badge-warning">Menunggu Konfirmasi Admin</span>
				                                       <?php
				                                        }else if($value->status_order==1){
				                                      ?>
				                                          <span class="badge badge-warning">Menunggu Konfirmasi Driver</span>
				                                      <?php
				                                        }else if($value->status_order==2){
				                                       ?>
				                                          <span class="badge badge-success">Menunggu Perjalanan</span>                                    
				                                      <?php
				                                        }else if($value->status_order==3 || $value->status_order==4 || $value->status_order==6){
				                                      ?>
				                                          <span class="badge badge-success">Selesai</span>
				                                      <?php
				                                        }else{
				                                      ?>
				                                      	  <span class="badge badge-danger">Ditolak</span>
				                                      <?php
				                                        }
				                                      ?>  
												</b>
											</td>
											<td class="text-center">												
												<a class="text-success mr-2" href="#" data-toggle="modal" data-target="#detail<?= $value->id_order ?>">
													<i class="nav-icon i-Eye font-weight-bold">Detail</i>
												</a>
												<?php
				                                      if($value->status_order==2 OR $value->status_order==6){
				                                       ?>
				                                          <a class="text-warning mr-2" href="#" data-toggle="modal" data-target="#rate<?= $value->id_order ?>">
															<i class="nav-icon i-Yes font-weight-bold">Perjalanan Selesai</i>
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

<?php foreach ($list_sewa as $key) { ?>
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
					<?php
				        if($key->status_order==0){
				?>
				            <span class="badge badge-warning">Perlu Konfirmasi</span>
				<?php
				        }else if($key->status_order==1){
				?>
				            <span class="badge badge-warning">Diterima,Menunggu Konfirmasi Driver</span>
				<?php
				        }else if($key->status_order==2){
				?>
				        	<span class="badge badge-success">Menunggu Perjalanan</span>
				<?php
				        }else if($value->status_order==3 || $value->status_order==4 || $value->status_order==6){
				?>
				             <span class="badge badge-success">Selesai</span>
				<?php
				        }else{
				?>
				         	 <span class="badge badge-danger">Ditolak</span>
				<?php
				        }
				 ?>  
					
				<table>
						<tr>
							<td colspan="3">
								<center>
								<?php 
		                          if (!$key->foto_driver) { ?>
		                           
		                         <?php } else { ?>
		                          <img src="<?= base_url()?>assets/foto_driver/<?=$key->foto_driver ?>"  width='100px'>
		                        <?php } ?>
		                        </center>
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

<?php foreach ($list_sewa as $key) { ?>
	<div class="modal fade" id="rate<?= $key->id_order ?>" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="ExampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="ExampleModalLabel">Penilaian dan Komentar Untuk Driver</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= $finish_action ?>/<?= $key->id_order ?>" method="post">
					<div class="modal-body">
						<center><img src="<?=base_url()?>assets/images/star.png" alt="" width="100px" />
						<div class="col-md-12">
							<div class="form-group">
								 <label for="">Berikan Penilaian*</label><br>
								  <input type="radio" id="one" name="rating" value="1" required>
								  <label for="one"><img src="<?=base_url()?>assets/images/1_star.png" alt="" width="30px" /></label>
								  <input type="radio" id="two" name="rating" value="2">
								  <label for="two"><img src="<?=base_url()?>assets/images/2_star.png" alt="" width="30px" /></label>
								  <input type="radio" id="three" name="rating" value="3">
								  <label for="three"><img src="<?=base_url()?>assets/images/3_star.png" alt="" width="30px" /></label>
								   <input type="radio" id="four" name="rating" value="4">
								  <label for="four"><img src="<?=base_url()?>assets/images/4_star.png" alt="" width="30px" /></label>
								  <input type="radio" id="five" name="rating" value="5">
								  <label for="five"><img src="<?=base_url()?>assets/images/5_star.png" alt="" width="30px" /></label>
							</div>
						</div>
						</center>
						<div class="col-md-12">
                                <div class="form-group">
                                        <label for="">Berikan Komentar*</label>
                                                            <textarea required="" name="komentar" class="form-control form-control-rounded" required=""></textarea>
                                </div>
                        </div>
	                      <input type="hidden" name="status_order" value="<?= $key->status_order ?>">                          
					</div>
					<div class="modal-footer justify-content-between">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">
							Close
						</button>
						<button type="submit" class="btn btn-primary ml-2">Save changes</button>
					</div>
				</form>
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
