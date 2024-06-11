<?php
class Pinjaman_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function getID($id)
    {
    	$this->db->where('id', $id);
        $query = $this->db->get('pinjaman');
        return $query->result_array();
    }
}