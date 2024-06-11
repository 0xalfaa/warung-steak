<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Antrian</h1>
    </div>
    <div class="row">
      <div class="col-lg-6 grid-margin">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Antrian Pelanggan</h4><br>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Meja</th>
                    <th>Nama</th>
                    <th>Status</th>
                    <th>Ubah Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (isset($antrian) && is_array($antrian)):?>
                    <?php foreach ($antrian as $a) :?>
                      <?php if ($a->STATUS!= 2): // Hanya menampilkan yang belum selesai?>
                        <tr>
                          <td><?php echo $a->NO_MEJA?></td>
                          <td><?php echo $a->NAMA?></td>
                          <td>
                            <?php 
                            if ($a->STATUS == 0) {
                              echo '<span class="badge badge-danger">Belum Bayar</span>';
                            } elseif ($a->STATUS == 1) {
                              echo '<span class="badge badge-primary">Dimasak</span>';
                            }
                           ?>
                          </td>
                          <td>
                            <?php if ($a->STATUS == 0): ?>
                              <a href="<?php echo base_url('karyawan/antrian/update_status/'.$a->ID_ANTRIAN.'/1') ?>" class="btn btn-warning">Bayar</a>
                            <?php elseif ($a->STATUS == 1): ?>
                              <a href="<?php echo base_url('karyawan/antrian/update_status/'.$a->ID_ANTRIAN.'/2') ?>" class="btn btn-success">Selesai</a>
                            <?php endif; ?>
                          </td>
                        </tr>
                      <?php endif;?>
                    <?php endforeach;?>
                  <?php else:?>
                    <tr>
                      <td colspan="4">Belum ada antrian</td>
                    </tr>
                  <?php endif;?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 grid-margin">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Pesanan Selesai</h4><br>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Meja</th>
                    <th>Nama</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (isset($antrian) && is_array($antrian)):?>
                    <?php foreach ($antrian as $a) :?>
                      <?php if ($a->STATUS == 2):?>
                        <tr>
                          <td><?php echo $a->NO_MEJA?></td>
                          <td><?php echo $a->NAMA?></td>
                          <td><span class="badge badge-info">Selesai</span></td>
                        </tr>
                      <?php endif;?>
                    <?php endforeach;?>
                  <?php else:?>
                    <tr>
                      <td colspan="4">Belum ada pesanan yang selesai</td>
                    </tr>
                  <?php endif;?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>