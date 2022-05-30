<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mLogin extends CI_Model
{
    public function login($username, $password)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where(array(
            'username' => $username,
            'password' => $password
        ));
        return $this->db->get()->row();
    }
    //cek batas pembayaran
    public function batas_bayar()
    {
        $data['distributor'] = $this->db->query("SELECT * FROM `invoice_distributor` WHERE bts_bayard <= '" . date('Y-m-d') . "'AND status_orderdistr='0'")->result();
        $data['pabrik'] = $this->db->query("SELECT * FROM `invoice_pabrik` WHERE bts_bayarp <= '" . date('Y-m-d') . "'AND status_orderpabrik='0'")->result();
        return $data;
    }
}

/* End of file mLogin.php */
