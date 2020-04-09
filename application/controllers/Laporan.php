<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends MY_Controller {
	function __construct(){
        parent::__construct();
		//$this->load->model('Auth_model');
		/* $this->load->model('supplier_model');
		$this->load->model('pelanggan_model');
		$this->load->model('produk_model');
		$this->load->model('kategori_model');
        $this->load->model('penjualan_model');
        $this->load->model('retur_penjualan_model'); */
		
		// Check Session Login
		if(!$this->session->userdata('loginData')){
           redirect('auth'); 
        }
	}
	
	function index(){
		$data['userLogin'] 		= $this->session->userdata('loginData');
		//$data['property']		= $this->db->query("select * from iklan_property ")->num_rows();
		//$data['member']			= $this->db->query("select * from pengguna where jenis_user = 2 ")->num_rows();
		//$data['kota']			= $this->db->query("select * from kota where id_kota in (select id_kota from iklan_property)")->num_rows();
		
		$data['content_tengah'] = "home/dashboard";
		$this->load->view('layout',$data);
	}
}
