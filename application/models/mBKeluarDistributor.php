<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mBKeluarDistributor extends CI_Model
{
    public function select()
    {
        $this->db->select('*');
        $this->db->from('bahan_dkeluar');
        $this->db->join('bahan_dmasuk', 'bahan_dmasuk.id_dmasuk = bahan_dkeluar.id_dmasuk', 'left');
        $this->db->join('detail_tdistributor', 'bahan_dmasuk.id_detail = detail_tdistributor.id_detail', 'left');
        $this->db->join('bahan_jadi', 'bahan_jadi.id_bahan_jadi = detail_tdistributor.id_bahan_jadi', 'left');
        $this->db->join('transaksi_distributor', 'detail_tdistributor.id_tdistributor = transaksi_distributor.id_tdistributor', 'left');
        $this->db->where('id_user', $this->session->userdata('id'));
        return $this->db->get()->result();
    }

    //menampilkan stok bahan jadi
    public function bahan_jadi()
    {
        $this->db->select('*');
        $this->db->from('bahan_dmasuk');
        $this->db->join('detail_tdistributor', 'bahan_dmasuk.id_detail = detail_tdistributor.id_detail', 'left');
        $this->db->join('bahan_jadi', 'detail_tdistributor.id_bahan_jadi = bahan_jadi.id_bahan_jadi', 'left');
        $this->db->join('transaksi_distributor', 'transaksi_distributor.id_tdistributor = detail_tdistributor.id_tdistributor', 'left');
        $this->db->where('id_user', $this->session->userdata('id'));

        return $this->db->get()->result();
    }
    public function insert($data)
    {
        $this->db->insert('bahan_dkeluar', $data);
    }
}

/* End of file mBKeluarDistributor.php */
