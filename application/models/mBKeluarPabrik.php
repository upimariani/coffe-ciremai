<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mBKeluarPabrik extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert('bb_keluarpabrik', $data);
    }
    //update stok barang masuk
    public function update_stok($id, $data)
    {
        $this->db->where('id_bbmasukp', $id);
        $this->db->update('bb_masukpabrik', $data);
    }
    //update stok bahan jadi
    public function stok_bj($id, $data)
    {
        $this->db->where('id_produk', $id);
        $this->db->update('produk', $data);
    }
    public function select()
    {
        $this->db->select('*');
        $this->db->from('bb_keluarpabrik');
        $this->db->join('bb_masukpabrik', 'bb_keluarpabrik.id_bbmasukp = bb_masukpabrik.id_bbmasukp', 'left');
        $this->db->join('detail_invoicep', 'bb_masukpabrik.id_detailp = detail_invoicep.id_detailp', 'left');
        $this->db->join('bahan_baku', 'bahan_baku.id_bahanbaku = detail_invoicep.id_bahanbaku', 'left');

        return $this->db->get()->result();
    }
    public function bahan_baku()
    {
        $this->db->select('*');
        $this->db->from('bb_masukpabrik');
        $this->db->join('detail_invoicep', 'bb_masukpabrik.id_detailp = detail_invoicep.id_detailp', 'left');
        $this->db->join('bahan_baku', 'detail_invoicep.id_bahanbaku = bahan_baku.id_bahanbaku', 'left');
        $this->db->where('stokp!=0');
        return $this->db->get()->result();
    }
    public function bahan_jadi()
    {
        $this->db->select('*');
        $this->db->from('produk');
        return $this->db->get()->result();
    }
}

/* End of file mBKeluarPabrik.php */
