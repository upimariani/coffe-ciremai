<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cDashboard extends CI_Controller
{

    public function index()
    {
        $this->load->view('Supplier/Layout/head');
        $this->load->view('Supplier/Layout/header');
        $this->load->view('Supplier/dashboard');
        $this->load->view('Supplier/Layout/footer');
    }
}

/* End of file cDashboard.php */
