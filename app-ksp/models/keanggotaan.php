<?php
class Keanggotaan extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        // $this->output->enable_profiler(TRUE);
    }

    function edit($id)
    {
        $this->jenis = $this->input->post('jenis');
        $this->simpanan_pokok = $this->input->post('simpanan_pokok');
        $this->simpanan_wajib = $this->input->post('simpanan_wajib');
        $this->bunga_simpanan = $this->input->post('bunga_simpanan');
        $this->bunga_pinjaman = $this->input->post('bunga_pinjaman');
        $this->denda_pinjaman = $this->input->post('denda_pinjaman');
        $this->keterangan = $this->input->post('keterangan');
        $this->db->update('keanggotaan', $this, array('id'=>$id));
    }

    function getOptionKeanggotaan()
    {
    	$query = $this->db->get('keanggotaan');
    	$dropdown[0] = '-- Pilih Keanggotaan --';
        foreach ($query->result() as $row) {
            $dropdown[$row->id] = $row->jenis;
        }
        return $dropdown;
    }

    function getDenda($kode)
    {
        $this->db->select('keanggotaan.denda_pinjaman');
        $this->db->where('nasabah.kode', $kode);
        $this->db->join('keanggotaan','nasabah.keanggotaan_id=keanggotaan.id');
        $query = $this->db->get('nasabah');
        return $query->result_array();
    }
}