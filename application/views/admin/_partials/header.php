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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>
    <link rel="manifest" href="<?= base_url('manifest.webmanifest') ?>">
    <style media="screen">
        .terima_sewa ul {
          appearance: button;
          -moz-appearance: button;
          -webkit-appearance: button;
          -webkit-padding-start: 0;
          -moz-padding-start: 0;
          width: 160px;
          height: 32px;
          left: 24px;
          position: relative;
        }

        .terima_sewa ul li:nth-child(1):after {
          position: absolute;
          content: "▼";
          right: 10px;
          top: 10px;
          font-size: 12px;
          opacity: .75;
        }

        #mapid{
          height: 200px;
          width: 100%
        }

        @media (min-width: 576px) {
          #mapid{
            height: 400px;
            width: 100%
          }
        }

        @media (min-width: 992px) {
          #mapid{
            height: 600px;
            width: 80%;
          }
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body class="text-left">
  <?php echo $this->session->flashdata('notifikasi'); ?>
<?php
	$this->load->view('admin/_partials/layout');
	$this->load->view('admin/_partials/navbar');
?>
