<?php
/**
 * 
 */
class M_member extends CI_Model
{
    
    function __construct()
    {
        parent::__construct();
    }

    public function getMember(){
        $this->db->select('*');
        $this->db->from('tbl_member');
        $this->db->join('tbl_province','tbl_province.province_id = tbl_member.id_province');
        $this->db->join('tbl_city','tbl_city.city_id = tbl_member.id_city');
        $this->db->join('tbl_subdistrict','tbl_subdistrict.subdistrict_id = tbl_member.id_subdistrict');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function getMemberDetail($id){
        $this->db->select('*');
        $this->db->from('tbl_member');
        $this->db->where('member_id' , $id);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }
}

?>