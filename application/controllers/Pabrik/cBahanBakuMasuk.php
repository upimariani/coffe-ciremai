<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cBahanBakuMasuk extends CI_Controller
{

    public function index()
    {
        $this->load->view('Pabrik/Layout/head');
        $this->load->view('Pabrik/Layout/header');
        $this->load->view('Pabrik/bahanBakuMasuk');
        $this->load->view('Pabrik/Layout/footer');
    }
}

/* End of file cBahanBakuMasuk.php */
