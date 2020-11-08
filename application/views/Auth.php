<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title><?= $title ?></title>
		<link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
		<link href="<?= base_url() ?>assets/css/themes/lite-purple.min.css" rel="stylesheet">
		<link href="<?= base_url() ?>assets/css/plugins/toastr.min.css" rel="stylesheet">
		<link rel="manifest" href="<?= base_url('manifest.webmanifest') ?>">
	</head>
	<body>
		<div class="auth-layout-wrap" style="background-image: url(<?= base_url() ?>assets/images/photo-wide-5.jpg)">
			<div class="auth-content">
				<div class="card o-hidden">
					<div class="row">
						<div class="col-md-6">
							<div class="p-4">

								<h1 class="mb-3 text-18">Sign In</h1>
								<p style="color:red"><?php echo $info ?></p>
								<p style="color:red"><?php if(isset($_GET['info']))echo $_GET['info'] ?></p>
								<form method="POST" action="<?=base_url()?>Login/login">
									<div class="form-group">
										<label for="email">Username</label>
										<input name="user_name" class="form-control form-control-rounded" id="username" type="text">
									</div>
									<div class="form-group">
										<label for="password">Password</label>
										<input name="user_password" class="form-control form-control-rounded" id="password" type="password">
									</div>
									<!-- <a class="text-success mr-2" href="#" data-toggle="modal" data-target="#editplg">
															Lupa Password?
														</a> -->
									<button type="submit" class="btn btn-rounded btn-primary btn-block mt-2">Sign In</button>
									<br><center>
									<button type="button" id="tes">add to home screen</button>
								</center>
								</form>
							</div>
						</div>
						<div class="col-md-6 text-center">
							<div class="pr-3 auth-right">
								<div class="auth-logo text-center mb-4"><img src="<?= base_url() ?>assets/images/telkom.png" alt=""></div>
								<center><h4><b>Sistem Informasi Peminjaman Mobil</b></h4><h5>Direktorat Logistik dan Aset Universitas Telkom</h5></center><br>
							</div>
						</div>
					</div>
			</div>
		</div>
		</div>



		 	<!-- <script src="<?= base_url() ?>assets/js/plugins/jquery-3.3.1.min.js"></script>
		 	<script src="<?= base_url() ?>assets/js/plugins/toastr.min.js"></script> -->

		<script type="text/javascript">
				document.addEventListener("DOMContentLoaded", function(event) {
				// Register service worker to control making site work offline

				// toastr.success('Are you the 6 fingered man?');

				if('serviceWorker' in navigator) {
				  navigator.serviceWorker
				           .register('sw.js')
				           .then(function() { console.log('Service Worker Registered'); });
				}

				let deferredPrompt;
				const addBtn = document.querySelector('#tes');
				addBtn.style.display = 'none';

				window.addEventListener('beforeinstallprompt', (e) => {
						// Prevent Chrome 67 and earlier from automatically showing the prompt
						e.preventDefault();
						// Stash the event so it can be triggered later.
						deferredPrompt = e;
						// Update UI to notify the user they can add to home screen
						addBtn.style.display = 'block';

						addBtn.addEventListener('click', (e) => {
							// hide our user interface that shows our A2HS button
							addBtn.style.display = 'none';
							// Show the prompt
							deferredPrompt.prompt();
							// Wait for the user to respond to the prompt
							deferredPrompt.userChoice.then((choiceResult) => {
									if (choiceResult.outcome === 'accepted') {
										console.log('User accepted the A2HS prompt');
									} else {
										console.log('User dismissed the A2HS prompt');
									}
									deferredPrompt = null;
								});
						});
					});
			});
		</script>
	</body>

</html>


		<div class="modal fade" id="editplg" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="ExampleModalLabel">
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
