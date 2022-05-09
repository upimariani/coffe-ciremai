<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cBahanBaku extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mBahanBaku');
    }

    public function index()
    {
        $this->protect->protect();
        $data = array(
            'stok' => $this->mBahanBaku->bahan_baku()
        );
        $this->load->view('Pabrik/Layout/head');
        $this->load->view('Pabrik/Layout/header');
        $this->load->view('Pabrik/bahanBaku', $data);
        $this->load->view('Pabrik/Layout/footer');
    }
}

/* End of file cBahan.php */
