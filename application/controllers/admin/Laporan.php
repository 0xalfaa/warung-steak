<?php

class Laporan extends CI_Controller{

    public function index(){
        $data['judul'] = 'Laporan Penjualan';

        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');

        $this->_rules();

        if($this->form_validation->run() == FALSE){
            // Jika form belum disubmit, tampilkan semua data
            $data['laporan'] = $this->db->query(
                "SELECT a.TANGGAL, m.NAMA_MENU, p.HARGA, p.JUMLAH, (p.HARGA * p.JUMLAH) AS TOTAL, k.NAMA_KARYAWAN 
                FROM pesanan p 
                JOIN antrian a ON p.ID_ANTRIAN = a.ID_ANTRIAN 
                JOIN menu m ON p.ID_MENU = m.ID_MENU 
                JOIN karyawan k ON a.ID_KARYAWAN = k.ID_KARYAWAN"
            )->result();
            
            $this->load->view('template_admin/header', $data);
            $this->load->view('template_admin/sidebar');
            $this->load->view('admin/filter_laporan', $data);
            $this->load->view('template_admin/footer');
        }else{
            // Jika form disubmit, filter data berdasarkan tanggal
            $data['laporan'] = $this->db->query(
                "SELECT a.TANGGAL, m.NAMA_MENU, p.HARGA, p.JUMLAH, (p.HARGA * p.JUMLAH) AS TOTAL, k.NAMA_KARYAWAN 
                FROM pesanan p 
                JOIN antrian a ON p.ID_ANTRIAN = a.ID_ANTRIAN 
                JOIN menu m ON p.ID_MENU = m.ID_MENU 
                JOIN karyawan k ON a.ID_KARYAWAN = k.ID_KARYAWAN 
                WHERE DATE(a.TANGGAL) >= '$dari' AND DATE(a.TANGGAL) <= '$sampai'"
            )->result();
            
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
        $data['laporan'] = $this->db->query(
            "SELECT a.TANGGAL, m.NAMA_MENU, p.HARGA, p.JUMLAH, (p.HARGA * p.JUMLAH) AS TOTAL, k.NAMA_KARYAWAN 
            FROM pesanan p 
            JOIN antrian a ON p.ID_ANTRIAN = a.ID_ANTRIAN 
            JOIN menu m ON p.ID_MENU = m.ID_MENU 
            JOIN karyawan k ON a.ID_KARYAWAN = k.ID_KARYAWAN 
            WHERE DATE(a.TANGGAL) >= '$dari' AND DATE(a.TANGGAL) <= '$sampai'"
        )->result();
        $this->load->view('template_admin/header', $data);
        $this->load->view('admin/print_laporan', $data);

    }

    public function _rules(){
        $this->form_validation->set_rules('dari','Dari Tanggal','required');
        $this->form_validation->set_rules('sampai','Sampai Tanggal','required');
    }
}
?>
