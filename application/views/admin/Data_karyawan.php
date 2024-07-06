<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Karyawan</h1>
    </div>
    <div class="grid-margin">
            <div class="card">
            <div class="card-body">
            <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_menu"></i> Tambah Karyawan</button>
              <?php echo $this->session->flashdata('karyawan');?>
              <?php $this->session->unset_userdata('karyawan');?>

              <table class="table table-striped table-bordered">
                <thead>
                  <th>NO</th>
                  <th>NAMA KARYAWAN</th>
                  <th>USERNAME</th>
                  <th>NO HP</th>
                  <th>AKSI</th> 
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach ($karyawan as $k) : ?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $k->NAMA_KARYAWAN?></td>
                        <td><?php echo $k->USERNAME?></td>
                        <td><?php echo $k->NO_HP_KARYAWAN?></td>
                        <td>
                        <div class="row">
                            <a href="<?php echo base_url('admin/data_karyawan/edit_karyawan/'.$k->ID_KARYAWAN) ?>" class="btn btn-primary btn-sm mr-2 ml-2"><i class="fas fa-edit"></i></a>
                            <a href="<?php echo base_url('admin/data_karyawan/hapus_karyawan/' .$k->ID_KARYAWAN) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data karyawan?')"><i class="fas fa-trash"></i></a>
                            <div>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Karyawan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(). 'admin/data_karyawan/tambah_aksi';?>" method="post">

        <div class="form-group">
            <label>NAMA KARYAWAN</label>
            <input type="text" name="NAMA_KARYAWAN" class="form-control">
        </div>
        <div class="form-group">
            <label>USERNAME</label>
            <input type="text" name="USERNAME" class="form-control">
        </div>
        <div class="form-group">
            <label>NO HP</label>
            <input type="text" name="NO_HP_KARYAWAN" class="form-control">
        </div>
        <div class="form-group">
            <label>PASSWORD</label>
            <input type="password" name="PASSWORD" class="form-control">
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
