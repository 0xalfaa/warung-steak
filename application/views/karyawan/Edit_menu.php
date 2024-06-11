<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Menu</h1>
    </div>
    <div class="grid-margin">
            <div class="card">
                <div class="card-body">
                <?php foreach($menu as $m) : ?>

                    <form method="post" action="<?php echo base_url().'karyawan/data_menu/update' ?>" enctype="multipart/form-data">

                        <div class="form-group">
                            <input type="hidden" name="ID_MENU" class="form-control" value="<?php echo $m->ID_MENU?>">
                            <label>Nama Menu</label>
                            <input type="text" name="NAMA_MENU" class="form-control" value="<?php echo $m->NAMA_MENU?>">
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="text" name="HARGA" class="form-control" value="<?php echo $m->HARGA?>">
                        </div>
                        <div class="form-group">
                            <label>STOK</label>
                            <input type="text" name="STOK" class="form-control" value="<?php echo $m->STOK?>">
                        </div>
                        <div class="form-group">
                            <label>Foto Menu</label>
                            <input type="file" name="FOTO" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm mt-3">Simpan</button>
                        </form> 
                <?php endforeach?>
                </div>
            </div>
        </div>

</div>