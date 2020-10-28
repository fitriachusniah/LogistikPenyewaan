<!DOCTYPE html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?= $title ?></title>
	<link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
	<link href="<?= base_url() ?>assets/css/themes/lite-purple.min.css" rel="stylesheet">
</head>
<div class="auth-layout-wrap" style="background-image: url(<?= base_url() ?>assets/images/photo-wide-5.jpg)">
	<div class="auth-content">
		<div class="card o-hidden">
			<div class="row">
				<div class="col-md-6">
					<div class="p-4">
						
						<h1 class="mb-3 text-18">Sign In</h1>
						<p style="color:red"><?php echo $info ?></p>
						<form method="POST" action="<?=base_url()?>Login/login">
							<div class="form-group">
								<label for="email">Username</label>
								<input name="user_name" class="form-control form-control-rounded" id="username" type="text">
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input name="user_password" class="form-control form-control-rounded" id="password" type="password">
							</div>
							<button type="submit" class="btn btn-rounded btn-primary btn-block mt-2">Sign In</button>
						</form>
					</div>
				</div>
				<div class="col-md-6 text-center" style="background-size: cover;background-image: url(<?= base_url() ?>assets/images/photo-wide-6.jpg)">
					<div class="pr-3 auth-right">
						<div class="auth-logo text-center mb-4"><img src="<?= base_url() ?>assets/images/telkom.png" alt=""></div>
						<center><h4><b>Sistem Informasi Penyewaan Mobil</b></h4><h5>Direktorat Logistik dan Aset Universitas Telkom</h5></center><br>
					</div>
				</div>
	</div>
</div>
