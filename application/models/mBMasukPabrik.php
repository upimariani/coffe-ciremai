<?php

defined('BASEPATH') or exit('No direct script access allowed');

class mBMasukPabrik extends CI_Model
{
    public function select()
    {
        $this->db->select('*');
        $this->db->from('bb_masukpabrik');
        $this->db->join('detail_invoicep', 'bb_masukpabrik.id_detailp = detail_invoicep.id_detailp', 'left');
        $this->db->join('bahan_baku', 'detail_invoicep.id_bahanbaku = bahan_baku.id_bahanbaku', 'left');
        return $this->db->get()->result();
    }
}

/* End of file mBMasukPabrik.php */
