<?php  if(!defined('BASEPATH')) exit ('No direct script access allowed');
	class walikelas extends CI_Controller{
		public function __construct(){
			parent::__construct();
			if(!$this->session->userdata('username')){
				redirect ('login');
			}
			$this->load->library(array('session'));
			$this->load->helper(array('url','form'));
			$this->load->model(array('Model_bk'));
			$this->load->database();
			}

		public function walas_page(){
			$data['nama_user']=$this->session->userdata('nama_user');
			$this->load->view('w_home',$data);
		}

		public function index(){
			$this->walas_page();
		}
		public function form_input_pelanggaran(){
			$data['list_id'] = $this->Model_bk->get_list_id();
			$data['kelas'] = $this->session->userdata('namakelas');
			$data['nis'] = $this->Model_bk->get_nis();
			$data['list_kerapihan'] = $this->Model_bk->get_list_kerapihan();
			$data['list_kerajinan'] = $this->Model_bk->get_list_kerajinan();
			$data['list_larangan_siswa'] = $this->Model_bk->get_list_laranganSiswa();
			$this->load->view('pelanggaran/w_input', $data);
		}

		public function simpan_pelanggaran() {
			$this->Model_bk->insert_pelanggaran();
			redirect('walikelas/form_input_pelanggaran');
		}

		public function data_pelanggaran_siswa(){
			$data['list_data']=$this->Model_bk->get_data_pelanggaran();
			$this->load->view('pelanggaran/w_data_pelanggaran',$data);
		}
		
		function detail_pelanggaran(){
			$idsiswa = $this->uri->segment(3);
			$data['list_data']= $this ->Model_bk->get_detail_pelanggaran($idsiswa);
			$data['list_dataa']= $this ->Model_bk->get_detail_pelanggarana($idsiswa);
			$this->load->view('pelanggaran/w_detail_pelanggaran',$data);
		}

		public function peraturanLaranganSiswa(){
			$data['list_data']=$this->Model_bk->get_peraturanLaranganSiswa();
			$this->load->view('peraturan/w_LaranganSiswa',$data);
		}

		public function peraturan_kerapian(){
			$data['list_data']=$this->Model_bk->get_peraturan_kerapian();
			$this->load->view('peraturan/w_kerapian',$data);
		}
		
		public function peraturan_kerajinan(){
			$data['list_data']=$this->Model_bk->get_peraturan_kerajinan();
			$this->load->view('peraturan/w_kerajinan',$data);
		}

		public function dataSiswa(){
			$data['list_data']=$this->Model_bk->get_dataSiswa();
			$data['list_kelas'] = $this->Model_bk->get_kelas();
			$dropdown = $this->input->post('carikelas');
			if ($this->input->post('carikelass')) {
				$data['list_data'] = $this->Model_bk->get_dataSiswaByKelas($dropdown);
			}
			$this->load->view('siswa/w_dataSiswa',$data);
		}

		public function logout(){
			 $this->session->sess_destroy();
			 $this->load->view('v_form_login');
		}

	}
?>