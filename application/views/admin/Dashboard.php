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
                                    <p><a href="#">Detail</a></p>
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
            <?php $this->load->view('admin/_partials/footer'); ?>
