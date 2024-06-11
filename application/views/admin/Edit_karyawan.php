<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Edit Karyawan</h1>
    </div>
    <div class="grid-margin">
            <div class="card">
            <div class="card-body">
                <?php foreach($karyawan as $k) : ?>

                    <form method="post" action="<?php echo base_url().'admin/data_karyawan/update' ?>">

                        <div class="form-group">
                            <input type="hidden" name="ID_KARYAWAN" class="form-control" value="<?php echo $k->ID_KARYAWAN ?>">
                            <label>NAMA KARYAWAN</label>
                            <input type="text" name="NAMA_KARYAWAN" class="form-control" value="<?php echo $k->NAMA_KARYAWAN ?>">
                        </div>
                        <div class="form-group">
                            <label>USERNAME</label>
                            <input type="text" name="USERNAME" class="form-control" value="<?php echo $k->USERNAME ?>">
                        </div>
                        <div class="form-group">
                            <label>NO HP</label>
                            <input type="text" name="NO_HP_KARYAWAN" class="form-control" value="<?php echo $k->NO_HP_KARYAWAN ?>">
                        </div>
                        <div class="form-group">
                            <label>PASSWORD</label>
                            <input type="password" name="PASSWORD" class="form-control" value="<?php echo $k->PASSWORD ?>">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm mt-3">Simpan</button>
                        </form> 
                <?php endforeach?>

            </div>
            </div>
    </div>
</div>