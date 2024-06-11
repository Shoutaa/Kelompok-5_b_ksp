<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Author : Aris Setyono
*/

class Ajax extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('logged_in')!=TRUE) redirect('main/logout');
	}

	public function denda($pinjaman_id)
	{
		/*
		* Cara ngitung denda : 
		* Bulan jatuh tempo = bulan awal peminjaman + cicilan ke
		* Denda = (Tanggal bayar - Tanggal jatuh tempo) x 0.2xBunga bulan tersebut
		*/

		$this->load->model('pinjaman_model');
		$this->load->model('keanggotaan');

		$tanggal = $this->input->get('tanggal');
		$tanggal_bayar = date("Y-m-d", strtotime($tanggal));
		$pinjaman = $this->pinjaman_model->getID($pinjaman_id);
		foreach ($pinjaman as $key);
		$tanggal_db = $key['tanggal'];
		$kode_nasabah = $key['kode_nasabah'];
		$status_db = $key['status'];

		$peminjamantime = strtotime($tanggal_db);

		// $bulan_awal_peminjaman = date("m", $peminjamantime);

		$jatuhtempotime = mktime(0, 0, 0, date("m", $peminjamantime)+$status_db+1, date("d", $peminjamantime), date("Y", $peminjamantime));
		$tanggal_jatuh_tempo_db = date("Y-m-d", $jatuhtempotime);
		$tanggal_jatuh_tempo = ($this->input->get('jatuh_tempo')) ? $this->input->get('jatuh_tempo') : $tanggal_jatuh_tempo_db ;
		$jasa = $this->input->get('jasa');

		if(strtotime($tanggal_bayar) > strtotime($tanggal_jatuh_tempo)){
			$dStart = new DateTime($tanggal_jatuh_tempo);
			$dEnd = new DateTime($tanggal_bayar);
			$dDiff = $dStart->diff($dEnd);
			$selisih = $dDiff->days;
			$denda_db = $this->keanggotaan->getDenda($kode_nasabah);
			foreach ($denda_db as $key);
			$denda_pinjaman = $key['denda_pinjaman'];
			$denda = $selisih * $denda_pinjaman * $jasa;
		}else{
			$selisih=$denda_pinjaman=$denda= 0;
		}
		$data = array('jatuhtempo'=>$tanggal_jatuh_tempo, 'selisih'=>$dDiff, 'denda'=>round($denda));
		
		$this->output->set_content_type('application/json')->set_output(json_encode($data, TRUE));
	}
}