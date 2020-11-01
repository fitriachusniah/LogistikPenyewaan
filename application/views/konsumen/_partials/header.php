<!DOCTYPE html>
<html lang="en" dir="">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>LOGISTIK-Penyewaan Mobil</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet" />
    <link href="<?=base_url()?>assets/css/themes/lite-purple.min.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/css/plugins/perfect-scrollbar.min.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/css/plugins/datatables.min.css" rel="stylesheet"  />
    <link rel="manifest" href="<?= base_url('manifest.webmanifest') ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <style media="screen">
      .rate-bintang
      {
        color: #d3e446;
      }

      @media only screen and (min-width: 600px) {
        .rate-bintang{
          font-size: 70px;
        }
      }

      @media only screen and (min-width: 100px) {
        .rate-bintang{
          font-size: 50px;          
        }
      }
    </style>
</head>

<body class="text-left">
<?php
	$this->load->view('konsumen/_partials/layout');
	$this->load->view('konsumen/_partials/navbar');
?>
