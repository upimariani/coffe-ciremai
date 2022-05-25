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
        $this->db->where('id_bahanbaku', $id);
        return $this->db->get()->row();
    }
    public function update($id, $data)
    {
        $this->db->where('id_bahanbaku', $id);
        $this->db->update('bahan_baku', $data);
    }
    public function delete($id)
    {
        $this->db->where('id_bahanbaku', $id);
        $this->db->delete('bahan_baku');
    }

    //informasi bahan baku pabrik
    public function bahan_baku()
    {
        $query = $this->db->query('SELECT SUM(stokp) as stok, detail_invoicep.id_bahanbaku, nm_bahanbaku FROM `bb_masukpabrik` JOIN detail_invoicep ON bb_masukpabrik.id_detailp = detail_invoicep.id_detailp JOIN bahan_baku ON detail_invoicep.id_bahanbaku = bahan_baku.id_bahanbaku GROUP BY detail_invoicep.id_bahanbaku')->result();
        return $query;
    }
}

/* End of file mBahanBaku.php */
