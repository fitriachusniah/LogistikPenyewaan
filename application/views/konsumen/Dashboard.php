    <?php $this->load->view('konsumen/_partials/header'); ?>
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
                    <div class="col-lg-12 col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                  <center>
                                    <?php 
                                        if($cek_pinjaman==0){
                                    ?>  
                                            <button class="btn btn-primary btn-rounded" type="button" data-toggle="modal" data-target="#addSewa" style="padding: 25px 40px; font-weight: 50%">
                                            Ajukan Permintaan Pinjam Mobil
                                             </button>
                                    <?php
                                        }else{
                                    ?>
                                            <button disabled class="btn btn-default btn-rounded" type="button" data-toggle="modal" data-target="#addSewa" style="padding: 25px 40px; font-weight: 50%; color:#000;">
                                            Anda tidak dapat meminjam Mobil
                                            </button><br>
                                            
                                    <?php
                                        }
                                    ?>
                                        
                                 </center>
                            </div>
                        </div>
                    </div>                   
                </div>

             
                <div class="row">
                   
                   <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                            <div class="card-body text-center"><i class="i-Stopwatch"></i>
                                <div class="content">
                                    <p class="text-muted mt-2 mb-0">Belum Disetujui</p>
                                    <p class="text-primary text-24 line-height-1 mb-2"><?= $belum_disetujui_admin->jmlBlmDisetujui ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                            <div class="card-body text-center"><i class="i-Yes"></i>
                                <div class="content">
                                    <p class="text-muted mt-2 mb-0">Sudah Disetujui</p>
                                    <p class="text-primary text-24 line-height-1 mb-2"><?= $disetujui_admin->jmlDisetujui ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                            <div class="card-body text-center"><i class="i-Car-2"></i>
                                <div class="content">
                                    <p class="text-muted mt-2 mb-0">Perjalanan Selesai</p>
                                    <p class="text-primary text-24 line-height-1 mb-2"><?= $selesai->jmlSelesai ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                            <div class="card-body text-center"><i class="i-Close"></i>
                                <div class="content">
                                    <p class="text-muted mt-2 mb-0">Peminjaman Ditolak</p>
                                    <p class="text-primary text-24 line-height-1 mb-2"><?= $ditolak->jmlDitolak ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
               
              <!-- end of main-content -->
          </div>


            <!-- --------------------------------------- -->
                        <!--  Large Modal  for add new customer-->
                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" id="addSewa">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">
                                            Form Pengajuan Penyewaan Mobil
                                        </h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <form name="vform" action="<?= $sewa_action ?>" method="post" class="needs-validation" novalidate>
                                        <div class="modal-body">
                                            <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Tanggal dan Jam Berangkat*</label>
                                                             <?php $datetime = new DateTime('now');
                                                                    $min_date = $datetime->format('Y-m-d');
                                                                    $max_date = strtotime("+7 day", time());
                                                              ?>
                                                            <input name="tgl_pergi" type="datetime-local" class="form-control form-control-rounded" min="<?= $min_date ?>"  required />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Tanggal dan Jam Pulang*</label>
                                                             <?php $datetime = new DateTime('now');
                                                                    $min_date = $datetime->format('Y-m-d');
                                                                    $max_date = strtotime("+7 day", time());
                                                              ?>
                                                            <input name="tgl_pulang" type="datetime-local" class="form-control form-control-rounded" min="<?= $min_date ?>"  required />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Lokasi Tujuan*</label>
                                                            <input name="tujuan" type="text" class="form-control form-control-rounded"  required />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Keperluan*</label>
                                                            <input name="keterangan" type="text" class="form-control form-control-rounded"  required />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Jumlah Penumpang(minimal 3 org)*</label>
                                                            <input name="jml_penumpang" min="3" type="number" class="form-control form-control-rounded"  required />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Catatan Khusus(optional)</label>
                                                            <textarea name="note" class="form-control form-control-rounded"></textarea>
                                                        </div>
                                                    </div>
                                                                                                   
                                                
                                            </div>
                                            <b>isian bertanda (*) harus diisi</b>

                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="submit" id="submit" class="btn btn-primary ml-2" onclick="return Validasi();">Save</button>
                                        </div>
                                    </form>
                                    <script>
                                        // Example starter JavaScript for disabling form submissions if there are invalid fields
                                        (function() {
                                            'use strict';
                                            window.addEventListener('load', function() {
                                                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                                var forms = document.getElementsByClassName('needs-validation');
                                                // Loop over them and prevent submission
                                                var validation = Array.prototype.filter.call(forms, function(form) {
                                                    form.addEventListener('submit', function(event) {
                                                        if (form.checkValidity() === false) {
                                                            event.preventDefault();
                                                            event.stopPropagation();
                                                        }
                                                        form.classList.add('was-validated');
                                                    }, false);
                                                });
                                            }, false);
                                        })();
                                    </script>

                                </div>
                            </div>
                        </div>

                        <!-- --------------------------------------- -->
                        <!--  END Large Modal  for add new customer-->

            <?php $this->load->view('admin/_partials/footer'); ?>
