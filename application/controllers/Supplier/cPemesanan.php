<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cPemesanan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mPesananPabrik');
    }

    public function index()
    {
        $data = array(
            'pesanan' => $this->mPesananPabrik->transaksi()
        );
        $this->load->view('Supplier/Layout/head');
        $this->load->view('Supplier/Layout/header');
        $this->load->view('Supplier/transaksiSupplier', $data);
        $this->load->view('Supplier/Layout/footer');
    }
    public function detail_pesanan($id)
    {
        $data = array(
            'detail' => $this->mPesananPabrik->detail_pesanan($id)
        );
        $this->load->view('Supplier/Layout/head');
        $this->load->view('Supplier/Layout/header');
        $this->load->view('Supplier/detailPemesanan', $data);
        $this->load->view('Supplier/Layout/footer');
    }
    public function konfirmasi_pembayaran($id)
    {
        $data = array(
            'status_order' => '2'
        );
        $this->db->where('id_tpabrik', $id);
        $this->db->update('transaksi_pabrik', $data);
        $this->session->set_flashdata('success', 'Pesanan Pabrik Berhasil Dikonfirmasi!');
        redirect('Supplier/cPemesanan');
    }
    public function pesanan_dikirim($id)
    {
        $data = array(
            'status_order' => '3'
        );
        $this->db->where('id_tpabrik', $id);
        $this->db->update('transaksi_pabrik', $data);
        $this->session->set_flashdata('success', 'Pesanan Pabrik Segera Dikirim!');
        redirect('Supplier/cPemesanan');
    }
}

/* End of file c.php */
