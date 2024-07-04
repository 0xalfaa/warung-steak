<?php

class Data_menu extends CI_Controller {

    public function __construct(){
        parent::__construct();

        if($this->session->userdata('ROLE_ID') != '2'){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert"> Anda Belum Login! <button type="button" class="close" data-dissmiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('auth/login'); 
        }
    }

    public function index(){
        $data['judul'] = 'Daftar Menu';
        $data['menu'] = $this->Model_menu->getAllMenu()->result();
        $this->load->view('template_karyawan/header', $data);
        $this->load->view('template_karyawan/sidebar');
        $this->load->view('karyawan/data_menu', $data);
        $this->load->view('template_karyawan/footer');
    }

    public function tambah_aksi() {
        $NAMA_MENU = $this->input->post('NAMA_MENU', true);
        $HARGA = $this->input->post('HARGA', true);
        $STOK = $this->input->post('STOK', true);
        $config['upload_path'] = 'uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 2048; // 2MB

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('FOTO')) {
            var_dump ($this->upload->display_errors());
            
        } else {
            $data = array(
                'NAMA_MENU' => $NAMA_MENU,
                'HARGA' => $HARGA,
                'STOK' => $STOK,
                'FOTO' => $this->upload->data('file_name')
            );
    
            $this->Model_menu->tambah_menu($data, 'menu');
            $this->session->set_flashdata('menu','<div class="alert alert-success alert-dismissible fade show" role="alert"> Menu Berhasil Ditambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            redirect('karyawan/data_menu/');
        }
    }    

    public function edit_menu($id) {
        $data['judul'] = "EDIT DATA MENU";
        $where = array('ID_MENU' => $id);
        $data['menu'] = $this->Model_menu->edit_menu($where, 'menu')->result();
        $this->load->view('template_karyawan/header', $data);
        $this->load->view('template_karyawan/sidebar');
        $this->load->view('karyawan/edit_menu', $data);
        $this->load->view('template_karyawan/footer');
    }

    public function update() {
        $id = $this->input->post('ID_MENU');
        $NAMA_MENU = $this->input->post('NAMA_MENU', true);
        $HARGA = $this->input->post('HARGA', true);
        $STOK = $this->input->post('STOK', true);
        $config['upload_path'] = 'uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 2048; // 2MB

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('FOTO')) {
            var_dump ($this->upload->display_errors());
            
        } else {
            $data = array(
                'NAMA_MENU' => $NAMA_MENU,
                'HARGA' => $HARGA,
                'STOK' => $STOK,
                'FOTO' => $this->upload->data('file_name')
            );

            $where = array(
                'ID_MENU' => $id
            );
    
            $this->Model_menu->update_data($where,$data, 'menu');
            $this->session->set_flashdata('menu','<div class="alert alert-success alert-dismissible fade show" role="alert"> Menu Berhasil Diupdate!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            redirect('karyawan/data_menu/');
        }
    }  

    public function menu_hapus($id) {

        $where = array (
            'ID_MENU' => $id
        );

        $this->Model_menu->hapus_menu($where, 'menu');
        $this->session->set_flashdata('menu','<div class="alert alert-success alert-dismissible fade show" role="alert"> Menu Berhasil Dihapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
        redirect('karyawan/data_menu/');
    }
}

?>