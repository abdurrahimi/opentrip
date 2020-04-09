<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Opentrip extends MY_Controller {
	function __construct(){
        parent::__construct();
		//$this->load->model('Auth_model');
		/* $this->load->model('supplier_model');
		$this->load->model('pelanggan_model');
		$this->load->model('produk_model');
		$this->load->model('kategori_model');
        $this->load->model('penjualan_model');
        $this->load->model('retur_penjualan_model'); */
        $this->load->model('M_opentrip');
		
		// Check Session Login
		if(!$this->session->userdata('loginData')){
           redirect('auth'); 
        }
	}
	
	public function index(){
		$data['userLogin'] 		= $this->session->userdata('loginData');
		$data['opentrip']		= $this->M_opentrip->getAll();
		$data['content_tengah'] = "opentrip/index";
		$this->load->view('layout',$data);
	}

	 public function create(){
		$data['userLogin'] = $this->session->userdata('loginData');
		$data['content_tengah'] = "opentrip/form";
        $this->load->view('layout',$data);
    }

 	public function edit($id = ''){
		$data['userLogin'] = $this->session->userdata('loginData');
        $check_id = $this->M_opentrip->get_by_id($id);
        if($check_id){
            $data['opentrip'] = $check_id[0];
			$data['content_tengah'] = "opentrip/form";
            $this->load->view('layout',$data);
        }else{
            redirect(site_url('opentrip'));
        }
    }

     public function save($id = ''){
		$post = $this->input->post();
		$data['judul'] = $post['judul'];
		$data['harga'] = $post['harga'];
		$data['pergi'] = $post['pergi'];
		$data['pulang'] = $post['pulang'];

        if (!empty($id)) {
            // EDIT
            $check_id = $this->M_opentrip->get_by_id($id);
            if($check_id){
                unset($data['id']);
                $this->petugas_model->update($id,$data);
            }
        }elseif(empty($id)){
            // INSERT NEW
            $this->M_opentrip->insert($data);
        }else{
            $this->session->set_flashdata('form_false', 'Harap periksa form anda.');
            redirect(site_url('petugas/create'));
        }
        redirect(site_url('opentrip'));
    }
}
