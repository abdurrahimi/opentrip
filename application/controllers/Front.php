<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends MY_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('auth_model');
		$this->load->model('m_opentrip');
        $this->load->model('m_member');

	}


	
	public function index()
	{
        $data['dataUser'] = $this->session->userdata('loginUser');
        
        $sql = "select * from tbl_opentrip limit 10";
        $data['listData']  = $this->db->query($sql)->result();
        $data['listSlider']  = $this->db->query("select * from tbl_opentrip where opentrip_id IN (select id_opentrip from tbl_trip_foto) limit 3" )->result();
        $data['v_content'] = "front/home";
		$this->load->view('front/layout',$data);
	}

    public function list(){
        $data['dataUser'] = $this->session->userdata('loginUser');
        $data['v_content'] = "front/list";
        if(!empty($_GET['province'])){
            $sql = "select * from tbl_opentrip where id_province = '".$_GET['province']."'";
            $data['province'] = $this->db->query("select * from tbl_province where province_id = '".$_GET['province']."'")->row_array();
        }else{
            $sql = "select * from tbl_opentrip";
        }
        
        $data['listData']  = $this->db->query($sql)->result();
        $this->load->view('front/layout',$data);
    }

	public function detail($id){
		$data['dataUser'] = $this->session->userdata('loginUser');
		$sql = "select * from tbl_opentrip where opentrip_id ='".$id."'";
		$data['listData'] = $this->db->query($sql)->row_array();

        $getFoto = $this->db->query("select foto from tbl_trip_foto where id_opentrip = '".$id."'")->result_array();
        if(!empty($getFoto)){
            $returnFoto = array();
            foreach ($getFoto as $key => $value) {
                $value['foto'] = base_url("uploads/".$value['foto']);

                $returnFoto[] = $value;
            }
            $data['listFoto'] = $returnFoto;
        }else{
            $path = base_url()."assets_front/images/product-2/big-img/";
            $foto = array
                      (
                      array("foto" => $path."1.jpg"),
                      array("foto" => $path."2.jpg"),
                      array("foto" => $path."3.jpg"),
                      );

            $data['listFoto'] =  $foto;

        }
        

		$sqljadwal = "select * from tbl_jadwal where id_opentrip = '".$id."'";
		$data['jadwal'] = $this->db->query($sqljadwal)->result_array();
		$sqlitenary = "select * from tbl_itenerary where id_opentrip ='".$id."'";
		$data['itenerary'] = $this->db->query($sqlitenary)->row_array();
		$sqlfasilitas = "select * from tbl_fasilitas where id_opentrip = '".$id."'";
		$data['fasilitas'] = $this->db->query($sqlfasilitas)->row_array();

        $data['listTrip']  = $this->db->query("select * from tbl_opentrip")->result();

		$data['v_content'] = "front/detail";
		//var_dump($data['listData']['catatan']); exit;
		$this->load->view('front/layout',$data);
	}

	public function login(){
        $data['top_rated'] = $this->db->query('SELECT
                                            opentrip_id,
                                            judul,
                                            sum( jumlah ) 
                                        FROM
                                            tbl_detail_transaksi
                                            INNER JOIN tbl_opentrip ON tbl_opentrip.opentrip_id = tbl_detail_transaksi.id_opentrip 
                                        GROUP BY
                                            id_opentrip 
                                        ORDER BY
                                            sum( jumlah ) DESC 
                                            LIMIT 1')->row();

        $data['v_content'] = "front/login";
        $this->load->view("front/layout",$data);
    }

    public function register()
    {
        $data['v_content'] = "front/register";
        $this->load->view("front/layout",$data);
    }

    public function profile()
    {
        if(empty($this->session->userdata('loginUser'))){
            redirect('front/login');
        }
        $dataUser = $this->session->userdata('loginUser');

        $data['dataUser'] = $this->db->query('select * from tbl_member where member_id = "'.$dataUser['id'].'"')->row();
        $data['v_content'] = "front/profile";
        $this->load->view("front/layout",$data);
    }

    public function doUpdate()
    {
        $dataUser = $this->session->userdata('loginUser');
        if(empty($this->session->userdata('loginUser'))){
            redirect('front/login');
        }
        $post = $this->input->post();
        $datanya = ['first_name'=>$post['user_name'],
                   'no_hp'=>$post['no_hp'],
                   'username'=>$post['username'],
                                                'password'=>md5($post['password']),
                                                'address_1'=>$post['alamat'],
                                                'email'=>$post['email']];
        if(!empty($post['password'])){
            $datanya['password'] = md5($post['password']);
        }
        $login = $this->db->update('tbl_member',$datanya,['member_id'=>$dataUser['id']]);
        if ($login) {
           // $this->m_umum->generatePesan("Berhasil update profile","berhasil");
            redirect('front/profile');  
        }else{
            //$this->m_umum->generatePesan("Gagal update profile","gagal");
            redirect('front/profile');
        }
    }

    public function doRegister(){
        $post = $this->input->post();
        $sql = "select count(*) jml from tbl_member where username ='".$post['username']."'";
        $count = $this->db->query($sql)->row()->jml;
        if($count>0){
            $this->session->set_flashdata('unameExist', 'Ya');
            redirect(site_url('front/register'));
            exit;
        }
        $login = $this->db->insert('tbl_member',['first_name'=>$post['user_name'],
                                                'username'=>$post['username'],
                                                'password'=>md5($post['password']),
                                                'address_1'=>$post['alamat'],
                                                'email'=>$post['email']]);
        if ($login) {
            $this->session->set_flashdata('SuksesRegister', 'Ya');
            redirect('front/login');  
        }else{
            $this->session->set_flashdata('GagalRegister', 'Ya');
            redirect('front/register');
        }   
    }

    public function transaksi(){
        $iduser = $this->session->userdata('loginUser')['id'];
        if(empty($this->session->userdata('loginUser'))){
            redirect('front/login');
        }
        $sqltransaksi = "select * from tbl_transaksi where id_member ='". $iduser . "'";
        $transaksi = $this->db->query($sqltransaksi)->result_array();
        $detail=array();
        foreach ($transaksi as $key => $value) {
            $detailsql = "select a.detail_id,a.jumlah,b.judul,b.harga,c.jadwal from tbl_detail_transaksi a 
            left join tbl_opentrip b on a.id_opentrip = b.opentrip_id
            left join tbl_jadwal c on a.id_jadwal = c.jadwal_id where a.id_transaksi = '". $value['transaksi_id'] ."'";
            $detail[$value['transaksi_id']] = $this->db->query($detailsql)->result_array();
        }
        //var_dump($detail); exit;

        $data['listData'] = $transaksi;
        $data['listDetail'] = $detail;
        $data['v_content'] = 'front/transaksi_detail';
        $this->load->view('front/layout',$data);
    }

    public function invoice($id){
        $post = $this->input->post();
        $iduser = $this->session->userdata('loginUser')['id'];
        $mpdf = new \Mpdf\Mpdf();
        $data['dataMember'] = $this->m_member->getMemberDetail($iduser);
        $data['profil'] = $this->db->query("select * from tbl_profil")->row();
        $data['trans'] = $this->db->query("select * from tbl_transaksi where transaksi_id = '".$id."'")->row();
        $data['dataTrans'] = $this->m_opentrip->getTransaksi($id);

        $file = $this->load->view("front/invoice", $data, TRUE);
        $mpdf->AddPage('P'); // margin footer
        $mpdf->WriteHTML($file);
        $mpdf->Output();
    }

    public function addtocart(){
        $post = $this->input->post();
    	$data = $this->session->userdata('loginUser');

        if(empty($data)){
            redirect('front/login');
        }
    	
    	if(empty($post)){
    		redirect(site_url());
    	}

    	$sql = "insert into tbl_cart (id_opentrip,jumlah,id_user,id_jadwal) values ('". $post['id_opentrip'] ."','". $post['jumlah'] ."','". $data['id'] ."','".$post['jadwal']."')";
    	$simpan = $this->db->query($sql);

    	if(isset($post['cart'])){
    		redirect($_SERVER['HTTP_REFERER']);	
    	}else{
    		redirect(site_url('front/cart'));
    	}    	
    }

    public function uploadbukti(){
        $post=$this->input->post();
        if(empty($this->session->userdata('loginUser'))){
            redirect('front/login');
        }
        $upload_path = './uploads/bukti';
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

        $sql = "update tbl_transaksi set bukti ='".$foto."' where transaksi_id='".$post['id_opentrip']."' ";
        $this->db->query($sql);
        redirect(site_url('front/transaksi'));
    }

    public function hapus($id){
        $data['dataUser'] = $this->session->userdata('loginUser');
        if(empty($this->session->userdata('loginUser'))){
            redirect('front/login');
        }
        $this->db->delete('tbl_cart', array('cart_id' => $id));
        redirect(site_url('front/cart'));
    }

    public function cart(){
    	$data['dataUser'] = $this->session->userdata('loginUser');
        if(empty($this->session->userdata('loginUser'))){
            redirect('front/login');
        }
    	$listData = "select * from tbl_cart a join tbl_opentrip b on a.id_opentrip = b.opentrip_id  where id_user ='" . $data['dataUser']['id'] . "'";
    	$data['listData'] = $this->db->query($listData)->result_array();
        $data['listBank'] = $this->db->query("select * from tbl_bank")->result_array();
    	$data['v_content'] = "front/keranjang";
    	$this->load->view("front/layout",$data);
    }

    public function getBank($id){
        $data['userLogin'] = $this->session->userdata('loginData');
        $dataBank        = $this->db->query("select * from tbl_bank where bank_id = '".$id."'")->row();
        
        $json = json_encode ( $dataBank );
        header ( 'Access-Control-Allow-Origin: *' );
        header ( 'Access-Control-Expose-Headers: Access-Control-Allow-Origin' );
        header ( "HTTP/1.1 200 OK" );
        header ( 'Content-Type: application/json' );
        echo $json;
        die ();
    }

    public function checkout(){
        $post = $this->input->post();
        $iduser = $this->session->userdata('loginUser')['id'];
        if(empty($this->session->userdata('loginUser'))){
            redirect('front/login');
        }
        $sqltransaksi = "insert into tbl_transaksi (id_member,tangal,id_bank,total) values ('". $iduser ."','".date('Y-m-d')."','".$post['id_bank']."', '".$post['total']."')";
        $this->db->query($sqltransaksi);

        $id_transaksi = $this->db->insert_id();
        $i=0;
        foreach ($post['produk'] as $key => $value) {

            $sqldetail = "insert into tbl_detail_transaksi (id_transaksi,id_opentrip,id_jadwal,jumlah) values ('".$id_transaksi."','".$value."','".$post['tanggal'][$i]."','".$post['jumlah'][$i]."')";
            $this->db->query($sqldetail);
            $i++;

        }

        $sql = "delete from tbl_cart where id_user ='".$iduser."'";
        $this->db->query($sql);
        redirect(site_url('front/transaksi'));

    }

    function doLoginUser() {
        $post = $this->input->post();
        $username=$post['username'];
        $password=$post['password'];
        
        if ($this->auth_model->checkLoginUser($username,$password)) {
            //echo "OK"; exit;
            $this->session->set_flashdata('tampil_pesan','yes');
            redirect('front/index');       
        } else {
            //echo "GAGAL!"; exit;
            $this->session->set_flashdata('GagalLogin', 'Ya');
            redirect('front/login');
        }        
    }  

    function logout() {
        $this->session->unset_userdata('loginUser');
        redirect('front');
    }
}
