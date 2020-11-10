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
