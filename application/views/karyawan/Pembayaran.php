<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Pembayaran</h1>
    </div>
    <div class="grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="btn btn-success btn-sm">
                                <?php 
                                $grand_total = 0;
                                if ($pesanan = $this->cart->contents())
                                {
                                    foreach ($pesanan as $item)
                                    {
                                        $grand_total = $grand_total + $item['subtotal'];
                                    }

                                    echo "<h4>Total belanja anda: Rp. ".number_format($grand_total,  0,',','.'); 
                                
                                ?>
                            </div><br><br>
                            <h3>Input Nama dan Meja</h3>

                            <form action="<?php echo base_url()?>karyawan/dashboard/proses_pesanan" method="post">
                                <div class="form-group">
                                    <label for="Nama Lengkap"></label>
                                    <input type="text" name="NAMA" placeholder="Nama Anda" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="No Meja"></label>
                                    <input type="text" name="NO_MEJA" placeholder="No Meja Anda" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm mt-3">Pesan</button>
                            </form>
                            <?php } else {
                                echo  "Pesanan anda kosong";
                            }
                            ?>
                        </div>
                        
                        <div class="col-md-2"></div>
                        </div>
                    </div>
                </div>
        </div>
</div>