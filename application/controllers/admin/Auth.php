<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	function __construct() {
		parent::__construct();
        $this->load->model('auth_model');
        if($this->session->userdata('loginDataAdmin')){
           redirect('admin/dashboard'); 

            //$userLogin = $this->session->userdata('loginDataAdminAdmin');
        }
	}
	
	public function index()
	{
		$this->load->view('admin/login');
	}
	
	function doLogin() {
        $dataPost = $this->input->post();
        
        if ($this->auth_model->checkLogin($dataPost['username'], $dataPost['password'])) {
            $this->session->set_flashdata('tampil_pesan','yes');
            redirect('admin/dashboard');       
        } else {
            $this->session->set_flashdata('GagalLogin', 'Ya');
            redirect('admin/auth');
        }        
    }    

    function logout() {
        $this->session->unset_userdata('loginDataAdminAdmin');
        $this->clear_cache();
        redirect('admin/auth');
    }

    function clear_cache()
    {
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }
	
	
}
