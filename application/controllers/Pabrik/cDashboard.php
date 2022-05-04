<?php

defined('BASEPATH') or exit('No direct script access allowed');

class cDashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mBahanBaku');
        $this->load->model('mBahanJadi');
    }

    public function index()
    {
        $data = array(
            'bahan_baku' => $this->mBahanBaku->select(),
            'bahan_jadi' => $this->mBahanJadi->select()
        );
        $this->load->view('Pabrik/Layout/head');
        $this->load->view('Pabrik/Layout/header');
        $this->load->view('Pabrik/dashboard', $data);
        $this->load->view('Pabrik/Layout/footer');
    }
}

/* End of file cDashboard.php */
