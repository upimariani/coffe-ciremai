<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mBKeluarDistributor extends CI_Model
{
    public function select()
    {
        $this->db->select('*');
        $this->db->from('produk_keluardistr');
        $this->db->join('produk_masukdistr', 'produk_masukdistr.id_masukd = produk_keluardistr.id_masukd', 'left');
        $this->db->join('detail_invoiced', 'produk_masukdistr.id_detaild = detail_invoiced.id_detaild', 'left');
        $this->db->join('produk', 'produk.id_produk = detail_invoiced.id_produk', 'left');
        $this->db->join('invoice_distributor', 'detail_invoiced.id_invoiced = invoice_distributor.id_invoiced', 'left');
        $this->db->where('id_user', $this->session->userdata('id'));
        return $this->db->get()->result();
    }

    //menampilkan stok bahan jadi
    public function bahan_jadi()
    {
        $this->db->select('*');
        $this->db->from('produk_masukdistr');
        $this->db->join('detail_invoiced', 'produk_masukdistr.id_detaild = detail_invoiced.id_detaild', 'left');
        $this->db->join('produk', 'detail_invoiced.id_produk = produk.id_produk', 'left');
        $this->db->join('invoice_distributor', 'invoice_distributor.id_invoiced = detail_invoiced.id_invoiced', 'left');
        $this->db->where('id_user', $this->session->userdata('id'));

        return $this->db->get()->result();
    }
    public function insert($data)
    {
        $this->db->insert('produk_keluardistr', $data);
    }
}

/* End of file mBKeluarDistributor.php */
