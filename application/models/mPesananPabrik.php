<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mPesananPabrik extends CI_Model
{

    //query untuk bagian pabrik
    public function pesanan()
    {
        $this->db->select('*');
        $this->db->from('transaksi_pabrik');
        $this->db->join('user', 'transaksi_pabrik.id_user = user.id_user', 'left');
        $this->db->where('user.id_user', $this->session->userdata('id'));
        return $this->db->get()->result();
    }
    public function detail_pesanan($id)
    {
        $data['pesanan'] = $this->db->query("SELECT * FROM `transaksi_pabrik` JOIN detail_tpabrik ON transaksi_pabrik.id_tpabrik = detail_tpabrik.id_tpabrik JOIN bahan_baku ON detail_tpabrik.id_bahan = bahan_baku.id_bahan WHERE transaksi_pabrik.id_tpabrik='" . $id . "'")->result();
        $data['transaksi'] = $this->db->query("SELECT * FROM `transaksi_pabrik` JOIN user ON transaksi_pabrik.id_user=user.id_user WHERE id_tpabrik='" . $id . "'")->row();
        return $data;
    }

    //query pada bagian supplier
    public function transaksi()
    {
        $this->db->select('*');
        $this->db->from('transaksi_pabrik');
        $this->db->join('user', 'transaksi_pabrik.id_user = user.id_user', 'left');
        return $this->db->get()->result();
    }
}

/* End of file mPesananPabrik.php */
