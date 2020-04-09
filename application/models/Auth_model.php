<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {
	function __construct(){
        parent::__construct();
	}
	
	function checkLogin($Username,$Password){
       
        $this->db->select('*');
        $this->db->from('tbl_admin as us');
        $this->db->where('us.username', $Username);
        $this->db->where('us.password', md5($Password));
        $query = $this->db->get();
        if($query->num_rows()>0){
			$querycheck = $query->result();
			$dataArr = array('id' => $querycheck[0]->admin_id,
							 'username' => $querycheck[0]->username,
							 'logged_in' => TRUE,);
			$this->session->set_userdata('loginDataAdmin',$dataArr);
            return true;    
        }else{
			$this->session->set_flashdata('GagalLogin', 'Ya');    
            return false;
        }
        
        
    }

    function checkLoginUser($Username,$Password){

        //echo $Password; exit;
        $sql = "select * from tbl_member where username='".$Username."'";
        $query = $this->db->query($sql)->row_array();
        //var_dump($query); exit;
        if(!empty($query)){
            if($query['password']== md5($Password)){
                $dataArr = array('id' => $query['member_id'],
                                 'username' => $query['username'],
                                 'logged_in' => TRUE,);
                $this->session->set_userdata('loginUser',$dataArr);
                return true; 
            }else{
                $this->session->set_flashdata('gagal', 'Password Salah!');
            }

        }else{
            $this->session->set_flashdata('gagal', 'Username Salah!');
            return false;
        }
        
    }
}