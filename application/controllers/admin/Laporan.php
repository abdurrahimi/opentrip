<?php
require_once FCPATH ."/vendor/autoload.php";
/**
 * 
 */
class Laporan extends CI_Controller
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
		$sql = "select * from tbl_opentrip";
		$data['listData'] = $this->db->query($sql)->result();	
		$data['v_content'] = "admin/laporan/index";
		$this->load->view("admin/layout",$data);
	}

	public function cetak(){
		$data['userLogin'] = $this->session->userdata('loginDataAdmin');
		$post = $this->input->post();
		$where = " where 1 = 1 ";
		if(!empty($post['jadwal'])){
			$where .= " and b.id_jadwal = '".$post['jadwal']."'";
		}
		if(!empty($post['status'])){
			$where .= " and a.`status` = ".$post['status'];
		}

		if(!empty($post['tujuan'])){
			$where .= " AND b.id_opentrip = ".$post['tujuan'];
		}
		$sql = "select * from tbl_transaksi a 
				LEFT JOIN tbl_detail_transaksi b on a.transaksi_id = b.id_transaksi 
				left join tbl_opentrip c on b.id_opentrip = c.opentrip_id 
				LEFT JOIN tbl_jadwal d on b.id_jadwal = d.jadwal_id
				left join tbl_member e on a.id_member = e.member_id
				" . $where;
		$data['listData'] = $this->db->query($sql)->result();	
		$data['v_content'] = "admin/laporan/result";
		$mpdf = new \Mpdf\Mpdf();
		$res = $this->load->view("admin/laporan/result",$data,TRUE);
		$mpdf->WriteHTML($res);
		$mpdf->Output();
		

	}

	public function printPDF()
	{
		
	}


	public function getJadwal(){
		$post 		= $this->input->post();
		$jadwal 	= $post['tujuan'];
        $tmp        = '';
        $sql 		= "select * from tbl_jadwal where id_opentrip =".$jadwal;

        $data 		= $this->db->query($sql)->result();
        if(!empty($data)) {
            $tmp .= "<option value=''>Pilih Jadwal</option>";
            foreach($data as $row){
                 $tmp .= "<option value='".$row->jadwal_id ."'>".$row->jadwal ."</option>";
            }
        } else {
            $tmp .= "<option value=''>Jadwal Tidak Tersedia</option>";
        }

        $data_array = array("jadwal" => $tmp);
        
        $json = json_encode ( $data_array );
        header ( 'Access-Control-Allow-Origin: *' );
        header ( 'Access-Control-Expose-Headers: Access-Control-Allow-Origin' );
        header ( "HTTP/1.1 200 OK" );
        header ( 'Content-Type: application/json' );
        echo $json;
        die ();

        die($tmp);
	}

	
}
?>