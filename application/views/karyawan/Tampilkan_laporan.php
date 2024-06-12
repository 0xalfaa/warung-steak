<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Laporan Penjualan</h1>
        </div>

    <form action="<?php echo base_url('admin/laporan') ?>" method="POST">
        <div class="form-group">
            <label>Dari Tanggal</label>
            <input type="date" name="dari" class="form-control">
            <?php echo form_error('dari', '<span class="text-small text-danger">','</span>') ?>

        </div>
        <div class="form-group">karyawan
            <label>Sampai Tanggal</label>
            <input type="date" name="sampai" class="form-control">
            <?php echo form_error('sampai', '<span class="text-small text-danger">','</span>') ?>

        </div>

        <button type="submit" class="btn btn-sm btn-primary">Tampilkan Data</button>
    
    </form><hr>

    <div class="btn-group">
        <a class="btn btn-sm btn-success" target="_blank" href="<?php echo base_url().'karyawan/laporan/print_laporan/?dari='.set_value('dari').'&sampai='.set_value('sampai') ?>"><i class="fas fa-print"></i> Print</a>
    </div>

        <div class="table-responsive mt-3">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama Menu</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Nama Karyawan</th>
                </tr>

                <?php $no = 1; foreach($laporan as $l) : ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $l->TANGGAL ?></td>
                        <td><?php echo $l->NAMA_MENU ?></td>
                        <td>Rp. <?php echo number_format($l->HARGA, 0, ',', '.') ?></td>
                        <td><?php echo $l->JUMLAH ?></td>
                        <td>Rp. <?php echo number_format($l->TOTAL, 0, ',', '.') ?></td>
                        <td><?php echo $l->NAMA_KARYAWAN ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </section>
</div>
