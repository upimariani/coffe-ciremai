<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cBahanBakuKeluar extends CI_Controller
{

    public function index()
    {
        $this->load->view('Pabrik/Layout/head');
        $this->load->view('Pabrik/Layout/header');
        $this->load->view('Pabrik/bahanBakuKeluar');
        $this->load->view('Pabrik/Layout/footer');
    }
}

/* End of file cBahanBakuKeluar.php */
