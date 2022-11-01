<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cBahanBakuMasuk extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mBMasukPabrik');
		$this->load->model('mDashboard');
	}
	public function index()
	{
		$this->protect->protect();
		$data = array(
			'bahan_masuk' => $this->mBMasukPabrik->select()
		);
		$this->load->view('Pabrik/Layout/head');
		$this->load->view('Pabrik/Layout/header');
		$this->load->view('Pabrik/bahanBakuMasuk', $data);
		$this->load->view('Pabrik/Layout/footer');
	}
}

/* End of file cBahanBakuMasuk.php */
