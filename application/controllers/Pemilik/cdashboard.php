<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cdashboard extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('mDashboard');
    }

    public function index()
    {
        $data = array(
            'transaksi_bj' => $this->mDashboard->grafik()
        );
        $this->load->view('Pemilik/Layout/head');
        $this->load->view('Pemilik/Layout/header');
        $this->load->view('Pemilik/dashboard', $data);
        $this->load->view('Pemilik/Layout/footer');
    }
}

/* End of file cdashboard.php */
