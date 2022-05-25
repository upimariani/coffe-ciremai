<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cPemesanan extends CI_Controller
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
            'pesanan' => $this->mPesananDistributor->pesanan()
        );
        $this->load->view('Distributor/Layout/head');
        $this->load->view('Distributor/Layout/header');
        $this->load->view('Distributor/pemesanan', $data);
        $this->load->view('Distributor/Layout/footer');
    }
    public function detail_pesanan($id)
    {
        $this->protect->protect();
        $config['upload_path']          = './asset/pembayaran-distributor';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 5000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('bukti')) {
            $data = array(
                'detail' => $this->mPesananDistributor->detail_pesanan($id),
                'error' => $this->upload->display_errors()
            );
            $this->load->view('Distributor/Layout/head');
            $this->load->view('Distributor/Layout/header');
            $this->load->view('Distributor/detailPemesanan', $data);
            $this->load->view('Distributor/Layout/footer');
        } else {
            $upload_data = $this->upload->data();
            $data = array(
                'bukti_bayardistr' => $upload_data['file_name'],
                'status_orderdistr' => '1'
            );
            $this->db->where('id_invoiced', $id);
            $this->db->update('invoice_distributor', $data);
            $this->session->set_flashdata('success', 'Pembayaran Anda Berhasil Dikirim!');
            redirect('Distributor/cPemesanan/detail_pesanan/' . $id);
        }
    }
    public function create()
    {
        $this->protect->protect();
        $data = array(
            'bahan_jadi' => $this->mPesananDistributor->bahan_jadi()
        );
        $this->load->view('Distributor/Layout/head');
        $this->load->view('Distributor/Layout/header');
        $this->load->view('Distributor/createPesanan', $data);
        $this->load->view('Distributor/Layout/footer');
    }
    public function add_cart()
    {
        $this->protect->protect();

        $this->form_validation->set_rules('id', 'Bahan Jadi', 'required');
        $this->form_validation->set_rules('qty', 'Quantity Pemesanan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'bahan_jadi' => $this->mPesananDistributor->bahan_jadi()
            );
            $this->load->view('Distributor/Layout/head');
            $this->load->view('Distributor/Layout/header');
            $this->load->view('Distributor/createPesanan', $data);
            $this->load->view('Distributor/Layout/footer');
        } else {
            $stok = $this->input->post('stok');
            $qty = $this->input->post('qty');
            if ($qty > $stok) {
                $this->session->set_flashdata('error', 'Quantity Melebihi Stok yang Tersedia!');
                redirect('Distributor/cPemesanan/create', 'refresh');
            } else {
                $data = array(
                    'id' => $this->input->post('id'),
                    'name' => $this->input->post('name'),
                    'price' => $this->input->post('harga'),
                    'qty' => $this->input->post('qty'),
                    'stok' => $this->input->post('stok')
                );
                $this->cart->insert($data);
                $this->session->set_flashdata('success', 'Bahan Jadi Berhasil Masuk Keranjang!');
                redirect('Distributor/cPemesanan/create', 'refresh');
            }
        }
    }
    public function delete_cart($id)
    {
        $this->cart->remove($id);
        redirect('Distributor/cPemesanan/create', 'refresh');
    }
    public function order()
    {
        $this->protect->protect();
        //memasukkan data ke tabel transaksi pabrik ke supplier
        $data = array(
            'id_invoiced' => $this->input->post('id_transaksi'),
            'id_user' => $this->input->post('id_user'),
            'tgl_orderdistr' => date('Y-m-d'),
            'total_bayardistr' => $this->input->post('total'),
            'status_orderdistr' => '0'
        );
        $this->db->insert('invoice_distributor', $data);

        //memasukkan data ke tabel detail transaksi pabrik ke supplier
        foreach ($this->cart->contents() as $key => $value) {
            $detail = array(
                'id_invoiced' => $this->input->post('id_transaksi'),
                'id_produk' => $value['id'],
                'qty_produk' => $value['qty']
            );
            $this->db->insert('detail_invoiced', $detail);
        }

        //mengurangi stok
        foreach ($this->cart->contents() as $key => $value) {
            $stok = array(
                'id_produk' => $value['id'],
                'stok' => $value['stok'] - $value['qty']
            );
            $this->db->where('id_produk', $stok['id_produk']);
            $this->db->update('produk', $stok);
        }
        $this->cart->destroy();
        $this->session->set_flashdata('success', 'Pesanan Anda Berhasil Dikirim!');
        redirect('Distributor/cPemesanan');
    }
    public function pesanan_diterima($id)
    {
        $this->protect->protect();
        $data = $this->mPesananDistributor->detail_pesanan($id);
        foreach ($data['pesanan'] as $key => $value) {
            $masuk = array(
                'id_detaild' => $value->id_detaild,
                'stokd' => $value->qty_produk,
                'tgl_masuk' => date('Y-m-d')
            );
            $this->db->insert('produk_masukdistr', $masuk);
        }
        $status = array(
            'status_orderdistr' => '4'
        );
        $this->db->where('id_invoiced', $id);
        $this->db->update('invoice_distributor', $status);
        $this->session->set_flashdata('success', 'Pesanan Berhasil Diterima!');
        redirect('Distributor/cPemesanan');
    }
}

/* End of file cPemesanan.php */
