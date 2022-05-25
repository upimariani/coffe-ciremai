<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cBahanKeluar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mBKeluarDistributor');
    }


    public function index()
    {
        $this->protect->protect();
        $data = array(
            'keluar' => $this->mBKeluarDistributor->select()
        );
        $this->load->view('Distributor/Layout/head');
        $this->load->view('Distributor/Layout/header');
        $this->load->view('Distributor/bahanKeluar', $data);
        $this->load->view('Distributor/Layout/footer');
    }
    public function create()
    {
        $this->protect->protect();
        $this->form_validation->set_rules('bahan_jadi', 'Bahan Jadi', 'required');
        $this->form_validation->set_rules('qty', 'Quantity Keluar', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'bahan_jadi' => $this->mBKeluarDistributor->bahan_jadi()
            );
            $this->load->view('Distributor/Layout/head');
            $this->load->view('Distributor/Layout/header');
            $this->load->view('Distributor/createBahanKeluar', $data);
            $this->load->view('Distributor/Layout/footer');
        } else {
            $a = $this->input->post('stok');
            $b = $this->input->post('qty');
            if ($b > $a) {
                $this->session->set_flashdata('error', 'Quantity Keluar Melebihi Stok yang tersedia!');
                redirect('Distributor/cBahanKeluar/create');
            } else {
                $data = array(
                    'id_masukd' => $this->input->post('bahan_jadi'),
                    'tgl_keluar' => date('Y-m-d'),
                    'qty_kel' => $this->input->post('qty')
                );
                $this->mBKeluarDistributor->insert($data);


                $stok_sblm = $this->input->post('stok');
                $qty = $this->input->post('qty');
                $stok_up = array(
                    'id_masukd' => $this->input->post('bahan_jadi'),
                    'stokd' => $stok_sblm - $qty
                );
                $this->db->where('id_masukd', $stok_up['id_masukd']);
                $this->db->update('produk_masukdistr', $stok_up);
                $this->session->set_flashdata('success', 'Bahan Jadi Keluar Berhasil Disimpan!');
                redirect('Distributor/cBahanKeluar');
            }
        }
    }
}

/* End of file cBahanKeluar.php */
