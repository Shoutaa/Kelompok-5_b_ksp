<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Author : Aris Setyono
*/

class Logo extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('logged_in')!=TRUE) redirect('main/logout');
		$this->load->model('Preference_model');
	}

	public function index(){
		$data['db'] = $this->Preference_model->get();

		$this->load->view('template/head');
		$this->load->view('template/menu');

		$this->load->view('logo/index',$data);
		$this->load->view('template/script');
	}

	public function simpan(){
		$config['upload_path'] = './assets/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		// if($this->input->post('logo_koperasi')){
			if (!$this->upload->do_upload('logo_koperasi')){
				$error = $this->upload->display_errors();
				print_r($error);
			} else {
				$data = $this->upload->data();
				$this->Preference_model->update('kop_koperasi', $data['file_name']);
				// print_r($data['file_name']);
			}
		// }
		// if($this->input->post('logo_sendiri')){
			if (!$this->upload->do_upload('logo_sendiri')){
				$error = $this->upload->display_errors();
				print_r($error);
			} else {
				$data = $this->upload->data();
				$this->Preference_model->update('kop_logo', $data['file_name']);
				// print_r($data['file_name']);
			}
		// }

		if($this->input->post('head')){
			$this->Preference_model->update('kop_text', $this->input->post('head'));
		}
		redirect('logo');
	}
}