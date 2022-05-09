<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mLaporan extends CI_Model
{

    //---------laporan biasa------------
    public function lap_harian($tanggal, $bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('bahan_pkeluar');
        $this->db->join('bahan_pmasuk', 'bahan_pkeluar.id_pmasuk = bahan_pmasuk.id_pmasuk', 'left');
        $this->db->join('detail_tpabrik', 'bahan_pmasuk.id_detail = detail_tpabrik.id_detail', 'left');
        $this->db->join('transaksi_pabrik', 'detail_tpabrik.id_tpabrik = transaksi_pabrik.id_tpabrik', 'left');
        $this->db->join('bahan_baku', 'bahan_baku.id_bahan = detail_tpabrik.id_bahan', 'left');
        $this->db->join('user', 'transaksi_pabrik.id_user = user.id_user', 'left');

        $this->db->where('DAY(bahan_pkeluar.tgl_keluar)', $tanggal);
        $this->db->where('MONTH(bahan_pkeluar.tgl_keluar)', $bulan);
        $this->db->where('YEAR(bahan_pkeluar.tgl_keluar)', $tahun);
        return $this->db->get()->result();
    }

    public function lap_bulanan($bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('bahan_pkeluar');
        $this->db->join('bahan_pmasuk', 'bahan_pkeluar.id_pmasuk = bahan_pmasuk.id_pmasuk', 'left');
        $this->db->join('detail_tpabrik', 'bahan_pmasuk.id_detail = detail_tpabrik.id_detail', 'left');
        $this->db->join('transaksi_pabrik', 'detail_tpabrik.id_tpabrik = transaksi_pabrik.id_tpabrik', 'left');
        $this->db->join('bahan_baku', 'bahan_baku.id_bahan = detail_tpabrik.id_bahan', 'left');
        $this->db->join('user', 'transaksi_pabrik.id_user = user.id_user', 'left');
        $this->db->where('MONTH(bahan_pkeluar.tgl_keluar)', $bulan);
        $this->db->where('YEAR(bahan_pkeluar.tgl_keluar)', $tahun);
        return $this->db->get()->result();
    }

    public function lap_tahunan($tahun)
    {
        $this->db->select('*');
        $this->db->from('bahan_pkeluar');
        $this->db->join('bahan_pmasuk', 'bahan_pkeluar.id_pmasuk = bahan_pmasuk.id_pmasuk', 'left');
        $this->db->join('detail_tpabrik', 'bahan_pmasuk.id_detail = detail_tpabrik.id_detail', 'left');
        $this->db->join('transaksi_pabrik', 'detail_tpabrik.id_tpabrik = transaksi_pabrik.id_tpabrik', 'left');
        $this->db->join('bahan_baku', 'bahan_baku.id_bahan = detail_tpabrik.id_bahan', 'left');
        $this->db->join('user', 'transaksi_pabrik.id_user = user.id_user', 'left');
        $this->db->where('YEAR(bahan_pkeluar.tgl_keluar)', $tahun);
        return $this->db->get()->result();
    }
}

/* End of file mLaporan.php */
