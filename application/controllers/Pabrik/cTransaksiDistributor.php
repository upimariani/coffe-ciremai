<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cTransaksiDistributor extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mPesananDistributor');
    }


    public function index()
    {
        $this->protect->protect();
        $data = array(
            'transaksi' => $this->mPesananDistributor->transaksi()
        );
        $this->load->view('Pabrik/Layout/head');
        $this->load->view('Pabrik/Layout/header');
        $this->load->view('Pabrik/transaksiDistributor', $data);
        $this->load->view('Pabrik/Layout/footer');
    }
    public function detail_pesanan($id)
    {
        $this->protect->protect();
        $data = array(
            'detail' => $this->mPesananDistributor->detail_pesanan($id)
        );
        $this->load->view('Pabrik/Layout/head');
        $this->load->view('Pabrik/Layout/header');
        $this->load->view('Pabrik/detailPDistributor', $data);
        $this->load->view('Pabrik/Layout/footer');
    }
    public function konfirmasi_pembayaran($id)
    {
        $data = array(
            'status_order' => '2'
        );
        $this->db->where('id_tdistributor', $id);
        $this->db->update('transaksi_distributor', $data);
        $this->session->set_flashdata('success', 'Pesanan Distributor Berhasil Dikonfirmasi!');
        redirect('Pabrik/cTransaksiDistributor');
    }
    public function pesanan_dikirim($id)
    {
        $data = array(
            'status_order' => '3'
        );
        $this->db->where('id_tdistributor', $id);
        $this->db->update('transaksi_distributor', $data);
        $this->session->set_flashdata('success', 'Pesanan Distributor Segera Dikirim!');
        redirect('Pabrik/cTransaksiDistributor');
    }
}

/* End of file cTransaksiDistributor.php */
