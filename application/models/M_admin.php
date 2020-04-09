<?php
/**
 * 
 */
class M_admin extends CI_Model
{
    
    function __construct()
    {
        parent::__construct();
    }

    public function getAdmin(){
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function getAdminDetail($id){
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('admin_id' , $id);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }
}

?>