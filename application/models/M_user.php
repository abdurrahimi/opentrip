<?php

class M_user extends CI_Model {

   public function getUser($lv){
    $this->db->select('*');
        $this->db->from('user');
        $this->db->where('level', $lv);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
   }

    public function insert($data){
        $this->db->insert('user', $data);
        return $this->db->insert_id();
    }

    public function update($id,$data){
        $this->db->where('userid', $id);
        $this->db->update('user', $data);
    }

    public function delete($id){
        $this->db->delete('userid', array('question_id' => $id));
    }
}
