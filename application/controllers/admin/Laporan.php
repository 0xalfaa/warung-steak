<?php

class Laporan extends CI_Controller{

    public function index(){
        $data['judul'] = 'Laporan Penjualan';

        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');

        $this->_rules();

        if($this->form_validation->run() == FALSE){
            // Jika form belum disubmit, tampilkan semua data
            $data['laporan'] = $this->Model_laporan->get_all_laporan();
            
            $this->load->view('template_admin/header', $data);
            $this->load->view('template_admin/sidebar');
            $this->load->view('admin/filter_laporan', $data);
            $this->load->view('template_admin/footer');
        }else{
            // Jika form disubmit, filter data berdasarkan tanggal
            $data['laporan'] = $this->Model_laporan->get_laporan_by_date($dari, $sampai);
            
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
        
        $this->load->view('template_admin/header', $data);
        $this->load->view('admin/print_laporan', $data);
    }

    public function _rules(){
        $this->form_validation->set_rules('dari','Dari Tanggal','required');
        $this->form_validation->set_rules('sampai','Sampai Tanggal','required');
    }
}
?>
