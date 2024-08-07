<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Menu</h1>
    </div>
    <div class="grid-margin">
            <div class="card">
            <div class="card-body">
              <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_menu"> Tambah Menu</button>
              <?php echo $this->session->flashdata('menu')?>
              <?php $this->session->unset_userdata('menu');?>
              <table class="table table-striped table-bordered">
                <thead>
                  <th>NO</th>
                  <th>GAMBAR</th>
                  <th>NAMA MENU</th>
                  <th>HARGA</th>
                  <th>STOK</th>
                  <th colspan="3">AKSI</th> 
                </thead>
                <tbody>
                <?php 
                $no=1;
                foreach ($menu as $m) : ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><img width="100px" src="<?php echo base_url().'/uploads/'.$m->FOTO?>"></td>
                      <td><?php echo $m->NAMA_MENU?></td>
                      <td>
                        <div style="display: flex; justify-content: space-between;">
                         <span>Rp</span>
                          <span style="text-align: right;"><?php echo number_format($m->HARGA, 0, ',', '.') ?></span>
                        </div>
                      </td>
                      <td align="right"><?php echo $m->STOK?></td>
                      <td>
                      <a href="<?php echo base_url('admin/data_menu/edit_menu/'.$m->ID_MENU) ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                      <a href="<?php echo base_url('admin/data_menu/menu_hapus/'.$m->ID_MENU) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus menu <?php echo $m->NAMA_MENU?> ?')"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                <?php endforeach?>
                </tbody>
              </table>
              </section>
              </div>
             </div>
            </div>
          </div>


<!-- Modal -->
<div class="modal fade" id="tambah_menu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(). 'admin/data_menu/tambah_aksi';?>" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label>Nama Menu</label>
            <input type="text" name="NAMA_MENU" class="form-control">
        </div>
        <div class="form-group">
            <label>Harga</label>
            <input type="text" name="HARGA" class="form-control">
        </div>
        <div class="form-group">
            <label>STOK</label>
            <input type="text" name="STOK" class="form-control">
        </div>
        <div class="form-group">
            <label>Foto Menu</label>
            <input type="file" name="FOTO" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
        </form> 
    </div>
  </div>
</div>