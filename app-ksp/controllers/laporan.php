<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Author : Aris Setyono
*/

class Laporan extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('logged_in')!=TRUE) redirect('main/logout');
		$this->load->model('Laporan_model');
		$this->load->model('Preference_model');
	}

	public function index()
	{
		$data['db'] = $this->Laporan_model->get();
		$data['kop'] = $this->Preference_model->get();

		$this->load->view('template/head');
		$this->load->view('template/menu');

		$this->load->view('laporan/index',$data);
		$this->load->view('template/script');
	}
}