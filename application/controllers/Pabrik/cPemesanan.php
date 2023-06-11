<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cPemesanan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mBahanBaku');
		$this->load->model('mPesananPabrik');
		$this->load->model('mDashboard');
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
				'bukti_bayarpabrik' => $upload_data['file_name'],
				'status_orderpabrik' => '1'
			);
			$this->db->where('id_invoicep', $id);
			$this->db->update('invoice_pabrik', $data);
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
		$stok = $this->input->post('stok');
		$qty = $this->input->post('qty');


		if ($qty <= $stok) {

			$data = array(
				'id' => $this->input->post('id'),
				'name' => $this->input->post('name'),
				'price' => $this->input->post('price'),
				'qty' => $this->input->post('qty'),
				'stok' => $this->input->post('stok')
			);
			$this->cart->insert($data);

			$status_penawaran = array(
				'status_penawaran' => '1'
			);
			$this->db->where('id_bahanbaku', $data['id']);

			$this->db->update('penawaran', $status_penawaran);

			$this->session->set_flashdata('success', 'Bahan Baku Berhasil Masuk kedalam Keranjang!');
			redirect('Pabrik/cPemesanan/pesan/' . $supplier);
		} else {
			$this->session->set_flashdata('error', 'Quantity Tidak Terpenuhi! Silahkan lihat kembali Stok Supplier');
			redirect('Pabrik/cPemesanan/pesan/' . $supplier);
		}
	}
	public function delete_cart($id, $supplier)
	{
		$this->protect->protect();
		$this->cart->remove($id);
		redirect('Pabrik/cPemesanan/pesan/' . $supplier);
	}
	public function updateCart()
	{
		$this->protect->protect();
		$supplier = $this->input->post('supplier');
		$i = 1;
		foreach ($this->cart->contents() as $items) {
			$data = array(
				'rowid'  => $items['rowid'],
				'qty'    => $this->input->post($i . '[qty]')
			);
			$this->cart->update($data);
			$i++;
		}
		redirect('Pabrik/cPemesanan/pesan/' . $supplier);
	}
	public function order()
	{
		$this->protect->protect();
		//memasukkan data ke tabel transaksi pabrik ke supplier
		$data = array(
			'id_invoicep' => $this->input->post('id_transaksi'),
			'id_user' => $this->input->post('id_user'),
			'tgl_orderpabrik' => date('Y-m-d'),
			'total_bayarpabrik' => $this->input->post('total'),
			'status_orderpabrik' => '0',
			'supplier' => $this->input->post('supplier'),
			'bts_bayarp' => $this->input->post('tgl')
		);
		$this->db->insert('invoice_pabrik', $data);

		//memasukkan data ke tabel detail transaksi pabrik ke supplier
		foreach ($this->cart->contents() as $key => $value) {
			$detail = array(
				'id_invoicep' => $this->input->post('id_transaksi'),
				'id_bahanbaku' => $value['id'],
				'qty_bb' => $value['qty']
			);
			$this->db->insert('detail_invoicep', $detail);
		}

		//mengurangi stok
		foreach ($this->cart->contents() as $key => $value) {
			$stok = array(
				'id_bahanbaku' => $value['id'],
				'stok_bb' => $value['stok'] - $value['qty']
			);
			$this->db->where('id_bahanbaku', $stok['id_bahanbaku']);
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
				'id_detailp' => $value->id_detailp,
				'stokp' => $value->qty_bb,
				'tgl_masuk' => date('Y-m-d')
			);
			$this->db->insert('bb_masukpabrik', $data);
		}

		//mengganti status selesai
		$data = array(
			'status_orderpabrik' => '4'
		);
		$this->db->where('id_invoicep', $id);
		$this->db->update('invoice_pabrik', $data);
		$this->session->set_flashdata('success', 'Pesanan Anda Berhasil Diterima!');
		redirect('Pabrik/cPemesanan');
	}
}

/* End of file cPemesanan.php */
