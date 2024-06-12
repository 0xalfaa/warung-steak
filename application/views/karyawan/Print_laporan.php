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
    $no = 1;
    $total_pemasukan = 0;
    foreach($laporan as $l) : 
        $total_pemasukan += $l->TOTAL;
    ?>
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
    <tr>
        <td colspan="5"><strong>Total Pemasukan</strong></td>
        <td colspan="2"><strong>Rp. <?php echo number_format($total_pemasukan, 0, ',', '.') ?></strong></td>
    </tr>
</table>


<script type="text/javascript">
    window.print() 
</script>