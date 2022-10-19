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
			'bahan_baku' => $this->mDashboard->bahan_baku(),
			'stok_pabrik' => $this->mDashboard->stok_pabrik(),
			'penawaran' => $this->mDashboard->select_penawaran()
		);
		$this->load->view('Supplier/Layout/head');
		$this->load->view('Supplier/Layout/header');
		$this->load->view('Supplier/dashboard', $data);
	}
	public function penawaran($id)
	{
		$data = array(
			'id_bahanbaku' => $id,
			'tgl_penawaran' => date('Y-m-d'),
			'kalimat' => $this->input->post('kalimat'),
			'jml_tawaran' => $this->input->post('qty')
		);
		$this->mDashboard->insert_penawaran($data);
		$this->session->set_flashdata('success', 'Berhasil Ditawarkan!!!');
		redirect('Supplier/cDashboard');
	}
}

/* End of file cDashboard.php */
