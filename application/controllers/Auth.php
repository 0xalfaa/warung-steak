<?php

class Auth extends CI_Controller {

    public function login(){

        $data['judul'] = 'Login';

        $this->_rules();

        if($this->form_validation->run() == FALSE) {
            $this->load->view('template_admin/header', $data);
            $this->load->view('login');
            $this->load->view('template_admin/footer');
        }else{
            $USERNAME = $this->input->post('USERNAME');
            $PASSWORD = md5($this->input->post('PASSWORD'));

            $cek = $this->Model_login->cek_login($USERNAME, $PASSWORD);

            if($cek == FALSE){
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert"> Username atau Password Salah!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button></div>');
                redirect('auth/login/');
            }else{
                $this->session->set_userdata('ID_KARYAWAN', $cek->ID_KARYAWAN);  // Simpan ID_KARYAWAN dalam session
                $this->session->set_userdata('USERNAME', $cek->USERNAME);
                $this->session->set_userdata('ROLE_ID', $cek->ROLE_ID);
                $this->session->set_userdata('NAMA_KARYAWAN', $cek->NAMA_KARYAWAN);

                switch ($cek->ROLE_ID){
                    case 1 :    redirect('admin/dashboard');
                                break;
                    case 2 :    redirect('karyawan/dashboard');
                                break;

                    default :   break;
                }
            }

        }

    }

    public function _rules(){
        $this->form_validation->set_rules('USERNAME','Username','required');
        $this->form_validation->set_rules('PASSWORD','Password','required');
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('auth/login/');
    }
}

?>
