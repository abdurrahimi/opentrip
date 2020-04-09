<?php

/**
 * 
 */
class Member extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_umum');
		$this->load->model('m_member');
		if(!$this->session->userdata('loginDataAdmin')){
           redirect('admin/auth'); 
        }
	}

	public function index(){
		$data['userLogin'] = $this->session->userdata('loginDataAdmin');
		$data['listData'] = $this->m_member->getMember();
		$data['v_content'] = "admin/member/daftar";
		$this->load->view("admin/layout",$data);
	}

	public function add(){
		$data['userLogin'] = $this->session->userdata('loginDataAdmin');
		$data['v_content'] = "admin/member/add";
		$this->load->view("admin/layout" , $data);
	}

	public function doAdd(){
		$data['userLogin'] = $this->session->userdata('loginDataAdmin');
		$post = $this->input->post();

		$dataArray = array(
			'nama' 	=> $post['nama'],
			'username' 	=> $post['username'],
			'password' 	=> md5($post['password']),
			 );
		$insert = $this->db->insert("tbl_member" , $dataArray);
		if($insert){
			$this->m_umum->generatePesan("Berhasil menambahkan data","berhasil");
			redirect('admin/member');
		}else{
			$this->m_umum->generatePesan("Gagal menambahkan data","gagal");
			redirect('admin/member/add');
		}
	}

	public function edit($id){
		$data['userLogin'] = $this->session->userdata('loginDataAdmin');
		$data['detailData'] = $this->m_member->getMemberDetail($id);
		$data['v_content'] = "admin/member/edit";
		$this->load->view("admin/layout" , $data);
	}

	public function doEdit($id){
		$data['userLogin'] = $this->session->userdata('loginDataAdmin');
		$post = $this->input->post();

		$dataArray = array(
			'nama' 	=> $post['nama'],
			'username' => $post['username'],
		);
		
		if (!empty($post['password'])) {
			$dataArray['password'] = md5($post['password']);
		}
		$update = $this->db->update("tbl_member" , $dataArray, array('member_id' => $id ));
		if($update){
			$this->m_umum->generatePesan("Berhasil mengubah data","berhasil");
			redirect('admin/member');
		}else{
			$this->m_umum->generatePesan("Gagal mengubah data","gagal");
			redirect('admin/member/edit');
		}
	}

	public function doDelete($id){
		$delete = $this->db->delete("tbl_member" , array('member_id' => $id ));
		if($delete){
			$this->m_umum->generatePesan("Berhasil menghapus data","berhasil");
			redirect('admin/member');
		}else{
			$this->m_umum->generatePesan("Gagal menghapus data","gagal");
			redirect('admin/member');
		}
	}
}
?>