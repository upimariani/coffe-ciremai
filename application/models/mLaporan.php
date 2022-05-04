<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mLaporan extends CI_Model
{
    //laporan supplier
    public function lapS_pemesanan()
    {
        $this->db->select('*');
        $this->db->from('transaksi_pabrik');
        $this->db->join('user', 'transaksi_pabrik.id_user = user.id_user', 'left');
        return $this->db->get()->result();
    }
    public function lapS_barang_keluar()
    {
        $this->db->select('*');
        $this->db->from('transaksi_pabrik');
        $this->db->join('detail_tpabrik', 'transaksi_pabrik.id_tpabrik = detail_tpabrik.id_tpabrik', 'left');
        $this->db->join('bahan_baku', 'detail_tpabrik.id_bahan = bahan_baku.id_bahan', 'left');
        $this->db->join('user', 'user.id_user = transaksi_pabrik.id_user', 'left');
        return $this->db->get()->result();
    }
}

/* End of file mLaporan.php */
