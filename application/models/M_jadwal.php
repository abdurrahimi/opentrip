<?php

/**
 * 
 */
class M_jadwal extends CI_Model
{
	

	public function insert($data){
        $this->db->insert('tbl_jadwal', $data);
        return $this->db->insert_id();
	}

	public function update($id,$data){
        $this->db->where('jadwal_id', $id);
        $this->db->update('tbl_jadwal', $data);
    }

    public function counts($id){
    	return $this->db->query('select count(jadwal_id) as total from tbl_jadwal where id_opentrip ="'.$id.'"')->row_array();
    }

    public function getById($id){
    	$sql = 'select * from tbl_jadwal where id_opentrip ="'.$id.'"';
    	$result = $this->db->query($sql)->result_array();
    	return $result;
    }
}