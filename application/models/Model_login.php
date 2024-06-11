<?php

 class Model_login extends CI_Model {

    public function cek_login() {

        $USERNAME = set_value('USERNAME');
        $PASSWORD = set_value('PASSWORD');

        $result = $this->db
                        ->where('USERNAME',$USERNAME)
                        ->where('PASSWORD',MD5($PASSWORD))
                        ->limit(1) 
                        ->get('KARYAWAN');

        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return FALSE;
        }
    }
}
?>