<?php
class Model_laporan extends CI_Model {

    public function get_all_laporan($limit, $start) {
        $query = $this->db->query(
            "SELECT a.TANGGAL, m.NAMA_MENU, p.HARGA, p.JUMLAH, (p.HARGA * p.JUMLAH) AS TOTAL, k.NAMA_KARYAWAN 
            FROM pesanan p 
            JOIN antrian a ON p.ID_ANTRIAN = a.ID_ANTRIAN 
            JOIN menu m ON p.ID_MENU = m.ID_MENU 
            JOIN karyawan k ON a.ID_KARYAWAN = k.ID_KARYAWAN
            ORDER BY a.TANGGAL DESC
            LIMIT $start, $limit"
        );
        return $query->result();
    }

    public function get_count_all_laporan() {
        $query = $this->db->query(
            "SELECT COUNT(*) as count 
            FROM pesanan p 
            JOIN antrian a ON p.ID_ANTRIAN = a.ID_ANTRIAN 
            JOIN menu m ON p.ID_MENU = m.ID_MENU 
            JOIN karyawan k ON a.ID_KARYAWAN = k.ID_KARYAWAN"
        );
        return $query->row()->count;
    }

    public function get_total_penghasilan() {
        $query = $this->db->query(
            "SELECT SUM(p.HARGA * p.JUMLAH) AS total_penghasilan 
            FROM pesanan p 
            JOIN antrian a ON p.ID_ANTRIAN = a.ID_ANTRIAN 
            JOIN menu m ON p.ID_MENU = m.ID_MENU 
            JOIN karyawan k ON a.ID_KARYAWAN = k.ID_KARYAWAN"
        );
        return $query->row()->total_penghasilan;
    }

    public function get_laporan_by_date($dari, $sampai) {
        $query = $this->db->query(
            "SELECT a.TANGGAL, m.NAMA_MENU, p.HARGA, p.JUMLAH, (p.HARGA * p.JUMLAH) AS TOTAL, k.NAMA_KARYAWAN 
            FROM pesanan p 
            JOIN antrian a ON p.ID_ANTRIAN = a.ID_ANTRIAN 
            JOIN menu m ON p.ID_MENU = m.ID_MENU 
            JOIN karyawan k ON a.ID_KARYAWAN = k.ID_KARYAWAN 
            WHERE DATE(a.TANGGAL) >= '$dari' AND DATE(a.TANGGAL) <= '$sampai'
            ORDER BY a.TANGGAL DESC"
        );
        return $query->result();
    }

}

?>
