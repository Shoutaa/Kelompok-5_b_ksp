<?php 
/**
* Author : Aris Setyono
*/
class Preference_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function get($attr = NULL){
		if($attr) $this->db->where('attr', $attr);
		$query = $this->db->get('preference');
		return $query->result_array();
	}

	function update($key, $value){
		$this->db->where('attr', $key);
		$this->db->update('preference', array('value'=>$value));
	}

}