<?php

/**
 * 
 */
class Admin extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_umum');
		$this->load->model('m_admin');
		if(!$this->session->userdata('loginDataAdmin')){
           redirect('auth'); 
        }
	}

	public function index(){
		$data['userLogin'] = $this->session->userdata('loginDataAdmin');
		$data['listData'] = $this->m_admin->getAdmin();
		$data['v_content'] = "admin/admin/daftar";
		$this->load->view("admin/layout",$data);
	}

	public function add(){
		$data['userLogin'] = $this->session->userdata('loginDataAdmin');
		$data['v_content'] = "admin/admin/add";
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
		$insert = $this->db->insert("tbl_admin" , $dataArray);
		if($insert){
			$this->m_umum->generatePesan("Berhasil menambahkan data","berhasil");
			redirect('admin/admin');
		}else{
			$this->m_umum->generatePesan("Gagal menambahkan data","gagal");
			redirect('admin/admin/add');
		}
	}

	public function edit($id){
		$data['userLogin'] = $this->session->userdata('loginDataAdmin');
		$data['detailData'] = $this->m_admin->getAdminDetail($id);
		$data['v_content'] = "admin/admin/edit";
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
		$update = $this->db->update("tbl_admin" , $dataArray, array('admin_id' => $id ));
		if($update){
			$this->m_umum->generatePesan("Berhasil mengubah data","berhasil");
			redirect('admin/admin');
		}else{
			$this->m_umum->generatePesan("Gagal mengubah data","gagal");
			redirect('admin/admin/edit');
		}
	}

	public function doDelete($id){
		$delete = $this->db->delete("tbl_admin" , array('admin_id' => $id ));
		if($delete){
			$this->m_umum->generatePesan("Berhasil menghapus data","berhasil");
			redirect('admin/admin');
		}else{
			$this->m_umum->generatePesan("Gagal menghapus data","gagal");
			redirect('admin/admin');
		}
	}
}
?>