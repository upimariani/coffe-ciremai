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
            'bahan' => $this->mBahanBaku->select()
        );
        $this->load->view('Supplier/Layout/head');
        $this->load->view('Supplier/Layout/header');
        $this->load->view('Supplier/bahan_baku', $data);
        $this->load->view('Supplier/Layout/footer');
    }
    public function create()
    {
        $this->protect->protect();
        $this->form_validation->set_rules('nama', 'Nama Bahan Baku', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('harga', 'Harga Bahan Baku', 'required');
        $this->form_validation->set_rules('stok', 'Stok Bahan Baku', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Supplier/Layout/head');
            $this->load->view('Supplier/Layout/header');
            $this->load->view('Supplier/createBahanBaku');
            $this->load->view('Supplier/Layout/footer');
        } else {
            $data = array(
                'id_user' => $this->session->userdata('id'),
                'nama_bahan' => $this->input->post('nama'),
                'deskripsi' => $this->input->post('deskripsi'),
                'harga' => $this->input->post('harga'),
                'stok' => $this->input->post('stok'),
            );
            $this->mBahanBaku->insert($data);
            $this->session->set_flashdata('success', 'Data Bahan Baku Berhasil Disimpan!');
            redirect('Supplier/cBahanBaku');
        }
    }
    public function edit($id)
    {
        $this->form_validation->set_rules('nama', 'Nama Bahan Baku', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('harga', 'Harga Bahan Baku', 'required');
        $this->form_validation->set_rules('stok', 'Stok Bahan Baku', 'required');


        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'bahan' => $this->mBahanBaku->edit($id)
            );
            $this->load->view('Supplier/Layout/head');
            $this->load->view('Supplier/Layout/header');
            $this->load->view('Supplier/updateBahanBaku', $data);
            $this->load->view('Supplier/Layout/footer');
        } else {
            $item = array(
                'nama_bahan' => $this->input->post('nama'),
                'deskripsi' => $this->input->post('deskripsi'),
                'harga' => $this->input->post('harga'),
                'stok' => $this->input->post('stok'),
            );
            $this->mBahanBaku->update($id, $item);
            $this->session->set_flashdata('success', 'Data Bahan Baku Berhasil Diperbaharui!');
            redirect('Supplier/cBahanBaku');
        }
    }
    public function delete($id)
    {
        $this->mBahanBaku->delete($id);
        $this->session->set_flashdata('success', 'Data Bahan Baku Berhasil Dihapus!');
        redirect('Supplier/cBahanBaku');
    }
}

/* End of file Controllername.php */
