<?php

class Laporan extends CI_Controller{

    public function index(){
        $data['judul'] = 'Laporan Penjualan';

        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');

        $this->_rules();

        if($this->form_validation->run() == FALSE){
            $config['base_url'] = base_url('admin/laporan/index');
            $config['total_rows'] = $this->Model_laporan->get_count_all_laporan();
            $config['per_page'] = 10; // jumlah data yang ditampilkan per halaman
            $config['uri_segment'] = 4; // uri segment untuk pagination

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

            $this->pagination->initialize($config);
            $data['start'] = $this->uri->segment(4);
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
            $data['laporan'] = $this->Model_laporan->get_all_laporan($config['per_page'], $page);
            $data['pagination'] = $this->pagination->create_links();
            $data['total_penghasilan'] = $this->Model_laporan->get_total_penghasilan(); // ambil total penghasilan
            
            $this->load->view('template_admin/header', $data);
            $this->load->view('template_admin/sidebar');
            $this->load->view('admin/filter_laporan', $data);
            $this->load->view('template_admin/footer');
        }else{
            $data['laporan'] = $this->Model_laporan->get_laporan_by_date($dari, $sampai);
            $data['total_penghasilan'] = $this->Model_laporan->get_total_penghasilan(); // ambil total penghasilan
            
            $this->load->view('template_admin/header', $data);
            $this->load->view('template_admin/sidebar');
            $this->load->view('admin/tampilkan_laporan', $data);
            $this->load->view('template_admin/footer');
        }
    }

    public function print_laporan(){
        $data['judul'] = "Print Laporan Transaksi";
        $dari = $this->input->get('dari');
        $sampai = $this->input->get('sampai');
        $data['laporan'] = $this->Model_laporan->get_laporan_by_date($dari, $sampai);
        $data['total_penghasilan'] = $this->Model_laporan->get_total_penghasilan(); // ambil total penghasilan
        
        $this->load->view('template_admin/header', $data);
        $this->load->view('admin/print_laporan', $data);
    }

    public function _rules(){
        $this->form_validation->set_rules('dari','Dari Tanggal','required');
        $this->form_validation->set_rules('sampai','Sampai Tanggal','required');
    }
}

?>
