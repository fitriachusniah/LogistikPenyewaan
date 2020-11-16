	<div class="app-admin-wrap layout-horizontal-bar">
        <div class="main-header">
            <div class="logo"><a href="<?= base_url()?>konsumen/Dashboard"><img src="<?=base_url()?>assets/images/telkom.png" alt="" /></a></div>
            <div class="menu-toggle">
                <div></div>
                <div></div>
                <div></div>
            </div>
           <!--  <div class="d-flex align-items-center">
                <div class="search-bar">
                    <input type="text" placeholder="Search" /><i class="search-icon text-muted i-Magnifi-Glass1"></i>
                </div>
            </div> -->
            <div style="margin: auto"></div>
            <div class="header-part-right">

                <!-- Notificaiton-->
                <div class="dropdown">
                    <div class="badge-top-container" id="dropdownNotification" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="badge badge-primary" id="count-notif"></span><i class="i-Bell text-muted header-icon"></i>
                                        </div>
                    <!-- Notification dropdown-->
                    <div id="notif-container" class="dropdown-menu dropdown-menu-right notification-dropdown rtl-ps-none" aria-labelledby="dropdownNotification" data-perfect-scrollbar="" data-suppress-scroll-x="true">
                        
                    </div>
                </div>
                <!-- Notificaiton End-->        
                <!-- User avatar dropdown-->
                <div class="dropdown">
                    <div class="user col align-self-end"><img id="userDropdown" src="<?=base_url()?>assets/images/user.png" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" />
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <div class="dropdown-header"><i class="i-Lock-User mr-1"></i> <?php echo $this->session->userdata('name') ?></div><a class="dropdown-item" href="<?= base_url()?>konsumen/Dashboard/update_profile/<?= $this->session->userdata('id') ?>">Update Profile</a><a class="dropdown-item" href="<?= base_url()?>Login/logout">Sign out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
