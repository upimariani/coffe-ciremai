<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cTransaksiDistributor extends CI_Controller
{

    public function index()
    {
        $this->load->view('Pabrik/Layout/head');
        $this->load->view('Pabrik/Layout/header');
        $this->load->view('Pabrik/transaksiDistributor');
        $this->load->view('Pabrik/Layout/footer');
    }
}

/* End of file cTransaksiDistributor.php */
