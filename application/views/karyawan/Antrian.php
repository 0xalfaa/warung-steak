<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Antrian</h1>
    </div>
    <div class="row">
      <div class="col-lg-7 grid-margin">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Antrian Pelanggan</h4><br>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Meja</th>
                    <th>Nama</th>
                    <th>Status</th>
                    <th>Ubah Status</th>
                    <th>Detail</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (isset($antrian) && is_array($antrian)):?>
                    <?php foreach ($antrian as $a) :?>
                      <?php if ($a->STATUS != 2): // Hanya menampilkan yang belum selesai?>
                        <tr>
                          <td><?php echo $a->NO_MEJA?></td>
                          <td><?php echo $a->NAMA?></td>
                          <td>
                            <?php 
                            if ($a->STATUS == 0) {
                              echo '<span class="badge badge-danger">Belum Bayar</span>';
                            } elseif ($a->STATUS == 1) {
                              echo '<span class="badge badge-primary">Dimasak</span>';
                            }
                           ?>
                          </td>
                          <td>
                            <?php if ($a->STATUS == 0): ?>
                              <a href="<?php echo base_url('karyawan/antrian/update_status/'.$a->ID_ANTRIAN.'/1') ?>" class="btn btn-warning">Bayar</a>
                            <?php elseif ($a->STATUS == 1): ?>
                              <a href="<?php echo base_url('karyawan/antrian/update_status/'.$a->ID_ANTRIAN.'/2') ?>" class="btn btn-success">Selesai</a>
                            <?php endif; ?>
                          </td>
                          <td>
                            <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#detail" data-id_antrian="<?php echo $a->ID_ANTRIAN ?>"><i class="fas fa-eye"></i></button>
                          </td>
                        </tr>
                      <?php endif;?>
                    <?php endforeach;?>
                  <?php else:?>
                    <tr>
                      <td colspan="4">Belum ada antrian</td>
                    </tr>
                  <?php endif;?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-5 grid-margin">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Pesanan Selesai</h4><br>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Meja</th>
                    <th>Nama</th>
                    <th>Status</th>
                    <th>Detail</th>
                  </tr>
                </thead>
                <tbody>
                <?php if (isset($pesanan_selesai) && is_array($pesanan_selesai)):?>
                    <?php foreach ($pesanan_selesai as $a) :?>
                      <?php if ($a->STATUS == 2):?>
                        <tr>
                          <td><?php echo $a->NO_MEJA?></td>
                          <td><?php echo $a->NAMA?></td>
                          <td><span class="badge badge-info">Selesai</span></td>
                          <td>
                            <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#detail" data-id_antrian="<?php echo $a->ID_ANTRIAN; ?>"><i class="fas fa-eye"></i></button>
                          </td>

                        </tr>
                      <?php endif;?>
                    <?php endforeach;?>
                  <?php else:?>
                    <tr>
                      <td colspan="4">Belum ada pesanan yang selesai</td>
                    </tr>
                  <?php endif;?>
                </tbody>
              </table>
            </div>
            <?php echo $pagination;?>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- Modal -->
<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Pesanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Nama Menu</th>
              <th>Jumlah</th>
              <th>Harga</th>
              <th class="text-right">Subtotal</th>
            </tr>
          </thead>
          <tbody id="detail_pesanan"></tbody>
          <tfoot>
            <tr>
              <th colspan="3">Total</th>
              <th class="text-right" id="total_pesanan"></th>
            </tr>
          </tfoot>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function() {
  $('#detail').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var id_antrian = button.data('id_antrian');

    $.ajax({
      url: "<?php echo base_url('karyawan/antrian/detail/'); ?>" + id_antrian,
      method: "GET",
      dataType: "json",
      success: function(data) {
        var html = '';
        var total = 0; // Inisialisasi total

        for (var i = 0; i < data.length; i++) {
          var subtotal = data[i].JUMLAH * data[i].HARGA; // Hitung subtotal
          total += subtotal; // Tambahkan subtotal ke total

          html += '<tr>'+
                    '<td>' + data[i].NAMA_MENU + '</td>'+
                    '<td align="right">' + data[i].JUMLAH + '</td>'+
                    '<td><div style="display: flex; justify-content: space-between;"><span>Rp </span><span style="text-align: right;">' + number_format(data[i].HARGA, 0, ',', '.') + '</span></div></td>'+
                    '<td class="text-right"><div style="display: flex; justify-content: space-between;"><span>Rp </span><span style="text-align: right;">' + number_format(subtotal, 0, ',', '.') + '</span></div></td>'+
                  '</tr>';
        }

        $('#detail_pesanan').html(html);
        $('#total_pesanan').html('<div style="display: flex; justify-content: space-between;"><span>Rp </span><span style="text-align: right;">' + number_format(total, 0, ',', '.') + '</span></div>'); // Tampilkan total
      },
      error: function(xhr, status, error) {
        console.error(xhr.responseText); // Log the response text
      }
    });
  });
});

// Function to format numbers
function number_format(number, decimals, decPoint, thousandsSep) {
  number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
  var n = !isFinite(+number) ? 0 : +number,
      prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
      sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep,
      dec = (typeof decPoint === 'undefined') ? '.' : decPoint,
      s = '',
      toFixedFix = function (n, prec) {
        var k = Math.pow(10, prec);
        return '' + (Math.round(n * k) / k).toFixed(prec);
      };
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}
</script>

