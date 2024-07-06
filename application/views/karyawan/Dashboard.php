<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Menu Pesanan</h1>
    </div>
    <?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo $this->session->flashdata('error'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php $this->session->unset_userdata('error'); // Hapus session error ?>
    <?php endif; ?>
    <div class="container">
      <div class="row text-center">
      <?php foreach ($menu as $m) : ?>
          <div class="col-md-4 mb-3">
              <div class="card" style="width: 100%; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                  <img src="<?php echo base_url().'/uploads/'.$m->FOTO?>" class="card-img-top img-fluid custom-img" alt="...">
                  <div class="card-body">
                      <h5 class="card-title"><?php echo $m->NAMA_MENU ?></h5> 
                      <p class="card-text">Rp <?php echo number_format($m->HARGA, 0,',','.') ?></p>
                      <p class="card-text text-muted">stok: <?php echo $m->STOK ?></p>
                      <?php echo anchor('karyawan/dashboard/tambah_ke_pesanan/'.$m->ID_MENU,'<div class="btn btn-primary btn-sm mt-1">Tambah ke Pesanan</div>')?>
                  </div>
              </div>
          </div>
      <?php endforeach;?>
      </div>
    </div>
  </section>
</div>

<style>
  body {
    font-family: 'Roboto', sans-serif;
    background-color: #f8f9fa;
  }


  .section-header h1 {
    color: #333;
    margin-bottom: 20px;
    font-size: 2rem;
  }

  .card {
    transition: transform 0.2s, box-shadow 0.2s;
    cursor: pointer;
  }

  .card:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
  }

  .custom-img {
    height: 200px;
    object-fit: cover;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
  }

  .card-title {
    font-size: 1.25rem;
    font-weight: 500;
    color: #333;
    margin-bottom: 10px;
  }

  .card-text {
    font-size: 1.1rem;
    color: #666;
  }

  .btn-primary {
    background-color: #007bff;
    border-color: #007bff;
    transition: background-color 0.2s, transform 0.2s;
  }

  .btn-primary:hover {
    background-color: #0056b3;
    transform: translateY(-3px);
  }
</style>
