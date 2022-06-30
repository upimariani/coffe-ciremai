<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mDashboard extends CI_Model
{
    //informasi bahan baku supplier
    public function bahan_baku()
    {
        $this->db->select('*');
        $this->db->from('bahan_baku');
        $this->db->where('id_user', $this->session->userdata('id'));
        return $this->db->get()->result();
    }

    //informasi stok bahan baku pabrik
    public function baku_pabrik()
    {
        $query = $this->db->query("SELECT SUM(stokp) as stok, bahan_baku.id_bahanbaku, nm_bahanbaku, harga_bb, deskripsi_bb FROM bb_masukpabrik JOIN detail_invoicep ON bb_masukpabrik.id_detailp = detail_invoicep.id_detailp JOIN bahan_baku ON detail_invoicep.id_bahanbaku = bahan_baku.id_bahanbaku GROUP BY bahan_baku.id_bahanbaku")->result();
        return $query;
    }
    //informasi stok bahan jadi pabrik
    public function bahan_jadi()
    {
        $this->db->select('*');
        $this->db->from('produk');
        return $this->db->get()->result();
    }

    //informasi bahan jadi distributor
    public function jadi_distributor()
    {
        $query = $this->db->query("SELECT SUM(stokd) as stok,deskripsi, harga, produk.id_produk, nm_produk FROM produk_masukdistr JOIN detail_invoiced ON produk_masukdistr.id_detaild = detail_invoiced.id_detaild JOIN invoice_distributor ON detail_invoiced.id_invoiced = invoice_distributor.id_invoiced JOIN produk ON detail_invoiced.id_produk = produk.id_produk WHERE id_user='" . $this->session->userdata('id') . "' GROUP BY produk.id_produk")->result();
        return $query;
    }


    //grafik pemilik
    public function grafik()
    {
        $this->db->select('SUM(total_bayardistr) as total, tgl_orderdistr');
        $this->db->from('invoice_distributor');
        $this->db->group_by('tgl_orderdistr');
        $this->db->where('status_orderdistr=4');
        return $this->db->get()->result();
    }
}

/* End of file mDashboard.php */
