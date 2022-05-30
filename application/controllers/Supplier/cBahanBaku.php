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
                'nm_bahanbaku' => $this->input->post('nama'),
                'deskripsi_bb' => $this->input->post('deskripsi'),
                'harga_bb' => $this->input->post('harga'),
                'stok_bb' => $this->input->post('stok'),
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
                'nm_bahanbaku' => $this->input->post('nama'),
                'deskripsi_bb' => $this->input->post('deskripsi'),
                'harga_bb' => $this->input->post('harga'),
                'stok_bb' => $this->input->post('stok'),
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
    //update stok bahan baku supplier
    public function update_stok()
    {
        $this->form_validation->set_rules('id_bb', 'Bahan Baku', 'required');
        $this->form_validation->set_rules('stok', 'Stok Sebelumnya', 'required');
        $this->form_validation->set_rules('qty', 'Quantity', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'bahan_baku' => $this->mBahanBaku->select()
            );
            $this->load->view('Supplier/Layout/head');
            $this->load->view('Supplier/Layout/header');
            $this->load->view('Supplier/updateStokBB', $data);
            $this->load->view('Supplier/Layout/footer');
        } else {
            $stok = $this->input->post('stok');
            $qty = $this->input->post('qty');
            $total = $stok + $qty;
            $data = array(
                'id_bahanbaku' => $this->input->post('id_bb'),
                'stok_bb' => $total
            );
            $this->mBahanBaku->update($data['id_bahanbaku'], $data);
            $this->session->set_flashdata('success', 'Stok Bahan Baku Berhasil Diperbaharui!');
            redirect('Supplier/cBahanBaku');
        }
    }
}

/* End of file Controllername.php */
