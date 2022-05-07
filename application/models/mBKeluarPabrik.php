<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mBKeluarPabrik extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert('bahan_pkeluar', $data);
    }
    //update stok barang masuk
    public function update_stok($id, $data)
    {
        $this->db->where('id_pmasuk', $id);
        $this->db->update('bahan_pmasuk', $data);
    }
    //update stok bahan jadi
    public function stok_bj($id, $data)
    {
        $this->db->where('id_bahan_jadi', $id);
        $this->db->update('bahan_jadi', $data);
    }
    public function select()
    {
        $this->db->select('*');
        $this->db->from('bahan_pkeluar');
        $this->db->join('bahan_pmasuk', 'bahan_pkeluar.id_pmasuk = bahan_pmasuk.id_pmasuk', 'left');
        $this->db->join('detail_tpabrik', 'bahan_pmasuk.id_detail = detail_tpabrik.id_detail', 'left');
        $this->db->join('bahan_baku', 'bahan_baku.id_bahan = detail_tpabrik.id_bahan', 'left');
        $this->db->join('bahan_jadi', 'bahan_pkeluar.id_bahan_jadi = bahan_jadi.id_bahan_jadi', 'left');

        return $this->db->get()->result();
    }
    public function bahan_baku()
    {
        $this->db->select('*');
        $this->db->from('bahan_pmasuk');
        $this->db->join('detail_tpabrik', 'bahan_pmasuk.id_detail = detail_tpabrik.id_detail', 'left');
        $this->db->join('bahan_baku', 'detail_tpabrik.id_bahan = bahan_baku.id_bahan', 'left');
        $this->db->where('stokp!=0');
        return $this->db->get()->result();
    }
}

/* End of file mBKeluarPabrik.php */
