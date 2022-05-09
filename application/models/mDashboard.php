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
        $query = $this->db->query("SELECT SUM(stokp) as stok, bahan_baku.id_bahan, nama_bahan, harga, deskripsi FROM bahan_pmasuk JOIN detail_tpabrik ON bahan_pmasuk.id_detail = detail_tpabrik.id_detail JOIN bahan_baku ON detail_tpabrik.id_bahan = bahan_baku.id_bahan GROUP BY bahan_baku.id_bahan")->result();
        return $query;
    }
    //informasi stok bahan jadi pabrik
    public function bahan_jadi()
    {
        $this->db->select('*');
        $this->db->from('bahan_jadi');
        return $this->db->get()->result();
    }

    //informasi bahan jadi distributor
    public function jadi_distributor()
    {
        $query = $this->db->query("SELECT SUM(stokd) as stok,deskripsi, harga, bahan_jadi.id_bahan_jadi, nm_bhn_jd FROM bahan_dmasuk JOIN detail_tdistributor ON bahan_dmasuk.id_detail = detail_tdistributor.id_detail JOIN transaksi_distributor ON detail_tdistributor.id_tdistributor = transaksi_distributor.id_tdistributor JOIN bahan_jadi ON detail_tdistributor.id_bahan_jadi = bahan_jadi.id_bahan_jadi WHERE id_user='" . $this->session->userdata('id') . "' GROUP BY bahan_jadi.id_bahan_jadi")->result();
        return $query;
    }
}

/* End of file mDashboard.php */
