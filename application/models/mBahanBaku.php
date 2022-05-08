<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mBahanBaku extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert('bahan_baku', $data);
    }
    public function select()
    {
        $this->db->select('*');
        $this->db->from('bahan_baku');
        $this->db->where('id_user', $this->session->userdata('id'));
        return $this->db->get()->result();
    }
    public function edit($id)
    {
        $this->db->select('*');
        $this->db->from('bahan_baku');
        $this->db->where('id_bahan', $id);
        return $this->db->get()->row();
    }
    public function update($id, $data)
    {
        $this->db->where('id_bahan', $id);
        $this->db->update('bahan_baku', $data);
    }
    public function delete($id)
    {
        $this->db->where('id_bahan', $id);
        $this->db->delete('bahan_baku');
    }

    //informasi bahan baku pabrik
    public function bahan_baku()
    {
        $query = $this->db->query('SELECT SUM(stokp) as stok, detail_tpabrik.id_bahan, nama_bahan FROM `bahan_pmasuk` JOIN detail_tpabrik ON bahan_pmasuk.id_detail = detail_tpabrik.id_detail JOIN bahan_baku ON detail_tpabrik.id_bahan = bahan_baku.id_bahan GROUP BY detail_tpabrik.id_bahan')->result();
        return $query;
    }
}

/* End of file mBahanBaku.php */
