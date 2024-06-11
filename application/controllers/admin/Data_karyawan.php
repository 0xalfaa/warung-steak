<?php

class Data_karyawan extends CI_Controller {

    public function __construct(){
        parent::__construct();

        if($this->session->userdata('ROLE_ID') != '1'){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert"> Anda Belum Login! <button type="button" class="close" data-dissmiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('auth/login'); 
        }
    }

    public function index(){
        $data['judul'] = 'Data Karyawan';
        $data['karyawan'] = $this->Model_karyawan->getAllKaryawan()->result();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/data_karyawan', $data);
        $this->load->view('template_admin/footer');
    }

    public function tambah_aksi() {
        $NAMA_KARYAWAN = $this->input->post('NAMA_KARYAWAN', true);
        $USERNAME = $this->input->post('USERNAME', true);
        $NO_HP_KARYAWAN = $this->input->post('NO_HP_KARYAWAN', true);
        $PASSWORD = md5($this->input->post('PASSWORD', true));
        $ROLE_ID = 2;
        $data = array(
                'NAMA_KARYAWAN' => $NAMA_KARYAWAN,
                'USERNAME' => $USERNAME,
                'NO_HP_KARYAWAN' => $NO_HP_KARYAWAN,
                'PASSWORD' => $PASSWORD,
                'ROLE_ID' => $ROLE_ID
            );

            $this->Model_karyawan->tambah_karyawan($data, 'karyawan');
            $this->session->set_flashdata('karyawan','<div class="alert alert-success alert-dismissible fade show" role="alert"> Data Karyawan Berhasil Ditambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/data_karyawan/');
        }
        

    public function edit_karyawan($id) {
         $data['judul'] = "EDIT DATA KARYAWAN";
         $where = array('ID_KARYAWAN' => $id);
         $data['karyawan'] = $this->Model_karyawan->edit_karyawan($where, 'karyawan')->result();
         $this->load->view('template_admin/header', $data);
         $this->load->view('template_admin/sidebar');
         $this->load->view('admin/edit_karyawan', $data);
         $this->load->view('template_admin/footer');
    }

    public function update() {
        $id = $this->input->post('ID_KARYAWAN');
        $NAMA_KARYAWAN = $this->input->post('NAMA_KARYAWAN', true);
        $USERNAME = $this->input->post('USERNAME', true);
        $NO_HP_KARYAWAN = $this->input->post('NO_HP_KARYAWAN', true);
        $PASSWORD = md5($this->input->post('PASSWORD', true));
        $data = array(
            'NAMA_KARYAWAN' => $NAMA_KARYAWAN,
            'USERNAME' => $USERNAME,
            'NO_HP_KARYAWAN' => $NO_HP_KARYAWAN,
            'PASSWORD' => $PASSWORD
            );

        $where = array(
            'ID_KARYAWAN' => $id
        );
        
        $this->Model_karyawan->update_karyawan($where,$data, 'karyawan');
        $this->session->set_flashdata('karyawan','<div class="alert alert-success alert-dismissible fade show" role="alert"> Data Karyawan Berhasil Diupdate!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/data_karyawan/');
    }

    public function hapus_karyawan($id) {

        $where = array (
            'ID_KARYAWAN' => $id
        );

        $this->Model_karyawan->hapus_karyawan($where, 'karyawan');
        $this->session->set_flashdata('karyawan','<div class="alert alert-danger alert-dismissible fade show" role="alert"> Data Karyawan Berhasil Dihapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/data_karyawan/');
    }

}
?>
