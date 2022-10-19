<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mDashboard extends CI_Model
{
	//informasi bahan baku supplier
	public function bahan_baku()
	{
		$this->db->select('*');
		$this->db->from('bahan_baku');
		$this->db->where('id_user', $this->session->userdata('id'));
		return $this->db->get()->result();
	}
	//informasi bahan baku pabrik di dashbaord supplier
	public function stok_pabrik()
	{
		$this->db->select('SUM(stokp) as jml, nm_bahanbaku, bahan_baku.id_bahanbaku');
		$this->db->from('invoice_pabrik');
		$this->db->join('user', 'user.id_user = invoice_pabrik.id_user', 'left');
		$this->db->join('detail_invoicep', 'invoice_pabrik.id_invoicep = detail_invoicep.id_invoicep', 'left');
		$this->db->join('bahan_baku', 'bahan_baku.id_bahanbaku = detail_invoicep.id_bahanbaku', 'left');
		$this->db->join('bb_masukpabrik', 'bb_masukpabrik.id_detailp = detail_invoicep.id_detailp', 'left');
		$this->db->where('invoice_pabrik.supplier', $this->session->userdata('id'));
		$this->db->group_by('bahan_baku.id_bahanbaku');

		return $this->db->get()->result();
	}
	public function insert_penawaran($data)
	{
		$this->db->insert('penawaran', $data);
	}
	public function select_penawaran()
	{
		$this->db->select('*');
		$this->db->from('penawaran');
		$this->db->join('bahan_baku', 'penawaran.id_bahanbaku = bahan_baku.id_bahanbaku', 'left');
		$this->db->where('id_user', $this->session->userdata('id'));
		return $this->db->get()->result();
	}

	//informasi penawaran supplier
	public function informasi_penawaran_pabrik()
	{
		$this->db->select('*');
		$this->db->from('penawaran');
		$this->db->join('bahan_baku', 'penawaran.id_bahanbaku = bahan_baku.id_bahanbaku', 'left');
		$this->db->join('user', 'user.id_user = bahan_baku.id_user', 'left');
		return $this->db->get()->result();
	}

	//informasi stok bahan baku pabrik
	public function baku_pabrik()
	{
		$query = $this->db->query("SELECT SUM(stokp) as stok, bahan_baku.id_bahanbaku, nm_bahanbaku, harga_bb, deskripsi_bb FROM bb_masukpabrik JOIN detail_invoicep ON bb_masukpabrik.id_detailp = detail_invoicep.id_detailp JOIN bahan_baku ON detail_invoicep.id_bahanbaku = bahan_baku.id_bahanbaku GROUP BY bahan_baku.id_bahanbaku")->result();
		return $query;
	}
	//informasi stok bahan jadi pabrik
	public function bahan_jadi()
	{
		$this->db->select('*');
		$this->db->from('produk');
		return $this->db->get()->result();
	}

	//informasi bahan jadi distributor
	public function jadi_distributor()
	{
		$query = $this->db->query("SELECT SUM(stokd) as stok,deskripsi, harga, produk.id_produk, nm_produk FROM produk_masukdistr JOIN detail_invoiced ON produk_masukdistr.id_detaild = detail_invoiced.id_detaild JOIN invoice_distributor ON detail_invoiced.id_invoiced = invoice_distributor.id_invoiced JOIN produk ON detail_invoiced.id_produk = produk.id_produk WHERE id_user='" . $this->session->userdata('id') . "' GROUP BY produk.id_produk")->result();
		return $query;
	}


	//grafik pemilik
	public function grafik()
	{
		$this->db->select('SUM(total_bayardistr) as total, tgl_orderdistr');
		$this->db->from('invoice_distributor');
		$this->db->group_by('tgl_orderdistr');
		$this->db->where('status_orderdistr=4');
		return $this->db->get()->result();
	}
}

/* End of file mDashboard.php */
