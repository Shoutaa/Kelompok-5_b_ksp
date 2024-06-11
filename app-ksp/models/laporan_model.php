<?php 

class Laporan_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function get()
	{
		$per = ($this->input->get('per')) ? $this->input->get('per') : date('Y-m') ;
		if($per != 'all'){
			$this->db->where('DATE_FORMAT(tanggal, "%Y-%m") =', $per);
		}
		$this->db->order_by('tanggal');
		$query = $this->db->get('view_laporan');
		return $query->result();
	}

	function getPeriode()
	{
		$query = $this->db->query('SELECT DATE_FORMAT(tanggal, "%Y-%m") as ukey, DATE_FORMAT(tanggal, "%M %Y") as periode  FROM `view_laporan` order by tanggal asc');
        $dropdown['all'] = '-- Semua --';
        foreach ($query->result() as $row) {
            $dropdown[$row->ukey] = $row->periode;
        }
        return $dropdown;
	}
}