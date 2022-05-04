<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLaporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mLaporan');
    }

    //laporan supplier
    public function index()
    {
        $data = array(
            'transaksi' => $this->mLaporan->lapS_pemesanan()
        );
        $this->load->view('Supplier/Layout/head');
        $this->load->view('Supplier/Layout/header');
        $this->load->view('Supplier/lap_transaksi', $data);
        $this->load->view('Supplier/Layout/footer');
    }
}

/* End of file cLaporan.php */
