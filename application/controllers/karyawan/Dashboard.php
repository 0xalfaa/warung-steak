<?php

class Dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();

        if($this->session->userdata('ROLE_ID') != '2'){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert"> Anda Belum Login! <button type="button" class="close" data-dissmiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('auth/login'); 
        }
    }

    public function index() {
    $data['judul'] = 'Pesan Menu';
    $data['menu'] = $this->Model_menu->getAllMenu()->result();
    $this->load->view('template_karyawan/header', $data);
    $this->load->view('template_karyawan/sidebar');
    $this->load->view('karyawan/dashboard', $data);
    $this->load->view('template_karyawan/footer');
    }

    public function tambah_ke_pesanan($id) {
        $menu = $this->Model_menu->find($id);
        
        // Ambil jumlah pesanan yang ada di keranjang untuk menu ini
        $cart_items = $this->cart->contents();
        $current_qty = 0;
        foreach ($cart_items as $item) {
            if ($item['id'] == $menu->ID_MENU) {
                $current_qty = $item['qty'];
                break;
            }
        }
        
        // Periksa apakah stok mencukupi
        if ($menu->STOK > $current_qty) {
            $data = array(
                'id'      => $menu->ID_MENU,
                'qty'     => 1,
                'price'   => $menu->HARGA,
                'name'    => $menu->NAMA_MENU
            );
            $this->cart->insert($data);
        } else {
            // Tampilkan pesan error jika stok tidak mencukupi
            $this->session->set_flashdata('error', 'Stok tidak mencukupi untuk menambahkan pesanan.');
        }
        redirect('karyawan/dashboard');
    }

    public function detail_pesanan(){

    $data['judul'] = 'Keranjang Belanja';
    $this->load->view('template_karyawan/header', $data);
    $this->load->view('template_karyawan/sidebar');
    $this->load->view('karyawan/pesanan');
    $this->load->view('template_karyawan/footer');
    }

    function update_jumlah_menu(){
        $update = 0;
        
        // Get cart item info
        $rowid = $this->input->get('rowid');
        $qty = $this->input->get('qty');
        
        // Update item in the cart
        if(!empty($rowid) && !empty($qty)){
            $data = array(
                'rowid' => $rowid,
                'qty'   => $qty
            );
            $update = $this->cart->update($data);
        }
        
        // Return response
        echo $update?'ok':'err';
    }

    function hapus_item_keranjang($rowid){
        // Remove item from cart
        $remove = $this->cart->remove($rowid);
        
        // Redirect to the cart page
        redirect('karyawan/dashboard/detail_pesanan/');
    }



//     function hapus_item_keranjang($rowid) {   
//         $data = array(
//             'rowid'   => 'b99ccdf16028f015540f341130b6d8ec',
//             'qty'     => 0
//         );

//         $this->cart->update($data);
//         redirect('dashboard/detail_pesanan');
// }

    // public function hapus_pesanan(){
        
    //     $this->cart->destroy();
    //     redirect('dashboard');
    // }

    public function pembayaran(){
        $data['judul'] = 'Pembayaran';
        $this->load->view('template_karyawan/header', $data);
        $this->load->view('template_karyawan/sidebar');
        $this->load->view('karyawan/pembayaran');
        $this->load->view('template_karyawan/footer');
    }

    public function proses_pesanan(){
        $is_processed = $this->Model_antrian->index();
        if($is_processed) {

            $this->cart->destroy();
            $this->load->view('template_karyawan/header');
            $this->load->view('template_karyawan/sidebar');
            $this->load->view('karyawan/proses_pesanan');
            $this->load->view('template_karyawan/footer');
        } else {
            echo "Gagal melakukan proses pesanan!";
        }

    }
}
?>