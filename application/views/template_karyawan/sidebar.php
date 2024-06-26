<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
            <div class="search-result">
              <div class="search-header">
                Histories
              </div>
              <div class="search-item">
                <a href="#">How to hack NASA using CSS</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
              </div>
              <div class="search-item">
                <a href="#">Kodinger.com</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
              </div>
              <div class="search-item">
                <a href="#">#Stisla</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
              </div>
              <div class="search-header">
                Result
              </div>
              <div class="search-item">
                <a href="#">
                  <img class="mr-3 rounded" width="30" src="<?php echo base_url('assets')?>/assets/img/products/product-3-50.png" alt="product">
                  oPhone S9 Limited Edition
                </a>
              </div>
              <div class="search-item">
                <a href="#">
                  <img class="mr-3 rounded" width="30" src="<?php echo base_url('assets')?>/assets/img/products/product-2-50.png" alt="product">
                  Drone X2 New Gen-7
                </a>
              </div>
              <div class="search-item">
                <a href="#">
                  <img class="mr-3 rounded" width="30" src="<?php echo base_url('assets')?>/assets/img/products/product-1-50.png" alt="product">
                  Headphone Blitz
                </a>
              </div>
              <div class="search-header">
                Projects
              </div>
              <div class="search-item">
                <a href="#">
                  <div class="search-icon bg-danger text-white mr-3">
                    <i class="fas fa-code"></i>
                  </div>
                  Stisla karyawan Template
                </a>
              </div>
              <div class="search-item">
                <a href="#">
                  <div class="search-icon bg-primary text-white mr-3">
                    <i class="fas fa-laptop"></i>
                  </div>
                  Create a new Homepage Design
                </a>
              </div>
            </div>
          </div>
        </form>
        <ul class="navbar-nav navbar-right">
        <li class="nav-item">
        <?php
        $pesanan = '<li class="dropdown"><a href="' . site_url('karyawan/dashboard/detail_pesanan') . '" class="nav-link nav-link-lg nav-link-user"><div class="d-sm-none d-lg-inline-block">Pesanan: '.$this->cart->total_items().' items</div></a></li>';
        echo $pesanan;
        ?>
        </li>     
          <li class="dropdown"><a href="#" class="nav-link nav-link-lg nav-link-user">
            <div class="d-sm-none d-lg-inline-block">Welcome <?php echo $this->session->userdata('NAMA_KARYAWAN') ?></div></a>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Warung Steak</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">WS</a>
          </div>
        <ul class="sidebar-menu">
          <li class="menu-header">Dashboard</li>
              <li class="nav-item <?php echo $this->uri->segment(2) == 'dashboard' ? 'active' : '' ?>">
                <a href="<?php echo base_url()?>karyawan/dashboard" class="nav-link"><i class="fas fa-utensils"></i> <span>Menu</span></a>
              </li>
              <li class="nav-item <?php echo $this->uri->segment(2) == 'antrian' ? 'active' : '' ?>">
                <a href="<?php echo base_url()?>karyawan/antrian" class="nav-link"><i class="far fa-file-alt"></i> <span>Antrian</span></a>
              </li>
              <li class="nav-item <?php echo $this->uri->segment(2) == 'laporan' ? 'active' : '' ?>">
                <a href="<?php echo base_url()?>karyawan/laporan" class="nav-link"><i class="fas fa-file-alt"></i> <span>Laporan</span></a>
              </li>
              <li class="menu-header">Data Master</li>
              <li class="nav-item <?php echo $this->uri->segment(2) == 'data_menu' ? 'active' : '' ?>">
              <a href="<?php echo base_url()?>karyawan/data_menu" class="nav-link"><i class="far fa-user"></i> <span>Data Menu</span></a>
              </li>
              <li class="nav-item <?php echo $this->uri->segment(2) == 'logout' ? 'active' : '' ?>">
              <a href="<?php echo base_url()?>auth/logout"  class="nav-link"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a>
              </li>
   </ul> 
        </aside>
      </div>
    </div>
  </div>
</body>
