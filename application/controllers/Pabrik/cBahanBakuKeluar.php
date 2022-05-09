<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cBahanBakuKeluar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mBKeluarPabrik');
        $this->load->model('mBahanJadi');
    }


    public function index()
    {
        $this->protect->protect();
        $data = array(
            'bahan_keluar' => $this->mBKeluarPabrik->select()
        );
        $this->load->view('Pabrik/Layout/head');
        $this->load->view('Pabrik/Layout/header');
        $this->load->view('Pabrik/bahanBakuKeluar', $data);
        $this->load->view('Pabrik/Layout/footer');
    }
    public function create()
    {
        $this->protect->protect();
        $this->form_validation->set_rules('bahan_baku', 'Bahan Baku', 'required');
        $this->form_validation->set_rules('qty_kel', 'Quantity Keluar', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'bahan_baku' => $this->mBKeluarPabrik->bahan_baku()
            );
            $this->load->view('Pabrik/Layout/head');
            $this->load->view('Pabrik/Layout/header');
            $this->load->view('Pabrik/createBarangKeluar', $data);
            $this->load->view('Pabrik/Layout/footer');
        } else {
            $stok = $this->input->post('stok');
            $qty = $this->input->post('qty_kel');
            if ($qty > $stok) {
                $this->session->set_flashdata('error', 'Quantity Keluar Melebihi Stok Sebelumnya!');
                redirect('Pabrik/cBahanBakuKeluar/create');
            } else {
                //memasukkan data ke tabel bahan keluar
                $data = array(
                    'id_pmasuk' => $this->input->post('bahan_baku'),
                    // 'id_bahan_jadi' => $this->input->post('bahan_jadi'),
                    // 'qty_bj' => $this->input->post('stok_bj'),
                    'tgl_keluar' => date('Y-m-d'),
                    'stokpk' => $this->input->post('qty_kel')
                );
                $this->mBKeluarPabrik->insert($data);

                //mengurangi stok barang masuk
                $id = $this->input->post('bahan_baku');
                $stok = array(
                    'stokp' => $stok - $qty
                );
                $this->mBKeluarPabrik->update_stok($id, $stok);

                //update stok bahan jadi untuk proses transaksi distributor
                // $id_bj = $this->input->post('bahan_jadi');
                // $a = $this->input->post('stok_bj');
                // $b = $this->input->post('qty_sblm');
                // $b += $a;
                // $dstok_bj = array( 
                //     'stok' => $b
                // );
                // $this->mBKeluarPabrik->stok_bj($id_bj, $dstok_bj);


                $this->session->set_flashdata('success', 'Data Bahan Baku Keluar Berhasil Disimpan!');
                redirect('Pabrik/cBahanBakuKeluar');
            }
        }
    }
    public function updateStokBahanJadi()
    {
        $this->protect->protect();
        $this->form_validation->set_rules('bahan_jadi', 'Bahan Jadi', 'required');
        $this->form_validation->set_rules('stok', 'Quantity Bahan Jadi', 'required');


        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'bahan_jadi' => $this->mBKeluarPabrik->bahan_jadi()
            );
            $this->load->view('Pabrik/Layout/head');
            $this->load->view('Pabrik/Layout/header');
            $this->load->view('Pabrik/updateStokBJ', $data);
            $this->load->view('Pabrik/Layout/footer');
        } else {
            $qty = $this->input->post('qty');
            $stok = $this->input->post('stok');
            $data = array(
                'id_bahan_jadi' => $this->input->post('bahan_jadi'),
                'stok' => $qty + $stok
            );
            $this->mBKeluarPabrik->stok_bj($data['id_bahan_jadi'], $data);
            $this->session->set_flashdata('success', 'Stok Bahan Jadi Berhasil Ditambahkan!');
            redirect('Pabrik/cBahanJadi');
        }
    }
}

/* End of file cBahanBakuKeluar.php */
