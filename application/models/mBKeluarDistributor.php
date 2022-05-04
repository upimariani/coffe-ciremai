<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mBKeluarDistributor extends CI_Model
{
    public function select()
    {
        $this->db->select('*');
        $this->db->from('bahan_dkeluar');
        $this->db->join('bahan_jadi', 'bahan_jadi.id_bahan_jadi = bahan_dkeluar.id_bahan_jadi', 'left');
        return $this->db->get()->result();
    }

    public function bahan_jadi()
    {
        $this->db->select('*');
        $this->db->from('bahan_jadi');
        $this->db->where('stok_distributor!=0');
        return $this->db->get()->result();
    }
    public function insert($data)
    {
        $this->db->insert('bahan_dkeluar', $data);
    }
}

/* End of file mBKeluarDistributor.php */
