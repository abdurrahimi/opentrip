<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	function __construct(){
        parent::__construct();
		$this->load->model('Auth_model');
		/* $this->load->model('supplier_model');
		$this->load->model('pelanggan_model');
		$this->load->model('produk_model');
		$this->load->model('kategori_model');
        $this->load->model('penjualan_model');
        $this->load->model('retur_penjualan_model'); */
		
		// Check Session Login
		/*if(empty($this->session->userdata('loginDataAdmin'))){
           redirect('auth'); 
        }*/
	}
	
	function index(){
		$data['userLogin'] 		= $this->session->userdata('loginDataAdmin');
		$data['v_content'] = "admin/dashboard/content";
		$this->load->view('admin/layout',$data);
	}
}
