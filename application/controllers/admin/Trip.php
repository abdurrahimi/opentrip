<?php

/**
 * 
 */
class Trip extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_umum');
		$this->load->model('m_trip');
		$this->load->model('M_itenerary');
		$this->load->model('M_fasilitas');
		$this->load->model('M_jadwal');
		if(empty($this->session->userdata('loginDataAdmin'))){
           redirect('admin/auth'); 
        }
	}

	public function index(){
		$data['userLogin'] = $this->session->userdata('loginDataAdmin');
		$data['listData'] = $this->m_trip->getTrip();
		$data['v_content'] = "admin/trip/daftar";
		$this->load->view("admin/layout",$data);
	}

	public function add(){
		$data['userLogin'] = $this->session->userdata('loginDataAdmin');
		$data['v_content'] = "admin/trip/add";
		$this->load->view("admin/layout" , $data);
	}

	public function jadwal($id=''){
		if(empty($id)){
			redirect('admin/trip/');
		}
		$data['userLogin'] = $this->session->userdata('loginDataAdmin');
		$data['v_content'] = "jadwal/form";
		$check = $this->M_jadwal->counts($id);
		if($check['total']>0){
			$data['jadwal'] = $this->M_jadwal->getById($id);
		}
		$data['judul'] = $this->m_trip->getTripDetail($id);
		$this->load->view("admin/layout" , $data);
	}

	public function saveJadwal($id){
		$post = $this->input->post();
		if(empty($post)){
			redirect('admin/trip');
		}
		$data['id_opentrip'] = $id;
		foreach ($post['tanggal'] as $key => $value) {
			$data['jadwal'] = $value;
			$this->M_jadwal->insert($data);
		}
		redirect('admin/trip');
	}

	public function editJadwal($id){

		$post = $this->input->post();
		$new['id_opentrip'] = $id;
		$i=0;
		foreach ($post['tanggal'] as $key => $value) {
			if(isset($post['jadwal_id'][$i])){
				$id=$post['jadwal_id'][$i];
				$data['jadwal']= $value;
				$this->M_jadwal->update($id,$data);
			}else{
				$new['jadwal'] = $value;
				$this->M_jadwal->insert($new);
			}
			$i++;		
		}

		redirect('admin/trip');
	}

	public function itenarary($id=''){
		if(empty($id)){
			redirect('admin/trip/');
		}
		$data['userLogin'] = $this->session->userdata('loginDataAdmin');
		$data['v_content'] = "admin/itenarary/add";
		$data['itenerary'] = $this->M_itenerary->getById($id);

		$this->load->view("admin/layout" , $data);
	}

	public function saveItenerary($id=''){
		$post = $this->input->post();
		if(empty($post)){
			redirect('admin/trip/');
		}
		$this->M_itenerary->delete($id);
		$this->M_itenerary->insert($id,$post);
		
		redirect('admin/trip/');
	}

	public function fasilitas($id=''){
		if(empty($id)){
			redirect('admin/trip/');
		}
		$data['userLogin'] = $this->session->userdata('loginDataAdmin');
		$data['v_content'] = "admin/fasilitas/add";
		$data['fasilitas'] = $this->M_fasilitas->getById($id);

		$this->load->view("admin/layout" , $data);
	}

	public function saveFasilitas($id=''){
		$post = $this->input->post();
		if(empty($post)){
			redirect('admin/trip/');
		}
		$this->M_fasilitas->delete($id);
		$this->M_fasilitas->insert($id,$post);
		redirect('admin/trip/');
	}


	public function foto($id=''){
		if(empty($id)){
			redirect('admin/trip/');
		}
		$data['userLogin'] = $this->session->userdata('loginDataAdmin');
		$data['v_content'] = "admin/trip/foto";
		$check = $this->M_jadwal->counts($id);
		if($check['total']>0){
			$data['jadwal'] = $this->M_jadwal->getById($id);
		}
		$data['id_opentrip'] = $id;
		$data['judul'] = $this->m_trip->getTripDetail($id);
		$this->load->view("admin/layout" , $data);
	}

	public function doDeleteImage($id_opentrip, $trip_foto_id){
		if(empty($trip_foto_id)){
			redirect('admin/trip/');
		}
		$data['userLogin'] = $this->session->userdata('loginDataAdmin');

		$delete = $this->db->delete("tbl_trip_foto", array("trip_foto_id" => $trip_foto_id));
		redirect('admin/trip/foto/'.$id_opentrip);
	}

	public function doAddFoto($id_opentrip){
		if(empty($id_opentrip)){
			redirect('admin/trip/');
		}
		$data['userLogin'] = $this->session->userdata('loginDataAdmin');
		$post = $this->input->post();
		$upload_path = './uploads';
		if ($_FILES['foto']['name'] <> "") {
			$ext           = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
			$foto = "FI".date("dmYHis").rand(100,999).".".$ext;

			$config['upload_path']   = $upload_path;
			$config['allowed_types'] = 'PNG|png|JPG|jpg|JPEG|jpeg';
			$config['file_name']     = $foto;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if ( ! $this->upload->do_upload('foto')){
				$error = 'error: '. $this->upload->display_errors();
				echo $error;
				die();
			}
		}
		$dataArray = array(
			"foto"			=> $foto,
			"id_opentrip"	=> $id_opentrip
		);
		$insert = $this->db->insert("tbl_trip_foto" , $dataArray);
		redirect('admin/trip/foto/'.$id_opentrip);
	}

	public function doAdd(){
			/*====================================== BEGIN UPLOADING FEATEURE IMAGE ======================================*/
		$data['userLogin'] = $this->session->userdata('loginDataAdmin');
		$post = $this->input->post();
		
		$dataArray = array(
			"judul"		=> $post['judul'],
			"harga"		=> $post['harga'],
			"kuota"		=> $post['kuota'],
			"catatan"	=> $post['catatan'],
			 );
		$insert = $this->db->insert("tbl_opentrip" , $dataArray);
		if($insert){
			$this->m_umum->generatePesan("Berhasil menambahkan data","berhasil");
			redirect('admin/trip');
		}else{
			$this->m_umum->generatePesan("Gagal menambahkan data","gagal");
			redirect('admin/trip/add');
		}
	}

	public function edit($id){
		$data['userLogin'] = $this->session->userdata('loginDataAdmin');
		$data['detailData'] = $this->m_trip->getTripDetail($id);
		$data['v_content'] = "admin/trip/edit";
		$this->load->view("admin/layout" , $data);
	}

	public function doEdit($id){
		$data['userLogin'] = $this->session->userdata('loginDataAdmin');
		$post = $this->input->post();
		
		$dataArray = array(
			"judul"			=> $post['judul'],
			"harga"			=> $post['harga'],
			"is_unlimited"	=> $post['status'],
			"catatan"		=> $post['catatan'],
		);

		if ($post['kuota']) {
			$dataArray['kuota'] = $post['kuota'];
		}
		
		
		$update = $this->db->update("tbl_opentrip" , $dataArray, array('opentrip_id' => $id ));
		if($update){
			$this->m_umum->generatePesan("Berhasil mengubah data","berhasil");
			redirect('admin/trip');
		}else{
			$this->m_umum->generatePesan("Gagal mengubah data","gagal");
			redirect('admin/trip/edit');
		}
	}

	public function doDelete($id){
		$delete = $this->db->delete("tbl_opentrip" , array('opentrip_id' => $id ));
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