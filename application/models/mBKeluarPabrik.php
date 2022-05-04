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
        $this->db->where('id_bahan', $id);
        $this->db->update('bahan_baku', $data);
    }
    public function select()
    {
        $this->db->select('*');
        $this->db->from('bahan_pkeluar');
        $this->db->join('bahan_baku', 'bahan_baku.id_bahan = bahan_pkeluar.id_bahan', 'left');

        return $this->db->get()->result();
    }
    public function bahan_baku()
    {
        $this->db->select('*');
        $this->db->from('bahan_baku');
        return $this->db->get()->result();
    }
}

/* End of file mBKeluarPabrik.php */
