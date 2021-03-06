<!DOCTYPE html>
<html lang="en" dir="">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Oto Online</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet" />
    <link href="<?=base_url()?>assets/css/themes/lite-purple.min.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/css/plugins/perfect-scrollbar.min.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/css/plugins/datatables.min.css" rel="stylesheet"  />
    <link rel="manifest" href="<?= base_url('manifest.webmanifest') ?>">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body class="text-left">
<?php echo $this->session->flashdata('notifikasi'); ?>
<?php
	$this->load->view('driver/_partials/layout');
	$this->load->view('driver/_partials/navbar');
?>
