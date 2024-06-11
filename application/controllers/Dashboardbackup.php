<?php

class Dashboard extends CI_Controller {

    public function index() {
    $data['judul'] = 'WARUNG STEAK';
    $data['menu'] = $this->Model_menu->getAllMenu()->result();
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar');
    $this->load->view('dashboard', $data);
    $this->load->view('template/footer');
    }

    public function tambah_ke_pesanan($id) {

        $menu = $this->Model_menu->find($id);

        $data = array(
            'id'      => $menu->ID_MENU,
            'qty'     => 1,
            'price'   => $menu->HARGA,
            'name'    => $menu->NAMA_MENU
        );
    
    $this->cart->insert($data);
    redirect('dashboard');
    }

    public function detail_pesanan(){

    $data['judul'] = 'WARUNG STEAK';
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar');
    $this->load->view('admin/dashboard/pesanan');
    $this->load->view('template/footer');
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
        redirect('dashboard/detail_pesanan/');
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
        $data['judul'] = 'WARUNG STEAK';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('pembayaran');
        $this->load->view('template/footer');
    }

    public function proses_pesanan(){
        $is_processed = $this->Model_laporan->index();
        if($is_processed) {

            $this->cart->destroy();
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('proses_pesanan');
            $this->load->view('template/footer');
        } else {
            echo "Gagal melakukan proses pesanan!";
        }

    }
}
?>