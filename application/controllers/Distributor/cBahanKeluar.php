<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cBahanKeluar extends CI_Controller
{

    public function index()
    {
        $this->load->view('Distributor/Layout/head');
        $this->load->view('Distributor/Layout/header');
        $this->load->view('Distributor/bahanKeluar');
        $this->load->view('Distributor/Layout/footer');
    }
}

/* End of file cBahanKeluar.php */
