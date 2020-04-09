<?php

class M_global extends CI_Model {
	function __construct() {
        parent::__construct();
    }

    public function getDomExist(){
        $this->db->select('*');
        $this->db->from('tbl_province');
        $this->db->where('province_id IN (select id_province from tbl_opentrip)');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    
    
}
