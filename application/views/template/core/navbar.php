<nav class="main-header navbar navbar-expand-md navbar-dark navbar-gray-dark">
  <div class="container">
    <a href="<?php echo base_url(); ?>" class="navbar-brand">
      <img src="<?php echo base_url('assets/image/logo4.png'); ?>" alt="SIMP Adorable Projects Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span style="margin-left:10px;" class="brand-text font-weight-light">SIMP</span>
    </a>
    
    <div class="collapse navbar-collapse order-3" id="navbarCollapse">
      <ul class="navbar-nav">
        <?php
            $role = $this->session->userdata('role_id');

            if($role == '1')
            {
                $arrMenu = unserialize(ADMINISTRATOR_MENU);
            }
            else if($role == '2')
            {
                $arrMenu = unserialize(CUSTOMER_SERVICE_MENU);
            }
            else if($role == '3')
            {
                $arrMenu = unserialize(BAGIAN_GUDANG_MENU);
            }
            else if($role == '4')
            {
                $arrMenu = unserialize(BAGIAN_PRODUKSI_MENU);
            }
            else if($role == '5')
            {
                $arrMenu = unserialize(BAGIAN_PURCHASING_MENU);
            }
            else if($role == '6')
            {
                $arrMenu = unserialize(MANAGER_DIRECTION_MENU);
            }

            foreach($arrMenu as $itemMenu)
            {
                echo '<li class="nav-item">';
                echo '<a href="'.site_url($itemMenu[1]).'" class="nav-link">'.$itemMenu[0].'</a>';
                echo '</li>';
            }
        ?>
      </ul>
    </div>

    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
      <li class="nav-item dropdown">
        <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Akun</a>
        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
          <li><a href="<?php echo site_url('administrator/ubah_password'); ?>" class="dropdown-item">Ubah Password</a></li>
          <li class="dropdown-divider"></li>
          <li><a href="<?php echo site_url('authentication/logout'); ?>" class="dropdown-item">Keluar</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>