<?php
class Antrian extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if($this->session->userdata('ROLE_ID') != '1') {
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert"> Anda Belum Login! <button type="button" class="close" data-dissmiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('auth/login');
        }
    }

    public function index() {
        $data['judul'] = 'Antrian Pelanggan';

        // Ambil data antrian pelanggan (status selain 2)
        $data['antrian'] = $this->Model_antrian->get_antrian_pelanggan();

        // Pagination config
   
        $config['base_url'] = base_url('karyawan/antrian/index');
        $config['total_rows'] = $this->Model_antrian->count_pesanan_selesai();
        $config['per_page'] = 9;
        $config['uri_segment'] = 4;

        // Styling
        $config['full_tag_open'] = '<nav"><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        // Initialize pagination library
        $this->pagination->initialize($config);

        // Ambil data pesanan selesai (status = 2) dengan pagination
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data['pesanan_selesai'] = $this->Model_antrian->get_pesanan_selesai($config['per_page'], $page);
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('template_karyawan/header', $data);
        $this->load->view('template_karyawan/sidebar');
        $this->load->view('karyawan/antrian', $data);
        $this->load->view('template_karyawan/footer');
    }

    public function update_status($id, $status) {
        $this->Model_antrian->update_status($id, $status);
        redirect('karyawan/antrian');
    }

    public function detail($id_antrian) {
        $order_details = $this->Model_antrian->detail_pesanan($id_antrian);
        echo json_encode($order_details);
    }
}

?>
