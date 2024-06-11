<div class="container-fluid">

    <div class="row text-center">

    <?php foreach ($menu as $m) : ?>
        <div class="card ml-3 mb-3" style="width: 16rem;">
            <img src="<?php echo base_url().'/uploads/'.$m->FOTO?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo $m->NAMA_MENU ?></h5> 
                <p class="card-text">Rp. <?php echo number_format($m->HARGA, 0,',','.') ?></p>
                <!-- <h6><span class="badge badge-pill badge-info">STOK : echo $m->STOK ?></span></h6> -->
                <?php echo anchor('dashboard/tambah_ke_pesanan/'.$m->ID_MENU,'<div class="btn btn-primary btn-sm mt-1">Tambah</div>')?>
            </div>
        </div>
    <?php endforeach;?>
    </div>
</div>