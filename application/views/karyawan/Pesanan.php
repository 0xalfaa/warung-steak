<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Keranjang Belanja</h1>
    </div>
    <div class="grid-margin">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>NO</th>
                            <th width="30%">Nama Menu</th>
                            <th width="13%">Jumlah</th>
                            <th width="15%">Harga</th>
                            <th width="20%" class="text-right">Subtotal</th>
                            <th width="12%"></th>
                        </tr>

                        <?php
                        $no = 1;
                        foreach ($this->cart->contents() as $items) : ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $items['name'] ?></td>
                            <td><input type="number" class="form-control text-center" value="<?php echo $items["qty"]; ?>" onchange="update_item_keranjang(this, '<?php echo $items["rowid"]; ?>')"></td>
                            <td align="right">Rp. <?php echo number_format($items['price'], 0,',','.') ?></td>
                            <td align="right">Rp. <?php echo number_format($items['subtotal'], 0,',','.') ?></td>
                            <td align="center" width="20%" onclick="return confirm('yakin ingin menghapus keranjang?')"><?php echo anchor('admin/dashboard/hapus_item_keranjang/'.$items['rowid'],'<div class="btn-delete"><i class="fas fa-lg fa-times"></i></div>')?></td>
                        </tr>
                        <?php  endforeach; ?>
                        <tr>
                            <td colspan="4"></td>
                            <td><strong>Total</strong></td>
                            <td align="right">
                                Rp.  <?php echo number_format($this->cart->total(), 0,',','.') ?>
                            </td>
                        </tr>
                    </table>
                    <div align="right">
                    <!-- <a href="<?php echo base_url('karyawan/dashboard/hapus_pesanan');?>"> <div class="btn btn-danger btn-sm">Hapus Pesanan</div></a>  -->
                    <a href="<?php echo base_url('karyawan/dashboard/');?>"> <div class="btn btn-primary btn-sm">Pesan lagi</div></a> 
                    <a href="<?php echo base_url('karyawan/dashboard/pembayaran');?>"> <div class="btn btn-success btn-sm">Pembayaran</div></a> 
                    </div>
                </div>
            </div>
        </div>
</div>
<!-- Include jQuery library -->
<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>

<script>
// Update item quantity
function update_item_keranjang(obj, rowid){
    $.get("<?php echo base_url('karyawan/dashboard/update_jumlah_menu/'); ?>", {rowid:rowid, qty:obj.value}, function(resp){
        if(resp == 'ok'){
            location.reload();
        }else{
            alert('Cart update failed, please try again.');
        }
    });
}
</script>