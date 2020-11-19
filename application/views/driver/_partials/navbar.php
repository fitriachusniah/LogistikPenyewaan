 		<!-- header top menu end-->
 		<div class="horizontal-bar-wrap">
            <div class="header-topnav">
                <div class="container-fluid">
                    <div class="topnav rtl-ps-none" id="" data-perfect-scrollbar="" data-suppress-scroll-x="true">
                        <ul class="menu float-left">
                            <li>
                                <div>
                                    <div>
                                        <label class="toggle" for="drop-2">Dashboard</label><a href="<?php echo base_url()?>Driver/Dashboard/"><i class="nav-icon mr-2 i-Bar-Chart"></i> Dashboard</a>
                                        <input id="drop-2" type="checkbox" />
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <div>
                                        <label class="toggle" for="drop-2">History</label><a href="#"><i class="nav-icon mr-2 i-Data"></i> History</a>
                                        <input id="drop-2" type="checkbox" />
                                        <ul>
                                            <!-- <li><a href="<?php //echo base_url()?>driver/Dashboard/Menunggu_Perjalanan/"><i class="nav-icon mr-2 i-Stopwatch"></i><span class="item-name">Sedang Berjalan</span></a></li> -->
                                             <li><a href="<?php echo base_url()?>driver/Dashboard/Selesai"><i class="nav-icon mr-2 i-Yes"></i><span class="item-name">Selesai</span></a></li>
                                             <li><a href="<?php echo base_url()?>driver/Dashboard/Ditolak"><i class="nav-icon mr-2 i-Close"></i><span class="item-name">Ditolak</span></a></li>
                                        </ul>
                                    </div>

                                </div>
                            </li>
                            <!-- end History Data-->
                          
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- =============== Horizontal bar End ================-->
