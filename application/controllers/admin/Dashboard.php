<?php

class Dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();

        if($this->session->userdata('ROLE_ID') != '1'){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert"> Anda Belum Login! <button type="button" class="close" data-dissmiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('auth/login'); 
        }
    }

    public function index() {
        $data['judul'] = 'Pesan Menu';
        $data['menu'] = $this->Model_menu->getAllMenu()->result();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('template_admin/footer');
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
        redirect('admin/dashboard');
    }

    public function detail_pesanan() {
        $data['judul'] = 'keranjang Belanja';
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/pesanan');
        $this->load->view('template_admin/footer');
    }

    function update_jumlah_menu() {
        $update = 0;
        $rowid = $this->input->get('rowid');
        $qty = $this->input->get('qty');
        if (!empty($rowid) && !empty($qty)) {
            $data = array(
                'rowid' => $rowid,
                'qty'   => $qty
            );
            $update = $this->cart->update($data);
        }
        echo $update ? 'ok' : 'err';
    }

    function hapus_item_keranjang($rowid) {
        $remove = $this->cart->remove($rowid);
        redirect('admin/dashboard/detail_pesanan/');
    }

    public function pembayaran() {
        $data['judul'] = 'Pembayaran';
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/pembayaran');
        $this->load->view('template_admin/footer');
    }

    public function proses_pesanan() {
        $is_processed = $this->Model_antrian->index();
        if ($is_processed) {
            $this->cart->destroy();
            $this->load->view('template_admin/header');
            $this->load->view('template_admin/sidebar');
            $this->load->view('admin/proses_pesanan');
            $this->load->view('template_admin/footer');
        } else {
            echo "Gagal melakukan proses pesanan!";
        }
    }
}
?>
