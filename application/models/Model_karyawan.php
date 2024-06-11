<?php

class Model_karyawan extends CI_model {

    public function getAllKaryawan(){

        return $this->db->get('karyawan');
    }

    public function tambah_karyawan($data,$table){

        $this->db->insert($table,$data);
    }

    public function edit_karyawan($where,$table){

        return $this->db->get_where($table,$where);
     }
 
     public function update_karyawan($where,$data,$table) {
 
         $this->db->where($where);
         $this->db->update($table,$data);
     }
 
     public function hapus_karyawan($where,$table){
         $this->db->where($where);
         $this->db->delete($table);
     }

}