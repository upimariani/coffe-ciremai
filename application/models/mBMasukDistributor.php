<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mBMasukDistributor extends CI_Model
{
    public function select()
    {
        $this->db->select('*');
        $this->db->from('produk_masukdistr');
        $this->db->join('detail_invoiced', 'produk_masukdistr.id_detaild = detail_invoiced.id_detaild', 'left');
        $this->db->join('invoice_distributor', 'detail_invoiced.id_invoiced = invoice_distributor.id_invoiced', 'left');
        $this->db->join('produk', 'detail_invoiced.id_produk = produk.id_produk', 'left');
        $this->db->where('id_user', $this->session->userdata('id'));
        return $this->db->get()->result();
    }
}

/* End of file mBMasukDistributor.php */
