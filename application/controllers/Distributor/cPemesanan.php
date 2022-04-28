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
                'bukti_pembayaran' => $upload_data['file_name'],
                'status_order' => '1'
            );
            $this->db->where('id_tdistributor', $id);
            $this->db->update('transaksi_distributor', $data);
            $this->session->set_flashdata('success', 'Pembayaran Anda Berhasil Dikirim!');
            redirect('Distributor/cPemesanan/detail_pesanan/' . $id);
        }
    }
    public function create()
    {
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
        $id = '';
        foreach ($this->cart->contents() as $key => $value) {
            $id = $value['id'];
        }
        $id_bahan = $this->input->post('id');
        if ($id == $id_bahan) {
            $this->session->set_flashdata('error', 'Barang Sudah Tersedia di dalam Keranjang!');
            redirect('Distributor/cPemesanan/create', 'refresh');
        } else {

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
    }
    public function delete_cart($id)
    {
        $this->cart->remove($id);
        redirect('Distributor/cPemesanan/create', 'refresh');
    }
    public function order()
    {
        //memasukkan data ke tabel transaksi pabrik ke supplier
        $data = array(
            'id_tdistributor' => $this->input->post('id_transaksi'),
            'id_user' => $this->input->post('id_user'),
            'tgl_order' => date('Y-m-d'),
            'total_bayar' => $this->input->post('total'),
            'status_order' => '0'
        );
        $this->db->insert('transaksi_distributor', $data);

        //memasukkan data ke tabel detail transaksi pabrik ke supplier
        foreach ($this->cart->contents() as $key => $value) {
            $detail = array(
                'id_tdistibutor' => $this->input->post('id_transaksi'),
                'id_bahan_jadi' => $value['id'],
                'qty' => $value['qty']
            );
            $this->db->insert('detail_tdistributor', $detail);
        }

        //mengurangi stok
        foreach ($this->cart->contents() as $key => $value) {
            $stok = array(
                'id_bahan_jadi' => $value['id'],
                'stok' => $value['stok'] - $value['qty']
            );
            $this->db->where('id_bahan_jadi', $stok['id_bahan_jadi']);
            $this->db->update('bahan_jadi', $stok);
        }
        $this->cart->destroy();
        $this->session->set_flashdata('success', 'Pesanan Anda Berhasil Dikirim!');
        redirect('Distributor/cPemesanan');
    }
}

/* End of file cPemesanan.php */
