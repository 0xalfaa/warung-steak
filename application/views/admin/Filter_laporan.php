<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Laporan Penjualan</h1>
        </div>

        <div class="grid-margin">
            <div class="card">
            <div class="card-body">
                <form action="<?php echo base_url('admin/laporan') ?>" method="POST">
                    <div class="form-group">
                        <label>Dari Tanggal</label>
                        <input type="date" name="dari" class="form-control">
                        <?php echo form_error('dari', '<span class="text-small text-danger">','</span>') ?>
                    </div>
                    <div class="form-group">
                        <label>Sampai Tanggal</label>
                        <input type="date" name="sampai" class="form-control">
                        <?php echo form_error('sampai', '<span class="text-small text-danger">','</span>') ?>
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary">Tampilkan Data</button>
                </form>

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

                        <?php 
                       
                        foreach($laporan as $l) : 
                        ?>
                            <tr>
                                <td><?php echo ++$start ?></td>
                                <td><?php echo $l->TANGGAL ?></td>
                                <td><?php echo $l->NAMA_MENU ?></td>
                                <td>
                                    <div style="display: flex; justify-content: space-between;">
                                    <span>Rp</span>
                                    <span style="text-align: right;"><?php echo number_format($l->HARGA, 0, ',', '.') ?></span>
                                    </div>
                                </td>
                                <td align="right"><?php echo $l->JUMLAH ?></td>
                                <td>
                                    <div style="display: flex; justify-content: space-between;">
                                    <span>Rp</span>
                                    <span style="text-align: right;"><?php echo number_format($l->TOTAL, 0, ',', '.') ?></span>
                                    </div>
                                </td>
                                <td><?php echo $l->NAMA_KARYAWAN ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="6"><strong>Total Penghasilan Keseluruhan</strong></td>
                            <td colspan="3">
                                    <div style="display: flex; justify-content: space-between;">
                                    
                                    <strong><span>Rp</span></strong>
                                    <strong><span style="text-align: right;"><?php echo number_format($total_penghasilan, 0, ',', '.') ?>
                                    </span></strong>
                                    </div>
                            </td>
                            
                        </tr>
                    </table>
            </div>
            <?php echo $pagination; ?>
        </div>
    </section>
</div>
