<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mPesananDistributor extends CI_Model
{
    //menampilkan bahan jadi
    public function bahan_jadi()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->where('stok!=0');
        return $this->db->get()->result();
    }
    public function pesanan()
    {
        $this->db->select('*');
        $this->db->from('invoice_distributor');
        $this->db->join('user', 'invoice_distributor.id_user = user.id_user', 'left');
        $this->db->where('user.id_user', $this->session->userdata('id'));
        return $this->db->get()->result();
    }
    public function detail_pesanan($id)
    {
        $data['pesanan'] = $this->db->query("SELECT * FROM invoice_distributor JOIN detail_invoiced ON invoice_distributor.id_invoiced = detail_invoiced.id_invoiced JOIN produk ON produk.id_produk = detail_invoiced.id_produk WHERE invoice_distributor.id_invoiced='" . $id . "'")->result();
        $data['transaksi'] = $this->db->query("SELECT * FROM invoice_distributor JOIN user ON invoice_distributor.id_user=user.id_user WHERE id_invoiced='" . $id . "'")->row();
        return $data;
    }
    public function transaksi()
    {
        $this->db->select('*');
        $this->db->from('invoice_distributor');
        $this->db->join('user', 'invoice_distributor.id_user = user.id_user', 'left');
        return $this->db->get()->result();
    }
}

/* End of file mPesananDistributor.php */
