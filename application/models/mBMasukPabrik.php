<?php

defined('BASEPATH') or exit('No direct script access allowed');

class mBMasukPabrik extends CI_Model
{
    public function select()
    {
        $this->db->select('*');
        $this->db->from('bahan_pmasuk');
        $this->db->join('detail_tpabrik', 'bahan_pmasuk.id_detail = detail_tpabrik.id_detail', 'left');
        $this->db->join('bahan_baku', 'detail_tpabrik.id_bahan = bahan_baku.id_bahan', 'left');
        return $this->db->get()->result();
    }
}

/* End of file mBMasukPabrik.php */
