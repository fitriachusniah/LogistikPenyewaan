    <?php $this->load->view('admin/_partials/header'); ?>
        <div class="main-content-wrap d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1 class="mr-2">Dashboard</h1>
                    <ul>
                        <li>Dashboard</li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>
                <div class="row">
                    <!-- ICON BG-->
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                            <div class="card-body text-center"><i class="i-Stopwatch"></i>
                                <div class="content">
                                    <p class="text-muted mt-2 mb-0">Requests</p>
                                    <p class="text-primary text-24 line-height-1 mb-2"><?= $request->jmlRequest ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                            <div class="card-body text-center"><i class="i-Yes"></i>
                                <div class="content">
                                    <p class="text-muted mt-2 mb-0">Approved</p>
                                    <p class="text-primary text-24 line-height-1 mb-2"><?= $approved->jmlApproved ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                            <div class="card-body text-center"><i class="i-Car-2"></i>
                                <div class="content">
                                    <p class="text-muted mt-2 mb-0">Cars</p>
                                    <p class="text-primary text-24 line-height-1 mb-2"><?= $mobil->jmlMobil ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                            <div class="card-body text-center"><i class="i-Men"></i>
                                <div class="content">
                                    <p class="text-muted mt-2 mb-0">Drivers</p>
                                    <p class="text-primary text-24 line-height-1 mb-2"><?= $driver->jmlDriver ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-3">
                            <div class="card-body text-center"><i class="i-Coin"></i>
                                <div class="content" style="margin-left: 10%">
                                    <p class="text-muted mt-10 mb-0">Cost <b><?= $year ?></b> </p>
                                    <p class="text-primary text-24 line-height-1 mb-2">Rp<?= number_format($cost->thisMonthCost,2) ?></p>
                                    <p><button class="btn btn-primary btn-rounded" type="button" data-toggle="modal" data-target="#cost">
                                            Detail
                                             </button></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="card-title">Trip Driver</div>
                                <div id="dashboardChart" style="height: 300px;"></div>
                            </div>
                        </div>
                    </div>
                    
                </div>

                
          </div>

           <!-- --------------------------------------- -->
                        <!--  Large Modal  for add new customer-->
                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" id="cost">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="exampleModalCenterTitle">
                                            Total Cost 2020
                                        </h3>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <form name="vform" action="#" method="post" class="needs-validation" novalidate>
                                        <div class="modal-body">
                                            <div class="row">
                                                <table class="display table table-striped table-bordered" id="responsive_table_mine" style="width: 100%">
                                                    <tr>
                                                        <th>Bulan</th>
                                                        <th>Total Cost</th>
                                                    </tr>
                                                    <?php
                                                        $month = '';
                                                        $cost = 0;
                                                        for($i=1; $i<=12; $i++){

                                                            switch ($i) {
                                                              case "1":
                                                                $month = "Januari";
                                                                break;
                                                              case "2":
                                                                $month = "Februari";
                                                                break;
                                                              case "3":
                                                                $month = "Maret";
                                                                break;
                                                              case "4":
                                                                $month = "April";
                                                                break;
                                                              case "5":
                                                                $month = "Mei";
                                                                break;
                                                              case "6":
                                                                $month = "Juni";
                                                                break;
                                                              case "7":
                                                                $month = "Juli";
                                                                break;
                                                              case "8":
                                                                $month = "Agustus";
                                                                break;
                                                              case "9":
                                                                $month = "September";
                                                                break;
                                                              case "10":
                                                                $month = "Oktober";
                                                                break;
                                                              case "11":
                                                                $month = "November";
                                                                break;
                                                              case "12":
                                                                $month = "Desember";
                                                                break;
                                                              default:
                                                                echo "-";
                                                            }
                                                    ?>
                                                        <tr>
                                                            <td><h4><?= $month ?></h4></td>
                                                            <td><h4>Rp <?= number_format($cost_total[$i]->total) ?></h4></td>
                                                        </tr>
                                                    <?php

                                                        }
                                                    ?>
                                                </table>


                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            
                                        </div>
                                    </form>
                                 

                                </div>
                            </div>
                        </div>

                        <!-- --------------------------------------- -->
                        <!--  END Large Modal  for add new customer-->
            <?php $this->load->view('admin/_partials/footer'); ?>
