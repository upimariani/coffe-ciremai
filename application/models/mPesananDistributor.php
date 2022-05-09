<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mPesananDistributor extends CI_Model
{
    //menampilkan bahan jadi
    public function bahan_jadi()
    {
        $this->db->select('*');
        $this->db->from('bahan_jadi');
        $this->db->where('stok!=0');
        return $this->db->get()->result();
    }
    public function pesanan()
    {
        $this->db->select('*');
        $this->db->from('transaksi_distributor');
        $this->db->join('user', 'transaksi_distributor.id_user = user.id_user', 'left');
        $this->db->where('user.id_user', $this->session->userdata('id'));
        return $this->db->get()->result();
    }
    public function detail_pesanan($id)
    {
        $data['pesanan'] = $this->db->query("SELECT * FROM transaksi_distributor JOIN detail_tdistributor ON transaksi_distributor.id_tdistributor = detail_tdistributor.id_tdistributor JOIN bahan_jadi ON bahan_jadi.id_bahan_jadi = detail_tdistributor.id_bahan_jadi WHERE transaksi_distributor.id_tdistributor='" . $id . "'")->result();
        $data['transaksi'] = $this->db->query("SELECT * FROM transaksi_distributor JOIN user ON transaksi_distributor.id_user=user.id_user WHERE id_tdistributor='" . $id . "'")->row();
        return $data;
    }
    public function transaksi()
    {
        $this->db->select('*');
        $this->db->from('transaksi_distributor');
        $this->db->join('user', 'transaksi_distributor.id_user = user.id_user', 'left');
        return $this->db->get()->result();
    }
}

/* End of file mPesananDistributor.php */
