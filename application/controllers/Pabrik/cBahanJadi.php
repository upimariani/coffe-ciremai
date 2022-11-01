<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cBahanJadi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mBahanJadi');
		$this->load->model('mDashboard');
	}
	public function index()
	{
		$this->protect->protect();
		$data = array(
			'bahan_jadi' => $this->mBahanJadi->select()
		);
		$this->load->view('Pabrik/Layout/head');
		$this->load->view('Pabrik/Layout/header');
		$this->load->view('Pabrik/bahanJadi', $data);
		$this->load->view('Pabrik/Layout/footer');
	}
	public function create()
	{
		$this->protect->protect();
		$this->form_validation->set_rules('nama', 'Nama Bahan Jadi', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');
		$this->form_validation->set_rules('stok', 'Stok', 'required');


		if ($this->form_validation->run() == FALSE) {
			$this->load->view('Pabrik/Layout/head');
			$this->load->view('Pabrik/Layout/header');
			$this->load->view('Pabrik/createBahanJadi');
			$this->load->view('Pabrik/Layout/footer');
		} else {
			$data = array(
				'nm_produk' => $this->input->post('nama'),
				'deskripsi' => $this->input->post('deskripsi'),
				'harga' => $this->input->post('harga'),
				'stok' => $this->input->post('stok')
			);
			$this->mBahanJadi->insert($data);
			$this->session->set_flashdata('success', 'Data Bahan Jadi Berhasil Simpan!');
			redirect('Pabrik/cBahanJadi');
		}
	}
	public function edit($id)
	{
		$this->form_validation->set_rules('nama', 'Nama Bahan Jadi', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');
		$this->form_validation->set_rules('stok', 'Stok', 'required');


		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'bahan' => $this->mBahanJadi->edit($id)
			);
			$this->load->view('Pabrik/Layout/head');
			$this->load->view('Pabrik/Layout/header');
			$this->load->view('Pabrik/updateBahanJadi', $data);
			$this->load->view('Pabrik/Layout/footer');
		} else {
			$data = array(
				'nm_produk' => $this->input->post('nama'),
				'deskripsi' => $this->input->post('deskripsi'),
				'harga' => $this->input->post('harga'),
				'stok' => $this->input->post('stok')
			);
			$this->mBahanJadi->update($id, $data);
			$this->session->set_flashdata('success', 'Data Bahan Jadi Berhasil Diperbaharui!');
			redirect('Pabrik/cBahanJadi');
		}
	}
	public function delete($id)
	{
		$this->mBahanJadi->delete($id);
		$this->session->set_flashdata('success', 'Data Bahan Jadi Berhasil Dihapus!');
		redirect('Pabrik/cBahanJadi');
	}
}

/* End of file cBahanJadi.php */
