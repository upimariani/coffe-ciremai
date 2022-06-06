<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mPesananPabrik extends CI_Model
{
    //query menampilkan supplier pada pilih supplier
    public function supplier()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('level_user=1');
        return $this->db->get()->result();
    }
    //menampilkan bahan baku supplier per pilihan supllier
    public function bahan_baku($id)
    {
        $this->db->select('*');
        $this->db->from('bahan_baku');
        $this->db->where('id_user', $id);
        return $this->db->get()->result();
    }
    //query untuk bagian pabrik
    public function pesanan()
    {
        $this->db->select('*');
        $this->db->from('invoice_pabrik');
        $this->db->join('user', 'invoice_pabrik.id_user = user.id_user', 'left');
        $this->db->where('user.id_user', $this->session->userdata('id'));
        return $this->db->get()->result();
    }
    public function detail_pesanan($id)
    {
        $data['pesanan'] = $this->db->query("SELECT * FROM `invoice_pabrik` JOIN detail_invoicep ON invoice_pabrik.id_invoicep = detail_invoicep.id_invoicep JOIN bahan_baku ON detail_invoicep.id_bahanbaku = bahan_baku.id_bahanbaku WHERE invoice_pabrik.id_invoicep='" . $id . "'")->result();
        $data['transaksi'] = $this->db->query("SELECT * FROM `invoice_pabrik` JOIN user ON invoice_pabrik.id_user=user.id_user WHERE id_invoicep='" . $id . "'")->row();

        //detail supplier
        $data['supplier'] = $this->db->query("SELECT * FROM `invoice_pabrik` JOIN user ON invoice_pabrik.supplier = user.id_user WHERE id_invoicep='" . $id . "'")->row();
        return $data;
    }

    //query pada bagian supplier
    public function transaksi()
    {
        $this->db->select('*');
        $this->db->from('invoice_pabrik');
        $this->db->join('user', 'invoice_pabrik.id_user = user.id_user', 'left');
        $this->db->where('supplier', $this->session->userdata('id'));
        return $this->db->get()->result();
    }
}

/* End of file mPesananPabrik.php */
