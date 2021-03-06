<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLogin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mLogin');
    }


    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $data = $this->mLogin->login($username, $password);
            if ($data) {
                $id = $data->id_user;
                $level = $data->level_user;
                $this->session->set_userdata('id', $id);
                $this->session->set_flashdata('success', 'Selamat Datang Admin!');
                if ($level == '1') {
                    redirect('Supplier/cDashboard');
                } else if ($level == '2') {
                    redirect('Pabrik/cDashboard');
                } else if ($level == '3') {
                    redirect('Distributor/cDashboard');
                } else if ($level == '4') {
                    redirect('Pemilik/cLaporan');
                }
            } else {
                $this->session->set_flashdata('error', 'Username dan Password Salah!');
                redirect('clogin', 'refresh');
            }
        }
    }
    public function logout()
    {
        $data = $this->mLogin->batas_bayar();
        foreach ($data['pabrik'] as $key => $value) {
            $id_pabrik = $value->id_invoicep;
            $this->db->where('id_invoicep', $id_pabrik);
            $this->db->delete('invoice_pabrik');

            $this->db->where('id_invoicep', $id_pabrik);
            $this->db->delete('detail_invoicep');
        }

        foreach ($data['distributor'] as $key => $value) {
            $id_distr = $value->id_invoiced;
            $this->db->where('id_invoiced', $id_distr);
            $this->db->delete('invoice_distributor');

            $this->db->where('id_invoiced', $id_pabrik);
            $this->db->delete('detail_invoiced');
        }
        $this->cart->destroy();
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('level');
        $this->session->set_flashdata('success', 'Anda Anda Berhasil LogOut!');
        redirect('clogin', 'refresh');
    }
}

/* End of file cLogin.php */
