<?php
/**
 * 
 */
class M_trip extends CI_Model
{
    
    function __construct()
    {
        parent::__construct();
    }

    public function getTrip(){
        $this->db->select('*');
        $this->db->from('tbl_opentrip');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function getTripDetail($id){
        $this->db->select('*');
        $this->db->from('tbl_opentrip');
        $this->db->where('opentrip_id' , $id);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }
}

?>