<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cDashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mDashboard');
    }

    public function index()
    {
        $data = array(
            'bahan_baku' => $this->mDashboard->bahan_baku()
        );
        $this->load->view('Supplier/Layout/head');
        $this->load->view('Supplier/Layout/header');
        $this->load->view('Supplier/dashboard', $data);
    }
}

/* End of file cDashboard.php */
