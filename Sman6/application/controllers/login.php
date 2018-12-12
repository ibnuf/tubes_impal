<?php  if(!defined('BASEPATH')) exit ('No direct script access allowed');
	class Login extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->library(array('session','PHPExcel','Pdf_Library'));
			$this->load->helper(array('url','form'));
			$this->load->model(array('Model_bk'));
			$this->load->database();
			}

		//awal login	
		public function index(){
		   $username = $this->input->post('username');
		   $password = $this->input->post('password');
		   $validasi = $this->Model_bk->validasi($username,$password);
		   $validasi2 = $this->Model_bk->validasi2($username,$password);
		   
		   if($validasi->num_rows() == 1){
		    foreach($validasi->result() as $data){
		     $user1['nama'] = $data->nama;
		     $user1['username'] = $data->username;
		     $this->session->set_userdata($user1);
		    }
		    redirect('bk/index');

		   }else if($validasi2->num_rows() == 1){
		    	foreach($validasi2->result() as $data){
			     $user['nama_user'] = $data->waliKelas;
			     $user['username'] = $data->waliKelas;
			     $user['namakelas'] = $data->namaKelas;
			     $this->session->set_userdata($user);
		   		 }
		    redirect('walikelas/index');
		   }else{
		    $this->session->set_flashdata('pesan_gagal','Maaf, kombinasi password dan username salah !');
		    $this->load->view('v_form_login');
		   	}
		  }
		  
		  public function logout(){
		   $this->session->sess_destroy();
		   redirect('login/index');
		  }
		}
	?>
				