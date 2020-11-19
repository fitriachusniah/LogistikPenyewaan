    <?php $this->load->view('driver/_partials/header'); ?>
        <div class="main-content-wrap d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1 class="mr-2">Trip Akan Datang</h1>
                    <ul>
                        <li>Butuh Konfirmasi</li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>

                 <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card mb-4">
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
                                                <th style="width: 10%">Durasi</th>                                                 
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
                                                            <span class="badge badge-warning">Menunggu Konfirmasi</span>
                                                        </b>
                                                    </td>
                                                    <td>
                                                        <?php 
                                                            if($value->daysRemaining<0){
                                                                echo "passed";
                                                            }else if($value->daysRemaining==0){
                                                                echo "hari ini";
                                                            }else{
                                                                echo $value->daysRemaining." hari lagi";
                                                            }
                                                        ?>
                                                    </td>
                                                    <td><?php $time = strtotime($value->tgl_pergi);             echo date('d F Y - H:i', $time); ?>
                                                    
                                                    </td>
                                                    <td><?php $time = strtotime($value->tgl_pulang);             echo date('d F Y - H:i', $time); ?>
                                                    
                                                    </td>
                                                    <td>
                                                        <?php 
                                                            $hourdiff = round((strtotime($value->tgl_pulang) - strtotime($value->tgl_pergi))/3600, 1);
                                                            echo $hourdiff." jam";
                                                        ?>
                                                    
                                                    </td>
                                                    <td class="text-center">
                                                       
                                                                <a class="text-success mr-2" href="#" data-toggle="modal" data-target="#detail<?= $value->id_order ?>">
                                                                    <i class="nav-icon i-Eye font-weight-bold">Info</i>
                                                                </a>
                                                                <?php
                                                                    date_default_timezone_set("Asia/Jakarta");
                                                                    $theDay = date("Y-m-d");
                                                                    $pergi = date('Y-m-d', strtotime($value->tgl_pergi));
                                                                    if ($pergi==$theDay) {
                                                                ?>
                                                                         <button data-toggle="modal" data-target="#edit<?= $value->id_order ?>" class="btn btn-success ml-2">
                                                                            <i class="nav-icon i-Yes font-weight-bold">Terima</i>
                                                                        </button>
                                                                <?php
                                                                    }
                                                                ?>
                                                               
                                                                <a class="text-danger mr-2" href="#" data-toggle="modal" href="#" data-target="#tolak<?= $value->id_order ?>">
                                                                    <i class="nav-icon i-Close-Window font-weight-bold">Tolak</i>
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


                <div class="breadcrumb">
                    <h1 class="mr-2">Trip Sedang Berjalan</h1>
                    
                </div>
                <div class="separator-breadcrumb border-top"></div>

                 <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card mb-4">
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
                                            foreach ($list_sedang_berjalan as $value) { ?>

                                                <tr>
                                                    <td style="text-align: center;"><?= $no++ ?></td>
                                                    <td>
                                                            <span class="badge" style="color: #fff; background-color:   #FF8C00;">Sedang Berjalan</span>
                                                        
                                                    </td>                                                    
                                                    <td>hari ini</td>
                                                    <td><?= $value->nama_fakultas ?></td>
                                                    <td><?= $value->jml_penumpang ?> org</td>
                                                    <td class="text-center">                                                
                                                        <a class="text-success mr-2" href="#" data-toggle="modal" data-target="#info<?= $value->id_order ?>">
                                                            <i class="nav-icon i-Eye font-weight-bold">Detail</i>
                                                        </a>

                                                                <a class="text-warning mr-2" href="#" data-toggle="modal" data-target="#close_trip<?= $value->id_order ?>">
                                                                            <i class="nav-icon i-Yes font-weight-bold">Tutup Trip Ini</i></a>

                                                        
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
               <form action="<?= base_url() ?>driver/Dashboard/tolak/<?= $key->id_order ?>" method="post">
                    <div class="modal-body">
                        <p>Yakin untuk menolak permintaan ini ?</p>
                         <div class="col-md-12">
                                <div class="form-group">
                                        <label for="">Alasan menolak perjalanan*</label>
                                                            <textarea required="" name="alasan" class="form-control form-control-rounded"></textarea>
                                </div>
                        </div>
                    <b>bertanda (*) harus diisi</b>
                    </div>
                    <div class="modal-footer">
                            
                            <button type="submit" class="btn btn-danger ml-2">Tolak</button>
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
    <div class="modal fade" id="edit<?= $key->id_order ?>" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="ExampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="ExampleModalLabel">Konfirmasi Terima Perjalanan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= site_url() ?>driver/Dashboard/terima/<?= $key->id_order ?>" method="post">
                <div class="modal-body">
                    <p>Yakin untuk menerima permintaan ini ?</p>
                    <div class="col-md-8">
                                <div class="form-group">
                                        <label for="">Km Awal*</label>
                                        <input name="km_awal" type="number" class="form-control form-control-rounded" placeholder="Masukkan KM Awal Mobil" min="1" required />
                                        <div class="invalid-feedback">
                                            KM Awal is Required
                                        </div>
                                </div>
                    </div>
                    <b>bertanda (*) harus diisi</b>
                </div>
                <div class="modal-footer">
                        <button type="submit" class="btn btn-primary ml-2">Simpan</button>
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
                        if($key->stat_adm==1 && $key->stat_drv==0 && $key->stat_cst==0){
                ?>
                            <span class="badge badge-warning">Diterima,Menunggu Konfirmasi Driver</span>
                <?php
                        }
                ?>
                    
                <table>
                       <tr>
                            <td>Fakultas Pemohon</td>
                            <td>:</td>
                            <td><?= $key->nama_fakultas ?></td>
                        </tr>
                        <tr>
                            <td>KAUR</td>
                            <td>:</td>
                            <td><b><?= $key->nama_kaur ?>(<?= $key->no_hp ?>)</b></td>
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


<?php foreach ($list_sedang_berjalan as $key) { ?>
    <div class="modal fade" id="info<?= $key->id_order ?>" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="ExampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="ExampleModalLabel">Detail Permintaan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                
                <span class="badge" style="color: #fff; background-color:   #FF8C00;">Sedang Berjalan</span>
                        
                <table>
                        <tr>
                            <td>Fakultas Pemohon</td>
                            <td>:</td>
                            <td><?= $key->nama_fakultas ?></td>
                        </tr>
                        <tr>
                            <td>KAUR</td>
                            <td>:</td>
                            <td><b><?= $key->nama_kaur ?>(<?= $key->no_hp ?>)</b></td>
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


<?php foreach ($list_sedang_berjalan as $key) { ?>
    <div class="modal fade" id="close_trip<?= $key->id_order ?>" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="ExampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="ExampleModalLabel">Konfirmasi Tutup Perjalanan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= site_url() ?>driver/Dashboard/close_trip/<?= $key->id_order ?>/<?= $key->id_mobil ?>" method="post">
                <div class="modal-body">
                    <p>Yakin untuk close trip ini ?</p>
                    <div class="col-md-8">
                                <div class="form-group">
                                        <label for="">Km Akhir*</label>
                                        <input name="km_akhir" type="number" class="form-control form-control-rounded" placeholder="Masukkan KM Akhir Mobil" min="1" required />
                                        <div class="invalid-feedback">
                                            KM Awal is Required
                                        </div>
                                </div>
                    </div>
                    <b>bertanda (*) harus diisi</b>
                </div>
                <div class="modal-footer">
                        <button type="submit" class="btn btn-primary ml-2">Simpan</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>



            <?php $this->load->view('driver/_partials/footer'); ?>
