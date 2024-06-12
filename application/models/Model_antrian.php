<?php
class Model_antrian extends CI_Model {

    public function index() {
        date_default_timezone_set('Asia/Jakarta');
        $NAMA = $this->input->post('NAMA');
        $NO_MEJA = $this->input->post('NO_MEJA');

        // Mendapatkan ID_KARYAWAN dari session
        $ID_KARYAWAN = $this->session->userdata('ID_KARYAWAN');
        
        $antrian = array(
            'NAMA'      => $NAMA,
            'NO_MEJA'   => $NO_MEJA,
            'TANGGAL'   => date('Y-m-d H:i:s'),
            'STATUS'    => 0,
            'ID_KARYAWAN' => $ID_KARYAWAN
        );

        $this->db->insert('antrian', $antrian);
        $ID_ANTRIAN = $this->db->insert_id();

        foreach ($this->cart->contents() as $item) {
            $data = array(
                'ID_ANTRIAN' => $ID_ANTRIAN,
                'ID_MENU'    => $item['id'],
                'NAMA_MENU'  => $item['name'],
                'JUMLAH'     => $item['qty'],
                'HARGA'      => $item['price']
            );
            $this->db->insert('pesanan', $data);
        }

        return TRUE;
    }

    public function tampil_data() {
        $this->db->order_by('TANGGAL', 'ASC');
        $result = $this->db->get('antrian');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function update_status($id, $status) {
        $this->db->where('ID_ANTRIAN', $id);
        $this->db->update('antrian', array('STATUS' => $status));
    }

    public function detail_pesanan($id_antrian) {
        $this->db->select('NAMA_MENU, JUMLAH, HARGA, (JUMLAH * HARGA) as SUBTOTAL');
        $this->db->from('pesanan');
        $this->db->where('ID_ANTRIAN', $id_antrian);
        $query = $this->db->get();
        return $query->result();
    }
    
}
?>
