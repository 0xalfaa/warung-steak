<?php
class Antrian extends CI_Controller {

    public function __construct(){
        parent::__construct();

        if($this->session->userdata('ROLE_ID') != '1'){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert"> Anda Belum Login! <button type="button" class="close" data-dissmiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('auth/login'); 
        }
    }

    public function index() {
        $data['judul'] = 'Antrian Pelanggan';
        $data['antrian'] = $this->Model_antrian->tampil_data();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/antrian', $data);
        $this->load->view('template_admin/footer');
    }

    public function update_status($id, $status) {
        $this->Model_antrian->update_status($id, $status);
        redirect('admin/antrian');
    }

    public function detail($id_antrian) {
        $order_details = $this->Model_antrian->detail_pesanan($id_antrian);
        echo json_encode($order_details);
    }    
    
}
?>
