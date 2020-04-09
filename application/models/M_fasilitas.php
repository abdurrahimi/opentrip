<?php

class M_fasilitas extends CI_Model {

    public function getById($id){
        $sql = "select * from tbl_fasilitas where id_opentrip ='".$id."'";
        $result = $this->db->query($sql)->row_array();
        return $result;
    }

    public function insert($id,$post){
        $sql= "insert into tbl_fasilitas (id_opentrip,fasilitas) values ('".$id."','".$post['fasilitas']."')";
        $this->db->query($sql);
    }

    public function delete($id){
        $sql = "delete from tbl_fasilitas where id_opentrip ='".$id."'";
        $this->db->query($sql);
    }

}
