<?php
/**
 * 
 */
class Pesanan extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

		if(!$this->session->userdata('loginDataAdmin')){
           redirect('admin/auth'); 
        }
		
	}

	public function index(){
		$data['userLogin'] = $this->session->userdata('loginDataAdmin');
		$sql = "select * from tbl_transaksi a left join tbl_member d on a.id_member = d.member_id";
		$transaksi = $this->db->query($sql)->result_array();

		foreach ($transaksi as $key => $value) {
			$detailsql = "select a.detail_id,a.jumlah,b.judul,b.harga,c.jadwal from tbl_detail_transaksi a 
			left join tbl_opentrip b on a.id_opentrip = b.opentrip_id
			left join tbl_jadwal c on a.id_jadwal = c.jadwal_id where a.id_transaksi = '". $value['transaksi_id'] ."'";
			$detail[$value['transaksi_id']] = $this->db->query($detailsql)->result_array();
		}
		//var_dump($detail); exit;

		$data['listData'] = $transaksi;
		$data['listDetail'] = $detail;
		$data['v_content'] = 'admin/pesanan/index';
		$this->load->view('admin/layout',$data);

	}

	public function bayar(){
		$post = $this->input->post();
		$sql = "update tbl_transaksi set status = 1 where transaksi_id = '".$post['id']."'";
		$this->db->query($sql);

		redirect(site_url('admin/pesanan'));
	}

}