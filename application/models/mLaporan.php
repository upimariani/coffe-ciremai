<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mLaporan extends CI_Model
{

    //---------laporan biasa------------
    public function lap_harian($tanggal, $bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('bb_keluarpabrik');
        $this->db->join('bb_masukpabrik', 'bb_keluarpabrik.id_bbmasukp = bb_masukpabrik.id_bbmasukp', 'left');
        $this->db->join('detail_invoicep', 'bb_masukpabrik.ide_detailp = detail_invoicep.ide_detailp', 'left');
        $this->db->join('invoice_pabrik', 'detail_invoicep.id_invoicep = invoice_pabrik.id_invoicep', 'left');
        $this->db->join('bahan_baku', 'bahan_baku.id_bahanbaku = detail_invoicep.id_bahanbaku', 'left');
        $this->db->join('user', 'invoice_pabrik.id_user = user.id_user', 'left');

        $this->db->where('DAY(bb_keluarpabrik.tgl_keluar)', $tanggal);
        $this->db->where('MONTH(bb_keluarpabrik.tgl_keluar)', $bulan);
        $this->db->where('YEAR(bb_keluarpabrik.tgl_keluar)', $tahun);
        return $this->db->get()->result();
    }

    public function lap_bulanan($bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('bb_keluarpabrik');
        $this->db->join('bb_masukpabrik', 'bb_keluarpabrik.id_bbmasukp = bb_masukpabrik.id_bbmasukp', 'left');
        $this->db->join('detail_invoicep', 'bb_masukpabrik.ide_detailp = detail_invoicep.ide_detailp', 'left');
        $this->db->join('invoice_pabrik', 'detail_invoicep.id_invoicep = invoice_pabrik.id_invoicep', 'left');
        $this->db->join('bahan_baku', 'bahan_baku.id_bahanbaku = detail_invoicep.id_bahanbaku', 'left');
        $this->db->join('user', 'invoice_pabrik.id_user = user.id_user', 'left');
        $this->db->where('MONTH(bb_keluarpabrik.tgl_keluar)', $bulan);
        $this->db->where('YEAR(bb_keluarpabrik.tgl_keluar)', $tahun);
        return $this->db->get()->result();
    }

    public function lap_tahunan($tahun)
    {
        $this->db->select('*');
        $this->db->from('bb_keluarpabrik');
        $this->db->join('bb_masukpabrik', 'bb_keluarpabrik.id_bbmasukp = bb_masukpabrik.id_bbmasukp', 'left');
        $this->db->join('detail_invoicep', 'bb_masukpabrik.ide_detailp = detail_invoicep.ide_detailp', 'left');
        $this->db->join('invoice_pabrik', 'detail_invoicep.id_invoicep = invoice_pabrik.id_invoicep', 'left');
        $this->db->join('bahan_baku', 'bahan_baku.id_bahanbaku = detail_invoicep.id_bahanbaku', 'left');
        $this->db->join('user', 'invoice_pabrik.id_user = user.id_user', 'left');
        $this->db->where('YEAR(bb_keluarpabrik.tgl_keluar)', $tahun);
        return $this->db->get()->result();
    }
}

/* End of file mLaporan.php */
