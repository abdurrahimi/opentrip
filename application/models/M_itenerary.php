<?php

class M_itenerary extends CI_Model {

    public function getById($id){
        $sql = "select * from tbl_itenerary where id_opentrip ='".$id."'";
        $result = $this->db->query($sql)->row_array();
        return $result;
    }

    public function insert($id,$post){
        $sql= "insert into tbl_itenerary (id_opentrip,itenerary) values ('".$id."','".$post['itenerary']."')";
        $this->db->query($sql);
    }

    public function delete($id){
        $sql = "delete from tbl_itenerary where id_opentrip ='".$id."'";
        $this->db->query($sql);
    }

}
