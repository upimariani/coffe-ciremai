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
        $this->protect->protect();
        $data = array(
            'bahan_jadi' => $this->mDashboard->jadi_distributor()
        );
        $this->load->view('Distributor/Layout/head');
        $this->load->view('Distributor/Layout/header');
        $this->load->view('Distributor/dashboard', $data);
        $this->load->view('Distributor/Layout/footer');
    }
}

/* End of file cDasboard.php */
