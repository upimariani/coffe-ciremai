<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mBahanJadi extends CI_Model
{
    public function select()
    {
        $this->db->select('*');
        $this->db->from('bahan_jadi');
        return $this->db->get()->result();
    }
    public function insert($data)
    {
        $this->db->insert('bahan_jadi', $data);
    }
    public function edit($id)
    {
        $this->db->select('*');
        $this->db->from('bahan_jadi');
        $this->db->where('id_bahan_jadi', $id);
        return $this->db->get()->row();
    }
    public function update($id, $data)
    {
        $this->db->where('id_bahan_jadi', $id);
        $this->db->update('bahan_jadi', $data);
    }
    public function delete($id)
    {
        $this->db->where('id_bahan_jadi', $id);
        $this->db->delete('bahan_jadi');
    }
}

/* End of file mBahanJadi.php */
