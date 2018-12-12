<?php  if(!defined('BASEPATH')) exit ('No direct script access allowed');
	class Bk extends CI_Controller{
		public function __construct(){
			parent::__construct();
			if(!$this->session->userdata('username')){
				redirect ('login');
			}
			$this->load->library(array('session','PHPExcel','Pdf_Library'));
			$this->load->helper(array('url','form'));
			$this->load->model(array('Model_bk'));
			$this->load->database();
			}

		//awal login	
	
				
		public function admin_page(){
			$data['nama']=$this->session->userdata('nama');
			$this->load->view('home',$data);
		}

		public function index(){
			$data['nama']=$this->session->userdata('nama');
			$this->admin_page();
		}

		
		//akhir login

		//awal data pelanggaran
		public function form_input_pelanggaran(){
			$data['list_id'] = $this->Model_bk->get_list_id();
			$data['list_kerapihan'] = $this->Model_bk->get_list_kerapihan();
			$data['list_kerajinan'] = $this->Model_bk->get_list_kerajinan();
			$data['list_larangan_siswa'] = $this->Model_bk->get_list_laranganSiswa();
			$this->load->view('pelanggaran/input', $data);
		}

		public function form_buat_surat(){
			$idSiswa=$this->uri->segment(3);
			$data['sss']=$this->uri->segment(3);
			$data['list_data']=$this->Model_bk->get_dataOrangTua_surat($idSiswa);
			$this->load->view('pelanggaran/form_surat',$data);
		}

		public function simpan_surat(){
			$this->Model_bk->insert_surat();
			redirect('bk/data_pelanggaran_siswa');
		}

		function hapus_pelanggaran(){
			$idSiswa = $this->uri->segment(3);
			$this->Model_bk->hapus_pelanggaran($idSiswa);
			redirect('bk/data_pelanggaran_siswa');
		}
		
		function hapus_pelanggaranana($idPelanggaran){
			$this->Model_bk->hapus_pelanggarana($idPelanggaran);	
			echo json_encode(array("status" => TRUE));
			
		}

		public function simpan_pelanggaran() {
			$this->Model_bk->insert_pelanggaran();
			redirect('bk/form_input_pelanggaran');
		}
		
		
		public function data_pelanggaran_siswa(){
			$data['list_data']=$this->Model_bk->get_data_pelanggaran();
			$this->load->view('pelanggaran/data_pelanggaran',$data);
		}
		
		function detail_pelanggaran(){
			$idsiswa = $this->uri->segment(3);
			$data['list_data']= $this ->Model_bk->get_detail_pelanggaran($idsiswa);
			$data['list_dataa']= $this ->Model_bk->get_detail_pelanggarana($idsiswa);
			$this->load->view('pelanggaran/detail_pelanggaran',$data);
		}
		//akhir data pelanggaran
		
		//awal grafik pelanggaran
		function display_surat($idSiswa) {
		
			$data['data_siswa']=$this->Model_bk->print_data_pelanggaran($idSiswa);
			$data['isi_surat']=$this->Model_bk->print_data_pelanggaran($idSiswa);
			$data['isi_surat2']=$this->Model_bk->print_data_pelanggaran2($idSiswa);
			$this->load->view('pelanggaran/surat_panggilan',$data);
		}
		
		function display_chart() {
		$aa = $data['label'] = $this->Model_bk->get_label()->result();
		//var_dump($aa);
		//$cek = $data['jumlah_pelanggaran'] = $this->m_index->get_total_per_label()->row();

	//	var_dump($cek);
		$jumlah_array = count($aa);
		for ($i=0; $i < $jumlah_array ; $i++) { 
			//echo $aa[$i]->kategoripelanggaran;
			$tahun = $this->input->post('tahun');
			$bulan = $this->input->post('bulan');
			if ($tahun!=null) 
			{
				if ($bulan!=null) {
					$cek = $data['jumlah_pelanggaran'] = $this->Model_bk->get_total_per_label($aa[$i]->jenisPelanggaran,$tahun,$bulan)->row();
				}
				else
				{
					$cek = $data['jumlah_pelanggaran'] = $this->Model_bk->get_total_per_label($aa[$i]->jenisPelanggaran,$tahun)->row();

				}	
			}
			else
			{
				$cek = $data['jumlah_pelanggaran'] = $this->Model_bk->get_total_per_label($aa[$i]->jenisPelanggaran)->row();

			}

			$hasil[]= $cek->jumlah;
		}
		$data['hasil_data'] = implode(",",$hasil);
		$data['pelanggaran'] = $this->Model_bk->chartPelanggaran();
		$this->load->view('pelanggaran/grafik_pelanggaran',$data);
		}
		//akhir grafik pelanggaran

		//awal peraturan kerapian
		public function peraturan_kerapian(){
			$data['list_data']=$this->Model_bk->get_peraturan_kerapian();
			$this->load->view('peraturan/kerapian',$data);
		}

		function updateKerapian() {
			$idKerapian=$this->uri->segment(3);
			$data['list_data']= $this ->Model_bk->get_kerapian($idKerapian);
			$this->load->view('peraturan/updateKerapian.php',$data);
		}
		
		function update_data_db_kerapian(){
			$idKerapian=$this->uri->segment(3);
			$this->Model_bk->update_data_db_kerapian($idKerapian);
			redirect('Bk/peraturan_kerapian');
		}

		public function form_input_kerapian(){
			$this->load->view('peraturan/inputKerapian');
		}

		public function simpan_kerapian() {
			$this->Model_bk->insert_kerapian();
			redirect('bk/form_input_kerapian');
		}

		
		function hapus_kerapian(){
			$idKerapian = $this->uri->segment(3);
			$this->Model_bk->hapus_kerapian($idKerapian);
			redirect('bk/peraturan_kerapian');
		}
		//akhir peraturan kerapian

		//awal peraturan kerajinan
		public function peraturan_kerajinan(){
			$data['list_data']=$this->Model_bk->get_peraturan_kerajinan();
			$this->load->view('peraturan/kerajinan',$data);
		}

		public function form_input_kerajinan(){
			$this->load->view('peraturan/inputKerajinan');
		}

		public function simpan_kerajinan() {
			$this->Model_bk->insert_kerajinan();
			redirect('bk/form_input_kerajinan');
		}

		function hapus_kerajinan(){
			$idKerajinan = $this->uri->segment(3);
			$this->Model_bk->hapus_kerajinan($idKerajinan);
			redirect('bk/peraturan_kerajinan');
		}


		function updateKerajinan() {
			$idKerajinan=$this->uri->segment(3);
			$data['list_data']= $this ->Model_bk->get_kerajinan($idKerajinan);
			$this->load->view('peraturan/updateKerajinan.php',$data);
		}
		
		function update_data_db_kerajinan(){
			$idKerajinan=$this->uri->segment(3);
			$this->Model_bk->update_data_db_kerajinan($idKerajinan);
			redirect('Bk/peraturan_kerajinan');
		}
		//akhir peraturan kerajinan

		//awal peraturan larangan siswa
		public function peraturanLaranganSiswa(){
			$data['list_data']=$this->Model_bk->get_peraturanLaranganSiswa();
			$this->load->view('peraturan/laranganSiswa',$data);
		}

		
		function updateLaranganSiswa() {
			$idLaranganSiswa=$this->uri->segment(3);
			$data['list_data']= $this ->Model_bk->get_laranganSiswa($idLaranganSiswa);
			$this->load->view('peraturan/updateLaranganSiswa.php',$data);
		}
		
		function update_data_db_laranganSiswa(){
			$idLaranganSiswa=$this->uri->segment(3);
			$this->Model_bk->update_data_db_laranganSiswa($idLaranganSiswa);
			redirect('Bk/peraturanLaranganSiswa');
		}

		public function form_input_laranganSiswa(){
			$this->load->view('peraturan/inputLaranganSiswa');
		}

		function hapus_laranganSiswa(){
			$idLaranganSiswa = $this->uri->segment(3);
			$this->Model_bk->hapus_laranganSiswa($idLaranganSiswa);
			redirect('bk/peraturanLaranganSiswa');
		}

		public function simpan_laranganSiswa() {
			$this->Model_bk->insert_laranganSiswa();
			redirect('bk/form_input_laranganSiswa');
		}
		//akhir peraturan larangan siswa

		//awal data orang tua siswa
		public function orangTuaSiswa(){
			$data['list_data']=$this->Model_bk->get_dataOrangTua();
			$this->load->view('orangtua/dataOrangTua',$data);
		}

		public function do_upload_orangTua(){
        $config['upload_path'] = './orangtua/';
        $config['allowed_types'] = 'xlsx|xls';
       
        $this->load->library('upload', $config);
       
        if ( ! $this->upload->do_upload('userfile')){
            $error = array('error' => $this->upload->display_errors());
        }
        else{
            $upload_data = $this->upload->data();
            $filename = $upload_data['file_name'];
            $this->Model_bk->upload_data_orangtua($filename);
            unlink('./orangtua/'.$filename);
            redirect('bk/orangTuaSiswa');
       		}
    	}

		public function simpan_orangtua() {
			$this->Model_bk->insert_orangtua();
			redirect('bk/form_input_orangtua');
		}

		public function form_input_orangtua(){
			$this->load->view('orangtua/inputOrangTua');
		}

		
		function updateOrangTua() {
			$idOrangTua=$this->uri->segment(3);
			$data['list_data']= $this ->Model_bk->get_orangTua($idOrangTua);
			$this->load->view('orangtua/updateOrangTua.php',$data);
		}
		
		function update_data_db_orangTua(){
			$idOrangTua=$this->uri->segment(3);
			$this->Model_bk->update_data_db_orangTua($idOrangTua);
			redirect('Bk/orangTuaSiswa');
		}

		function hapus_orangtua(){
			$idOrangTua = $this->uri->segment(3);
			$this->Model_bk->hapus_orangtua($idOrangTua);
			redirect('bk/orangTuaSiswa');
		}
		//akhir data orang tua

		/*buku tamu
		public function tamu(){
			$data['list_data']=$this->Model_bk->get_dataTamu();
			$this->load->view('tamu/dataTamu',$data);
		}

		public function form_input_tamu(){
			$this->load->view('tamu/inputTamu');
		}

		public function simpan_tamu(){
			$this->Model_bk->insert_tamu();
			redirect('bk/tamu');
		}

		function updateTamu() {
			$idTamu=$this->uri->segment(3);
			$data['list_data']= $this ->Model_bk->get_tamu($idTamu);
			$this->load->view('tamu/updateTamu.php',$data);
		}
		
		function update_data_db_tamu(){
			$idTamu=$this->uri->segment(3);
			$this->Model_bk->update_data_db_tamu($idTamu);
			redirect('Bk/tamu');
		}

		function hapus_tamu(){
			$idTamu = $this->uri->segment(3);
			$this->Model_bk->hapus_tamu($idTamu);
			redirect('bk/tamu');
		}
		//akhir buku tamu*/

		//awal upload berkas surat
		public function dataSurat(){
			$data['list_data']=$this->Model_bk->get_list_data();
			$this->load->view('surat/dataSurat',$data);
		}

		function kirimSurat(){
		$data['content_view'] = "surat/inputSurat";
		$data['id'] = $this->uri->segment(3);	
		$config['upload_path'] ='./surat/';
		$config['allowed_types']='gif|bmp|jpeg|jpg|png|pdf|docx|doc|';
		$config['max_size']='10000000000000000';
		$config['max_width']='1000000000000000';
		$config['max_height']='1000000000000000';
		$this->load->library('upload',$config);
		if($this->upload->do_upload('berkas_surat')){
			$file=$this->upload->data();
			$berkas=$file['file_name'];
			$id = $this->input->post('idsurat');		
			$data = array(
               'berkas' => $berkas,
            );

			$this->Model_bk->insertSurat($data,$id);
			redirect('Bk/dataSurat');
		}
		$this->load->view('surat/inputSurat',$data);
		}

		function hapus_surat(){
			$idSurat = $this->uri->segment(3);
			$this->Model_bk->hapus_surat($idSurat);
			redirect('bk/dataSurat');
		}
		//akhir upload berkas surat

		//awal data Siswa
		public function dataSiswa(){
			$data['list_data']=$this->Model_bk->get_dataSiswa();
			$data['list_kelas'] = $this->Model_bk->get_kelas();
			$dropdown = $this->input->post('carikelas');
			if ($this->input->post('carikelass')) {
				$data['list_data'] = $this->Model_bk->get_dataSiswaByKelas($dropdown);
			}
			$this->load->view('siswa/dataSiswa',$data);
		}

		function updateSiswa() {
			$idSiswa=$this->uri->segment(3);
			$data['list_data']= $this ->Model_bk->get_siswa($idSiswa);
			$data['list_kelas'] = $this->Model_bk->get_kelas();
			$dropdown = $this->input->post('carikelas');
			if ($this->input->post('carikelass')) {
				$data['list_data'] = $this->Model_bk->get_dataSiswaByKelas($dropdown);
			}
			$this->load->view('siswa/updateSiswa.php',$data);
		}
		
		function update_data_db_siswa(){
			$idSiswa=$this->uri->segment(3);
			$this->Model_bk->update_data_db_siswa($idSiswa);
			redirect('Bk/dataSiswa');
		}

		function hapus_Siswa(){
			$idSiswa = $this->uri->segment(3);
			$this->Model_bk->hapus_Siswa($idSiswa);
			redirect('bk/dataSiswa');
		}
		
		public function form_input_siswa(){
			$data['list_kelas'] = $this->Model_bk->listKelas();
			$data['list_ajaran'] = $this->Model_bk->listAjaran();
			$this->load->view('siswa/inputSiswa', $data);
		}

		public function simpan_siswa(){
			$this->Model_bk->insert_siswa();
			redirect('bk/form_input_siswa');
		}

		public function do_upload_siswa(){
        $config['upload_path'] = './siswa/';
        $config['allowed_types'] = 'xlsx|xls';
       
        $this->load->library('upload', $config);
       
        if ( ! $this->upload->do_upload('userfile')){
            $error = array('error' => $this->upload->display_errors());
        }
        else{
            $upload_data = $this->upload->data();
            $filename = $upload_data['file_name'];
            $this->Model_bk->upload_data_siswa($filename);
            unlink('./siswa/'.$filename);
            redirect('bk/dataSiswa');
        }
    }

		//akhir data siswa

		//awal kelola username walikelas
		public function walas(){
			$data['list_data']=$this->Model_bk->get_dataWalas();
			$this->load->view('walikelas/dataUsername',$data);
		}

		public function simpan_username(){
			$this->Model_bk->insert_username();
			redirect('bk/form_input_username');
		}

		public function form_input_username(){
			$this->load->view('walikelas/inputUsername');
		}

		function hapus_username(){
			$idUsername = $this->uri->segment(3);
			$this->Model_bk->hapus_username($idUsername);
			redirect('bk/walas');
		}
		//akhir kelola username walikelas

		//awal kelola wali kelas

		public function bikinPassword(){
			$idkelas=$this->uri->segment(3);
			$data['idkelas']=$this->uri->segment(3);
			$this->load->view('kelolaKelas/inputPassword',$data);
		}

		function updatePassword(){
			$idkelas=$this->uri->segment(3);
			$password=$this->input->post('password');
			$this->Model_bk->updatePassword($idkelas);
			redirect('Bk/wali_kelas');
		}

		public function wali_kelas(){
			$idkelas=$this->uri->segment(3);
			$data['list_data']=$this->Model_bk->get_dataWaliKelas();
			$this->load->view('kelolaKelas/dataWaliKelas',$data);
		}

		function hapus_walikelas($idkelas){
			$idkelas = $this->uri->segment(3);
			$this->Model_bk->hapus_walikelas($idkelas);
			echo json_encode(array("status" => TRUE));
		}

		public function simpan_walikelas(){
			$this->Model_bk->insert_walikelas();
			redirect('bk/form_input_dataWali');
		}

		public function form_input_dataWali(){
			$this->load->view('kelolaKelas/inputWali');
		}
			
		function update_WaliKelas(){
			$idkelas=$this->uri->segment(3);
			$this->Model_bk->update_WaliKelas($idkelas);
			redirect('Bk/wali_kelas');
		}

		function updateKelas() {
			$idkelas=$this->uri->segment(3);
			$data['list_data']= $this ->Model_bk->get_waliskelas($idkelas);
			$this->load->view('kelolaKelas/updateKelas.php',$data);
		}
		
		//akhir kelola wali kelas

		//awal kelas terbaik
		public function kelas_terbaik(){
			$data['list_data'] = $this->Model_bk->getkelasterbaik();
			$this->load->view('kelas/dataKelas',$data);
		}
		//akhir kelas terbaik

		//awal notifikasi
		public function viewApp() {
        if ($this->session->userdata('status')) {
            $data = array(
                'approve' => $this->Model_bk->viewApprove()
            );
	        } else {
	            redirect('bk/admin_page');
	        }
	    }

  		 public function des() {
        if ($this->session->userdata('status')) {
            $desPengiriman = $this->Model_bk->viewDes();
	        } else {
	            redirect('bk/admin_page');
	        }
	    }
	    //akhir notifikasi

	    //awal history
	   public function history(){
	   		$idSiswa = $this->input->post('idSiswa');
	   		$data['list_data'] = $this->Model_bk->getHistory($idSiswa);
			$this->load->view('pelanggaran/history', $data);
		}

		public function pilihbulan(){
			$caribulan = $this->input->post('caribulan');
			$data['list_data'] = $this->Model_bk->caribulan($caribulan);
			$this->load->view('kelas/dataKelas',$data);
		}
	    //akhir history

		//kirim SMS
		public function kirim_sms(){
			$idSiswa=$this->uri->segment(3);
			$data['list_data2']=$this->Model_bk->get_list_data_sms($idSiswa);
			$this->load->view('pelanggaran/sms_panggilan',$data);
		}
				
		function send_sms(){
			$idSiswa=$this->uri->segment(3);
			$idSiswa=$this->input->post('idSiswa');
			$list_data2=$this->Model_bk->get_list_data_sms($idSiswa);

			// $number = "+6281220599889"; //nomor yang mau di kirimkan
			//$number = "+6282292601077";
			
			$message = '[UNDANGAN]'; //pesan
           	$message .= " Yth, kepada orang tua dari : "; //pesan
			$message .= ''.$list_data2->namaSiswa;
			$message .= '	,Kelas  : '.$list_data2->kelasSiswa;
			$message .= '  	,Perihal : Permasalahan Putra/i Saudara.';
			$message .= '  	Harap menemui guru BK pada esok hari, Terima Kasih';
			$message .= '. TTD SMAN 6 SURABAYA';


            $list_nomor=$this->Model_bk->get_list_data_sms($list_data2->idSiswa);
            $number=$list_data2->noHpOrangTua;
            
            include "application/sms/send.php";

		}

		  
}
?>