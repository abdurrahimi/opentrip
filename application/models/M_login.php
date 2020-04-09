<?php

class M_login extends CI_Model {

    function checkLogin($username,$password){
        $this->db->select('*');
        $this->db->from('tbl_admin u');
        $this->db->where('u.username', $username);
        $this->db->where('u.password', $password);
        $query = $this->db->get();
        if($query->num_rows()>0){
			$querycheck = $query->row();
			$dataArr = array(
				'UserID'    	=> $querycheck->admin_id,
				'Username'  	=> $querycheck->username
			);
			$this->session->set_userdata('loginData',$dataArr);
            return true;
        }else{ 
            return false;
        }
	}

	
	public function checkLoginMember($email,$password){
        $this->db->select('member_id');
        $this->db->from('tbl_member');
        $this->db->where('member_email', $email);
        $this->db->where('member_password', md5($password));
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}


	
}
