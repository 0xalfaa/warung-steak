<h3 style="text-align: center">Laporan Transaksi Penjualan</h3>
<table>
    <tr>
        <td>Dari Tanggal</td>
        <td>:</td>
        <td> <?php echo date('d-M-Y', strtotime($_GET['dari'])); ?> </td>
    </tr>
    <tr>
        <td>Sampai Tanggal</td>
        <td>:</td>
        <td> <?php echo date('d-M-Y', strtotime($_GET['sampai'])); ?> </td>
    </tr>
</table>

<table class="table table-bordered table-striped mt-4">
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
                        $no = 1;
                        $total_penghasilan = 0;
                        foreach($laporan as $l) : 
                            $total_penghasilan += $l->TOTAL;
                        ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
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
                            <td colspan="6"><strong>Total Penghasilan</strong></td>
                            <td colspan="3">
                                    <div style="display: flex; justify-content: space-between;">
                                    
                                    <strong><span>Rp
                                    </span></strong>
                                    <strong><span style="text-align: right;"><?php echo number_format($total_penghasilan, 0, ',', '.') ?>
                                    </span></strong>
                                    </div>
                            </td>
                            
                        </tr>
                    </table>


<script type="text/javascript">
    window.print() 
</script>