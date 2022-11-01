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
			'bahan_baku' => $this->mDashboard->baku_pabrik(),
			'bahan_jadi' => $this->mDashboard->bahan_jadi(),
			'penawaran_supplier' => $this->mDashboard->informasi_penawaran_pabrik(),

		);


		$this->load->view('Pabrik/Layout/head');
		$this->load->view('Pabrik/Layout/header', $data);
		$this->load->view('Pabrik/dashboard', $data);
	}
}

/* End of file cDashboard.php */
