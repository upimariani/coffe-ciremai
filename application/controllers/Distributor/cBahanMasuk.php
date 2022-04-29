<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cBahanMasuk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mBMasukDistributor');
    }


    public function index()
    {
        $data = array(
            'masuk' => $this->mBMasukDistributor->select()
        );
        $this->load->view('Distributor/Layout/head');
        $this->load->view('Distributor/Layout/header');
        $this->load->view('Distributor/bahanMasuk', $data);
        $this->load->view('Distributor/Layout/footer');
    }
}

/* End of file cBahanMasuk.php */
