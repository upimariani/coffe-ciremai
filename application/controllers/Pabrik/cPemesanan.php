<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cPemesanan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mBahanBaku');
        $this->load->model('mPesananPabrik');
    }

    public function index()
    {
        $this->protect->protect();
        $data = array(
            'pesanan' => $this->mPesananPabrik->pesanan()
        );
        $this->load->view('Pabrik/Layout/head');
        $this->load->view('Pabrik/Layout/header');
        $this->load->view('Pabrik/pemesanan', $data);
        $this->load->view('Pabrik/Layout/footer');
    }
    //pemeilihan supplier
    public function pilih_supplier()
    {
        $this->protect->protect();
        $data = array(
            'supplier' => $this->mPesananPabrik->supplier()
        );
        $this->load->view('Pabrik/Layout/head');
        $this->load->view('Pabrik/Layout/header');
        $this->load->view('Pabrik/pilihPesanSuplier', $data);
        $this->load->view('Pabrik/Layout/footer');
    }
    public function detail_pesanan($id)
    {
        $this->protect->protect();
        $config['upload_path']          = './asset/pembayaran-pabrik';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 5000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('bukti')) {

            $data = array(
                'detail' => $this->mPesananPabrik->detail_pesanan($id),
                'error' => $this->upload->display_errors()
            );
            $this->load->view('Pabrik/Layout/head');
            $this->load->view('Pabrik/Layout/header');
            $this->load->view('Pabrik/detailPemesanan', $data);
            $this->load->view('Pabrik/Layout/footer');
        } else {
            $upload_data = $this->upload->data();
            $data = array(
                'bukti_pembayaran' => $upload_data['file_name'],
                'status_order' => '1'
            );
            $this->db->where('id_tpabrik', $id);
            $this->db->update('transaksi_pabrik', $data);
            $this->session->set_flashdata('success', 'Pembayaran Anda Berhasil Dikirim!');
            redirect('Pabrik/cPemesanan/detail_pesanan/' . $id);
        }
    }

    public function pesan($id)
    {
        $this->protect->protect();
        $data = array(
            'bahan_baku' => $this->mPesananPabrik->bahan_baku($id),
            'supplier' => $id
        );
        $this->load->view('Pabrik/Layout/head');
        $this->load->view('Pabrik/Layout/header');
        $this->load->view('Pabrik/createPesan', $data);
        $this->load->view('Pabrik/Layout/footer');
    }
    public function cart($supplier)
    {
        $this->protect->protect();
        $id = '';
        foreach ($this->cart->contents() as $key => $value) {
            $id = $value['id'];
        }
        $id_bahan = $this->input->post('id');
        if ($id == $id_bahan) {
            $this->session->set_flashdata('error', 'Barang Sudah Tersedia di dalam Keranjang!');
            redirect('Pabrik/cPemesanan/pesan/' . $supplier);
        } else {
            $stok = $this->input->post('stok');
            $qty = $this->input->post('qty');


            if ($qty <= $stok) {
                $this->form_validation->set_rules('id', 'Bahan Baku', 'required');
                $this->form_validation->set_rules('qty', 'Quantity Pemesanan', 'required');

                if ($this->form_validation->run() == FALSE) {
                    //untuk mendapatkan id supplier
                    $data = array(
                        'bahan_baku' => $this->mPesananPabrik->bahan_baku($supplier),
                        'supplier' => $supplier
                    );
                    $this->load->view('Pabrik/Layout/head');
                    $this->load->view('Pabrik/Layout/header');
                    $this->load->view('Pabrik/createPesan', $data);
                    $this->load->view('Pabrik/Layout/footer');
                } else {
                    $data = array(
                        'id' => $this->input->post('id'),
                        'name' => $this->input->post('name'),
                        'price' => $this->input->post('price'),
                        'qty' => $this->input->post('qty'),
                        'stok' => $this->input->post('stok')
                    );
                    $this->cart->insert($data);
                    $this->session->set_flashdata('success', 'Bahan Baku Berhasil Masuk kedalam Keranjang!');
                    redirect('Pabrik/cPemesanan/pesan/' . $supplier);
                }
            } else {
                $this->session->set_flashdata('error', 'Quantity Tidak Terpenuhi! Silahkan lihat kembali Stok Supplier');
                redirect('Pabrik/cPemesanan/pesan/' . $supplier);
            }
        }
    }
    public function delete_cart($id, $supplier)
    {
        $this->protect->protect();
        $this->cart->remove($id);
        redirect('Pabrik/cPemesanan/pesan/' . $supplier);
    }
    public function order()
    {
        $this->protect->protect();
        //memasukkan data ke tabel transaksi pabrik ke supplier
        $data = array(
            'id_tpabrik' => $this->input->post('id_transaksi'),
            'id_user' => $this->input->post('id_user'),
            'tgl_order' => date('Y-m-d'),
            'total_bayar' => $this->input->post('total'),
            'status_order' => '0',
            'supplier' => $this->input->post('supplier')
        );
        $this->db->insert('transaksi_pabrik', $data);

        //memasukkan data ke tabel detail transaksi pabrik ke supplier
        foreach ($this->cart->contents() as $key => $value) {
            $detail = array(
                'id_tpabrik' => $this->input->post('id_transaksi'),
                'id_bahan' => $value['id'],
                'qty' => $value['qty']
            );
            $this->db->insert('detail_tpabrik', $detail);
        }

        //mengurangi stok
        foreach ($this->cart->contents() as $key => $value) {
            $stok = array(
                'id_bahan' => $value['id'],
                'stok' => $value['stok'] - $value['qty']
            );
            $this->db->where('id_bahan', $stok['id_bahan']);
            $this->db->update('bahan_baku', $stok);
        }
        $this->cart->destroy();
        $this->session->set_flashdata('success', 'Pesanan Anda Berhasil Dikirim!');
        redirect('Pabrik/cPemesanan');
    }
    public function pesanan_diterima($id)
    {
        $this->protect->protect();
        //memasukkan data bahan baku ke barang masuk
        $bahan = $this->mPesananPabrik->detail_pesanan($id);
        foreach ($bahan['pesanan'] as $key => $value) {
            $data = array(
                'id_detail' => $value->id_detail,
                'stokp' => $value->qty,
                'tgl_masuk' => date('Y-m-d')
            );
            $this->db->insert('bahan_pmasuk', $data);
        }

        //mengganti status selesai
        $data = array(
            'status_order' => '4'
        );
        $this->db->where('id_tpabrik', $id);
        $this->db->update('transaksi_pabrik', $data);
        $this->session->set_flashdata('success', 'Pesanan Anda Berhasil Diterima!');
        redirect('Pabrik/cPemesanan');
    }
}

/* End of file cPemesanan.php */
