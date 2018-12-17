<?php
class Model_bk extends CI_Model{
	
	function Bk(){
		parent::CI_Model();
	}
	//awal Login
	function validasi($username,$password){
		  return $this->db->query('select * from gurubk where username ="'.$username.'" and password ="'.$password.'"');
		 }
	
	 function validasi2($waliKelas,$password){
		 return $this->db->query('select * from kelas where waliKelas="'.$waliKelas.'" and password="'.$password.'" and jabatan="Walikelas"');
	
		 }
	//akhir login
	

	/*public function validasi3 ($v_username3,$v_password3){
		//echo $v_username;
		//echo $v_password;
		$sql ="select * from kepsek where username = '$v_username3' and password = '$v_password3'";
		$result=$this->db->query($sql);
		$ketemu=$result->num_rows;
		//echo 'ketemu='.$ketemu;
		if ($ketemu>0){
			return true;
		}else{
			return false;			
		}
	}*/ 
	
	//akhir login

	//awal pelanggaran
	public function get_nis(){
		return $this->db->query('select * from siswa');

	}

	public function get_dataOrangTua_surat($idSiswa){
		$query=$this->db->query("select distinct data_orangtua.alamatOrangTua, data_orangtua.kotaOrangTua
				from data_orangtua join siswa on data_orangtua.idSiswa=siswa.idSiswa join data_pelanggaran on data_pelanggaran.idSiswa = siswa.idSiswa 
				where data_pelanggaran.idSiswa = '$idSiswa'");
			return $query;
	}

	public function insert_surat(){
		$idSiswa=$this->input->post('idsiswa');
		
		$alamatOrangTua=$this->input->post('alamatOrangTua');
		$kotaOrangTua=$this->input->post('kotaOrangTua');
		$hariPertemuan=$this->input->post('hariPertemuan');
		$jamPertemuan=$this->input->post('jamPertemuan');
		$tanggalPertemuan=$this->input->post('tanggalPertemuan');
		$tanggalSurat=$this->input->post('tanggalSurat');
		$query=$this->db->query("insert into berkas_surat( alamatOrangTua, kotaOrangTua, hariPertemuan, jamPertemuan, tanggalPertemuan,idSiswa,tanggalSurat) values ('$alamatOrangTua','$kotaOrangTua','$hariPertemuan','$jamPertemuan','$tanggalPertemuan','$idSiswa','$tanggalSurat')");
	}


	public function get_list_id(){
		$data = "
				select idKatagori as id, namaKatagori as name
				from katagori
			";
		$sql = $this->db->query($data);
		return $sql->result();
	}

	public function get_list_kerapihan(){
		$data = "
				select idKerapian as id, deskripsiKerapian as name, poinKerapian as value
				from peraturan_kerapian
			";
		$sql = $this->db->query($data);
		return $sql->result();
	}

	public function get_list_kerajinan(){
		$data = "
				select idKerajinan as id, deskripsiKerajinan as name, poinKerajinan as value
				from peraturan_kerajinan
			";
		$sql = $this->db->query($data);
		return $sql->result();
	}

	public function get_list_laranganSiswa(){
		$data = "
				select idLaranganSiswa as id, deskripsiLaranganSiswa as name, poinLaranganSiswa as value
				from peraturanlaranganSiswa
			";
		$sql = $this->db->query($data);
		return $sql->result();
	}

	function insert_pelanggaran(){
			$idPelanggaran=$this->input->post('idPelanggaran');
			$idSiswa=$this->input->post('idSiswa');
			$jenisPelanggaran=$this->input->post('jenisPelanggaran');
			$tanggalPelanggaran=$this->input->post('tanggalPelanggaran');
			$jamPelanggaran=$this->input->post('jamPelanggaran');
			$poinPelanggaran=$this->input->post('poinPelanggaran');
			$deskripsi = "";
			if($jenisPelanggaran == 'Kerapihan'){
				$deskripsi = $this->input->post('deskripsiPelanggaranKerapihan');
				$query=$this->db->query("insert into data_pelanggaran(idSiswa, jenisPelanggaran,
				tanggalPelanggaran,jamPelanggaran,deskripsiPelanggaran, poinPelanggaran) values ('$idSiswa',
				'$jenisPelanggaran','$tanggalPelanggaran','$jamPelanggaran'
				,'$deskripsi','$poinPelanggaran')");
				$query=$this->db->query("insert into history(idSiswa, jenisPelanggaran,
				tanggalPelanggaran,jamPelanggaran,deskripsiPelanggaran, poinPelanggaran) values ('$idSiswa',
				'$jenisPelanggaran','$tanggalPelanggaran','$jamPelanggaran'
				,'$deskripsi','$poinPelanggaran')");
			}else if($jenisPelanggaran == 'Kerajinan'){
				$deskripsi = $this->input->post('deskripsiPelanggaranKerajinan');
				$query=$this->db->query("insert into data_pelanggaran(idSiswa, jenisPelanggaran,
				tanggalPelanggaran,jamPelanggaran,deskripsiPelanggaran, poinPelanggaran) values ('$idSiswa','$jenisPelanggaran','$tanggalPelanggaran','$jamPelanggaran'
				,'$deskripsi','$poinPelanggaran')");
				$query=$this->db->query("insert into history(idSiswa, jenisPelanggaran,
				tanggalPelanggaran,jamPelanggaran,deskripsiPelanggaran, poinPelanggaran) values ('$idSiswa','$jenisPelanggaran','$tanggalPelanggaran','$jamPelanggaran'
				,'$deskripsi','$poinPelanggaran')");
			}else{
				$deskripsi = $this->input->post('deskripsiPelanggaranLarangan');
				$query=$this->db->query("insert into data_pelanggaran(idSiswa, jenisPelanggaran,
				tanggalPelanggaran,jamPelanggaran,deskripsiPelanggaran, poinPelanggaran) values ('$idSiswa'
				,'$jenisPelanggaran','$tanggalPelanggaran','$jamPelanggaran'
				,'$deskripsi','$poinPelanggaran')");
				$query=$this->db->query("insert into history(idSiswa, jenisPelanggaran,
				tanggalPelanggaran,jamPelanggaran,deskripsiPelanggaran, poinPelanggaran) values ('$idSiswa'
				,'$jenisPelanggaran','$tanggalPelanggaran','$jamPelanggaran'
				,'$deskripsi','$poinPelanggaran')");
			}

	}
	
	function get_data_pelanggaran(){
			//$query=$this->db->query("select distinct namaSiswa from siswa join data_pelanggaran using (idSiswa)");

			$this->db->select('siswa.namaSiswa,siswa.kelasSiswa, data_pelanggaran.idSiswa,siswa.idSiswa');
			$this->db->from('data_pelanggaran');
			$this->db->join('siswa','siswa.idSiswa=data_pelanggaran.idSiswa');
			$this->db->distinct();
			$query = $this->db->get();
			return $query;
			//$rows= $query-> row();		
	}

	function hapus_pelanggaran($idSiswa){
			$query=$this->db->query("delete from data_pelanggaran where idSiswa='$idSiswa'");
			return $rows;
		}

	function hapus_pelanggarana($idPelanggaran){
			$this->db->where('idPelanggaran',$idPelanggaran);
			$this->db->delete('data_pelanggaran');

		}
	
	function get_detail_pelanggaran($idSiswa){
			$query=$this->db->query("select distinct idPelanggaran, jenisPelanggaran, poinPelanggaran, deskripsiPelanggaran, tanggalPelanggaran, jamPelanggaran, idSiswa
			from data_pelanggaran join siswa using (idSiswa) where idSiswa='$idSiswa'");
			//$rows=$query->row();
			return $query;
		}
		
	function get_detail_pelanggarana($idSiswa){
			$query=$this->db->query("select distinct idSiswa, sum(poinPelanggaran) as JumlahPoin  from data_pelanggaran join siswa using (idSiswa) where idSiswa='$idSiswa'");
			//$rows=$query->row();
			return $query;
		}
		
		function print_data_pelanggaran ($idSiswa) {
			$query = $this->db->query("select siswa.kelasSiswa, data_pelanggaran.idSiswa, siswa.namaSiswa, data_pelanggaran.tanggalPelanggaran, data_orangtua.namaOrangTua, data_orangtua.alamatOrangtua, data_orangtua.kotaOrangTua
				from data_orangtua join siswa on data_orangtua.idSiswa=siswa.idSiswa join data_pelanggaran on data_pelanggaran.idSiswa = siswa.idSiswa 
				where data_pelanggaran.idSiswa = '$idSiswa'"); 
			return $query->result();                                       
		 }
		
		function print_data_pelanggaran2 ($idSiswa){
			$query = $this->db->query('SELECT * FROM berkas_surat order by idSurat desc limit 1');
			return $query->result();
		}

		function chartPelanggaran(){
				$query = $this->db->query('SELECT jenisPelanggaran,COUNT(IF(jenisPelanggaran LIKE "kerapian", idSiswa, NULL)) AS jumlah_kerapian, 
					COUNT(IF(jenisPelanggaran LIKE "kerajinan", idSiswa, NULL)) AS jumlah_kerajinan, 
					COUNT(IF(jenisPelanggaran LIKE "larangan siswa", idSiswa, NULL)) AS jumlah_larangan_siswa		
					FROM data_pelanggaran
					where date_format(tanggalPelanggaran,"%Y-%M" = "2017-Mei");
				');
				return $query;
		}
		
		function get_label()
		{
			$this->db->select('distinct(jenisPelanggaran) as jenisPelanggaran' );
			$query = $this->db->get('data_pelanggaran');
			return $query;
		}
		
		
		function get_total_per_label($label=null,$tahun=null,$bulan=null)
		{
			if (isset($label)) 
			{
				$this->db->where('jenisPelanggaran',$label);
			}
			if (isset($tahun)) 
			{
				$this->db->where('date_format(tanggalPelanggaran,"%Y")',$tahun);
			}
			if (isset($bulan)) 
			{
				$this->db->where('date_format(tanggalPelanggaran,"%m")',$bulan);
			}
			$this->db->select('count(idPelanggaran) as jumlah' );
			$query = $this->db->get('data_pelanggaran');
			return $query;	
		}
		//awal Pelanggaran


		//awal pelanggaran kerapian
		function get_peraturan_kerapian(){
			$query=$this->db->query("select * from peraturan_kerapian");
			return $query;
		}

		function insert_kerapian(){
			$deskripsiKerapian=$this->input->post('deskripsiKerapian');
			$poinKerapian=$this->input->post('poinKerapian');
			$tanggalBerlaku=$this->input->post('tanggalBerlaku');
			$query=$this->db->query("insert into peraturan_kerapian(deskripsiKerapian, poinKerapian, tanggalBerlaku) values ('$deskripsiKerapian','$poinKerapian','$tanggalBerlaku')");
		}
	
		function hapus_kerapian($idKerapian){
			$query=$this->db->query("delete from peraturan_kerapian where idKerapian='$idKerapian'");
			return $rows;
		}

		function get_kerapian($idKerapian){
			$query = $this->db->query("select * from peraturan_kerapian where idKerapian='$idKerapian'");
			return $query;
		}

		function update_data_db_kerapian($idKerapian){
			$idKerapian=$this->input->post('idKerapian');
			$poinKerapian=$this->input->post('poinKerapian');
			$deskripsiKerapian=$this->input->post('deskripsiKerapian');
			$tanggalBerlaku=$this->input->post('tanggalBerlaku');
			$query=$this->db->query("UPDATE peraturan_kerapian set deskripsiKerapian='$deskripsiKerapian', poinKerapian='$poinKerapian', tanggalBerlaku='$tanggalBerlaku' where idKerapian='$idKerapian'");
		}

		//akhir pelanggaran kerapian

		//Awal Pelanggaran Kerajinan
		function get_peraturan_kerajinan(){
			$query=$this->db->query("select * from peraturan_kerajinan");
			return $query;
		}

		function get_kerajinan($idKerajinan){
			$query = $this->db->query("select * from peraturan_kerajinan where idKerajinan='$idKerajinan'");
			return $query;
		}

		function update_data_db_kerajinan($idKerajinan){
			$idKerajinan=$this->input->post('idKerajinan');
			$poinKerajinan=$this->input->post('poinKerajinan');
			$deskripsiKerajinan=$this->input->post('deskripsiKerajinan');
			$tanggalBerlaku=$this->input->post('tanggalBerlaku');
			$query=$this->db->query("UPDATE peraturan_kerajinan set deskripsiKerajinan='$deskripsiKerajinan', poinKerajinan='$poinKerajinan',tanggalBerlaku='$tanggalBerlaku' where idKerajinan='$idKerajinan'");
		}


		function insert_kerajinan(){
			$deskripsiKerajinan=$this->input->post('deskripsiKerajinan');
			$poinKerajinan=$this->input->post('poinKerajinan');
			$tanggalBerlaku=$this->input->post('tanggalBerlaku');
			$query=$this->db->query("insert into peraturan_kerajinan(deskripsiKerajinan, poinKerajinan, tanggalBerlaku) values ('$deskripsiKerajinan','$poinKerajinan','$tanggalBerlaku')");
		}
	
		function hapus_kerajinan($idKerajinan){
			$query=$this->db->query("delete from peraturan_kerajinan where idKerajinan='$idKerajinan'");
			return $rows;
		}

		//Akhir Pelanggaran Kerajinan

		//Awal Pelanggaran Larangan Siswa
		function get_peraturanLaranganSiswa(){
			$query=$this->db->query("select * from peraturanlaranganSiswa");
			return $query;
		}

		function get_laranganSiswa($idLaranganSiswa){
			$query = $this->db->query("select * from peraturanlaranganSiswa where idLaranganSiswa='$idLaranganSiswa'");
			return $query;
		}

		function update_data_db_laranganSiswa($idLaranganSiswa){
			$idLaranganSiswa=$this->input->post('idLaranganSiswa');
			$poinLaranganSiswa=$this->input->post('poinLaranganSiswa');
			$deskripsiLaranganSiswa=$this->input->post('deskripsiLaranganSiswa');
			$tanggalBerlaku=$this->input->post('tanggalBerlaku');
			$query=$this->db->query("UPDATE peraturanlaranganSiswa set deskripsiLaranganSiswa='$deskripsiLaranganSiswa', poinLaranganSiswa='$poinLaranganSiswa', tanggalBerlaku='$tanggalBerlaku' where idLaranganSiswa='$idLaranganSiswa'");
		}

		function insert_laranganSiswa(){
			$deskripsiLaranganSiswa=$this->input->post('deskripsiLaranganSiswa');
			$poinLaranganSiswa=$this->input->post('poinLaranganSiswa');
			$tanggalBerlaku=$this->input->post('tanggalBerlaku');
			$query=$this->db->query("insert into peraturanlaranganSiswa(deskripsiLaranganSiswa, poinLaranganSiswa, tanggalBerlaku) values ('$deskripsiLaranganSiswa','$poinLaranganSiswa','$tanggalBerlaku')");
		}	
	
		function hapus_laranganSiswa($idLaranganSiswa){
			$query=$this->db->query("delete from peraturanlaranganSiswa where idLaranganSiswa='$idLaranganSiswa'");
			return $rows;
		}
		//Akhir Pelanggaran Larangan Siswa

		//Awal Data Orang Tua
		function get_dataOrangTua(){
			$this->db->select('data_orangtua.idOrangTua, data_orangtua.namaOrangTua, siswa.namaSiswa, data_orangtua.alamatOrangTua, data_orangtua.kotaOrangTua, data_orangtua.provinsiOrangTua,data_orangtua.noTlpOrangTua, data_orangtua.noHpOrangTua');
			$this->db->from('data_orangtua');
			$this->db->join('siswa','siswa.idSiswa=data_orangtua.idSiswa');
			$query = $this->db->get();
			return $query;
		}

		public function upload_data_orangtua($filename){
        ini_set('memory_limit', '-1');
        $inputFileName = './orangtua/'.$filename;
        try {
        $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
        } catch(Exception $e) {
        die('Error loading file :' . $e->getMessage());
        }

        $worksheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
        $numRows = count($worksheet);

        for ($i=2; $i < ($numRows+1) ; $i++) {
            // // $tgl_asli = str_replace('/', '-', $worksheet[$i]['B']);
            // // $exp_tgl_asli = explode('-', $tgl_asli);
            // // $exp_tahun = explode(' ', $exp_tgl_asli[2]);
            // $tgl_sql = $exp_tahun[0].'-'.$exp_tgl_asli[0].'-'.$exp_tgl_asli[1].' '.$exp_tahun[1];

            $ins = array(
                    "namaOrangTua"   => $worksheet[$i]["B"],
                    "idSiswa"   => $worksheet[$i]["C"],
                    "alamatOrangTua"   => $worksheet[$i]["D"],
                    "kotaOrangTua"   => $worksheet[$i]["E"],
                    "provinsiOrangTua"   => $worksheet[$i]["F"],
                    "noTlpOrangTua"   => $worksheet[$i]["G"],
                    "noHpOrangTua"   => $worksheet[$i]["H"],
                    );

            $this->db->insert('data_orangtua', $ins);
        }
    }

		function insert_orangtua(){
			$namaOrangTua=$this->input->post('namaOrangTua');
			$idSiswa=$this->input->post('idSiswa');
			$alamatOrangTua=$this->input->post('alamatOrangTua');
			$kotaOrangTua=$this->input->post('kotaOrangTua');
			$provinsiOrangTua=$this->input->post('provinsiOrangTua');
			$noTlpOrangTua=$this->input->post('noTlpOrangTua');
			$noHpOrangTua=$this->input->post('noHpOrangTua');
			$query=$this->db->query("insert into data_orangtua(namaOrangTua, idSiswa, alamatOrangTua, kotaOrangTua, provinsiOrangTua, noTlpOrangTua, noHpOrangTua) values ('$namaOrangTua','$idSiswa','$alamatOrangTua','$kotaOrangTua','$provinsiOrangTua','$noTlpOrangTua','$noHpOrangTua')");
		}

		function get_orangTua($idOrangTua){
			$query = $this->db->query("select * from data_orangtua where idOrangTua='$idOrangTua'");
			return $query;
		}

		function update_data_db_orangTua($idOrangTua){
			$idOrangTua=$this->input->post('idOrangTua');
			$namaOrangTua=$this->input->post('namaOrangTua');
			$idSiswa=$this->input->post('idSiswa');
			$alamatOrangTua=$this->input->post('alamatOrangTua');
			$kotaOrangTua=$this->input->post('kotaOrangTua');
			$provinsiOrangTua=$this->input->post('provinsiOrangTua');
			$noTlpOrangTua=$this->input->post('noTlpOrangTua');
			$noHpOrangTua=$this->input->post('noHpOrangTua');
			$query=$this->db->query("UPDATE data_orangtua set namaOrangTua='$namaOrangTua', idSiswa='$idSiswa', alamatOrangTua='$alamatOrangTua', kotaOrangTua='$kotaOrangTua', provinsiOrangTua='$provinsiOrangTua', noTlpOrangTua='$noTlpOrangTua', noHpOrangTua='$noHpOrangTua' where idOrangTua='$idOrangTua'");
		}

		function hapus_orangtua($idOrangTua){
			$query=$this->db->query("delete from data_orangtua where idOrangTua='$idOrangTua'");
			return $rows;
		}
		// Akhhir Data Orang Tua


		//Awal Buku Tamu
		function get_dataTamu(){
			$query=$this->db->query("select * from buku_tamu");
			return $query;
		}

		function insert_tamu(){
			$namaTamu=$this->input->post('namaTamu');
			$alamat=$this->input->post('alamat');
			$tanggalTamu=$this->input->post('tanggalPelanggaran');
			$jamTamu=$this->input->post('jamTamu');
			$hubunganTamu=$this->input->post('hubunganTamu');
			$namaSiswa=$this->input->post('namaSiswa');
			$kelas=$this->input->post('kelas');
			$keperluan=$this->input->post('keperluan');
			$query=$this->db->query("insert into buku_tamu(namaTamu, alamat, tanggalTamu, jamTamu, hubunganTamu, namaSiswa, kelas, keperluan) values ('$namaTamu','$alamat','$tanggalTamu','$jamTamu','$hubunganTamu','$namaSiswa','$kelas','$keperluan')");
		}


		function get_tamu($idTamu){
			$query = $this->db->query("select * from buku_tamu where idTamu='$idTamu'");
			return $query;
		}

		function update_data_db_tamu($idOrangTua){
			$idTamu=$this->input->post('idTamu');
			$namaTamu=$this->input->post('namaTamu');
			$alamat=$this->input->post('alamat');
			$hubunganTamu=$this->input->post('hubunganTamu');
			$namaSiswa=$this->input->post('namaSiswa');
			$kelas=$this->input->post('kelas');
			$keperluan=$this->input->post('keperluan');
			$query=$this->db->query("UPDATE buku_tamu set namaTamu='$namaTamu', alamat='$alamat', hubunganTamu='$hubunganTamu', namaSiswa='$namaSiswa', kelas='$kelas', keperluan='keperluan' where idTamu='$idTamu'");
		}

		function hapus_tamu($idTamu){
			$query=$this->db->query("delete from buku_tamu where idTamu='$idTamu'");
			return $rows;
		}
		// Akhir Buku Tamu

		
		//awal surat
		function get_list_data(){
			$query=$this->db->query("select * from berkas_surat order by idSurat");
			return $query;
		}

		/*function update_surat($idSurat){
			$idSurat=$this->input->post('idSurat');
			$nomorSurat=$this->input->post('nomorSurat');
			$alamatOrangTua=$this->input->post('alamatOrangTua');
			$kotaOrangTua=$this->input->post('kotaOrangTua');
			$hariPertemuan=$this->input->post('hariPertemuan');
			$jamPertemuan=$this->input->post('jamPertemuan');
			$tanggalPertemuan=$this->input->post('tanggalPertemuan');
			$berkas=$this->input->post('berkas');
			$query=$this->db->query("UPDATE berkas_surat set idSurat='$idSurat', nomorSurat='$nomorSurat', alamatOrangTua='$alamatOrangtua', kotaOrangTua='$kotaOrangTua', hariPertemuan='$hariPertemuan', jamPertemuan='$jamPertemuan', tanggalPertemuan='$tanggalPertemuan', berkas='$berkas' where idsurat='$idsurat'");
		}

		function get_surat($idSurat){
			$query = $this->db->query("k * from berkas_surat where idSurat='$idSurat'");
			return $query;
		}*/

		function insertSurat($data,$id){
		$this->db->where('idSurat',$id);
		$this->db->update('berkas_surat',$data);


	 	 }

	 	 function hapus_surat($idSurat){
			$query=$this->db->query("delete from berkas_surat where idSurat='$idSurat'");
			return $rows;
		}
		//Akhir Surat

		//Awal Data Siswa
		public function upload_data_siswa($filename){
        ini_set('memory_limit', '-1');
        $inputFileName = './siswa/'.$filename;
        try {
        $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
        } catch(Exception $e) {
        die('Error loading file :' . $e->getMessage());
        }

        $worksheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
        $numRows = count($worksheet);

        for ($i=2; $i < ($numRows+1) ; $i++) {
            // // $tgl_asli = str_replace('/', '-', $worksheet[$i]['B']);
            // // $exp_tgl_asli = explode('-', $tgl_asli);
            // // $exp_tahun = explode(' ', $exp_tgl_asli[2]);
            // $tgl_sql = $exp_tahun[0].'-'.$exp_tgl_asli[0].'-'.$exp_tgl_asli[1].' '.$exp_tahun[1];

            $ins = array(
                    "idSiswa"          => $worksheet[$i]["B"],
                    "tahunAjaran"   => $worksheet[$i]["C"],
                    "namaSiswa"   => $worksheet[$i]["D"],
                    "kelasSiswa"   => $worksheet[$i]["E"],
                    "jenisKelamin"   => $worksheet[$i]["F"],
                    "alamatSiswa"   => $worksheet[$i]["G"],
                    "noHpSiswa"   => $worksheet[$i]["H"],
                    );

            $this->db->insert('siswa', $ins);
        }
    }

		function listAjaran(){
			$data = "
				select tahunAjaran as name from tahun_ajaran
				";
			$sql = $this->db->query($data);
			return $sql->result();
		}

		function listKelas(){
			$data = "
				select namaKelas as kelas from kelas
				";
			$sql = $this->db->query($data);
			return $sql->result();
		}

 		function get_dataSiswa(){
			$this->db->select('*');
			$this->db->from('kelas');
			$this->db->join('siswa','siswa.kelasSiswa = kelas.namaKelas');
			$query = $this->db->get();
			return $query;
		}

		function get_dataSiswaByKelas($dropdown){
			$this->db->select('*');
			$this->db->from('kelas');
			$this->db->join('siswa','siswa.kelasSiswa = kelas.namaKelas');
			$this->db->where('kelasSiswa',$dropdown);
			$this->db->distinct('kelasSiswa');
			$query = $this->db->get();
			return $query;
		}

		function insert_siswa(){
			$tahunAjaran=$this->input->post('tahunAjaran');
			$idSiswa=$this->input->post('idSiswa');
			$namaSiswa=$this->input->post('namaSiswa');
			$kelasSiswa=$this->input->post('kelasSiswa');
			$jenisKelamin=$this->input->post('jenisKelamin');
			$alamatSiswa=$this->input->post('alamatSiswa');
			$noHpSiswa=$this->input->post('noHpSiswa');
			$query=$this->db->query("insert into siswa(tahunAjaran, idSiswa, namaSiswa, kelasSiswa, jenisKelamin, alamatSiswa, noHpSiswa) values ('$tahunAjaran','$idSiswa','$namaSiswa','$kelasSiswa','$jenisKelamin','$alamatSiswa','$noHpSiswa')");
		}

		function hapus_Siswa($idSiswa){
			$this->db->where('idSiswa',$idSiswa);
			$this->db->delete('siswa');
		}

		function get_siswa($idSiswa){
			$query = $this->db->query("select * from siswa where idSiswa='$idSiswa'");
			return $query;
		}

		function walikelassiswa($dropdown){
			$query=$this->db->query("Select distinct walikelas from kelas where namaKelas='$namaKelas'");
			//$this->db->select('waliKelas');
			//$this->db->from('kelas');
			$this->db->limit(1);
			$this->db->where('namaKelas',$dropdown);
			$query = $this->db->get();
			return $query->row();
		}

		function update_data_db_siswa($idSiswa){
			$tahunAjaran=$this->input->post('tahunAjaran');
			$idSiswa=$this->input->post('idSiswa');
			$namaSiswa=$this->input->post('namaSiswa');
			$kelasSiswa=$this->input->post('kelasSiswa');
			$jenisKelamin=$this->input->post('jenisKelamin');
			$alamatSiswa=$this->input->post('alamatSiswa');
			$noHpSiswa=$this->input->post('noHpSiswa');
			$query=$this->db->query("UPDATE siswa set idSiswa='$idSiswa', namaSiswa='$namaSiswa', kelasSiswa='$kelasSiswa', jenisKelamin='$jenisKelamin', alamatSiswa='$alamatSiswa', noHpSiswa='$noHpSiswa', tahunAjaran='$tahunAjaran' where idSiswa='$idSiswa'");
		}

		function get_kelas(){
			$data = "
				select distinct(namaKelas) as kelas
				from kelas 
			";
		$sql = $this->db->query($data);
		return $sql->result();

		}
		//Akhir Data Siswa
	
		//Awal Username walas
		function get_dataWalas(){
			$query=$this->db->query("select * from walikelas");
			return $query;
		}

		function insert_username(){
			$username=$this->input->post('usernameajah');
			$password=$this->input->post('passwordajah');
			
			$jabatan=$this->input->post('jabatan');
			$namaKelas=$this->input->post('namaKelas');
			$query=$this->db->query("insert into walikelas(username, password,jabatan,namaKelas) values ('$username','$password','$jabatan','$namaKelas')");
		}
		function hapus_username($idUsername){
			$query=$this->db->query("delete from walikelas where idUsername='$idUsername'");
			return $rows;
		}
		// akhir username walas

		//awal kelola wali kelas
		function get_dataWaliKelas(){
			$query=$this->db->query("select * from kelas");
			return $query;
		}

		function insert_walikelas(){
			$idkelas=$this->input->post('namaKelas');
			$waliKelas=$this->input->post('waliKelas');
			$jabatan=$this->input->post('jabatan');
			$query=$this->db->query("insert into kelas(namaKelas, waliKelas, jabatan) values ('$idkelas','$waliKelas','$jabatan')");
		}

		function hapus_walikelas($idkelas){
			$this->db->where('idkelas',$idkelas);
			$this->db->delete('kelas');
		}

		function updatePassword($idkelas){
			$password=$this->input->post('password');
			$idkelas=$this->input->post('idkelas');
			$query=$this->db->query("UPDATE kelas set password='$password'  where idkelas='$idkelas'");
		}

		function update_WaliKelas($idkelas){
			$idkelas=$this->input->post('idkelas');
			$namaKelas=$this->input->post('namaKelas');
			$waliKelas=$this->input->post('waliKelas');
			$jabatan=$this->input->post('jabatan');
			$query=$this->db->query("UPDATE kelas set idkelas='$idkelas', namaKelas='$namaKelas', waliKelas='$waliKelas',jabatan='$jabatan' where idkelas='$idkelas'");
		}

		function get_waliskelas($idkelas){
			$query = $this->db->query("select * from kelas where idkelas='$idkelas'");
			return $query;
		}
		//akhir kelola wali kelas

		//awal kelas terbaik
		function getkelasterbaik(){
			$query = $this->db->query('select siswa.kelasSiswa, data_pelanggaran.tanggalPelanggaran, count(siswa.kelasSiswa) as banyak from data_pelanggaran join siswa on siswa.idSiswa = data_pelanggaran.idSiswa group by siswa.kelasSiswa');
			return $query;
		}
		//akhir kelas terbaik

		//awal notifikasi
		 function viewApprove() {

        $notif_poin = $this->db->query("SELECT count( idsiswa ) notif
											FROM (
											SELECT idsiswa
											FROM data_pelanggaran
											HAVING sum( poinpelanggaran ) >=35)a");
									
		        
        if($this->session->userdata('status')=='1' ) {
            foreach ($notif_poin->result_array() as $row1) { 
               echo $v = $row1['notif']; 
            }
        } 
    }

    function viewDes() {
        $nip = $this->session->userdata('nip');
        
        // Perangkat
        $des_poin35 = $this->db->query("SELECT namasiswa, notif, poin 'notif_35'
									from siswa s join
									(
									SELECT count( idsiswa ) notif, idsiswa, poin
									FROM (
									SELECT idsiswa, sum(poinpelanggaran) poin
									FROM data_pelanggaran
									HAVING sum( poinpelanggaran ) >=35
									) a
									 ) b on (b.idsiswa=s.idsiswa)");

        echo "<div>";
        
        if ($this->session->userdata('status') == '1') {
            foreach ($des_poin35->result_array() as $row) {
                echo '<a href="../bk/detail_pelanggaran"style="font-size:10pt;text-decoration:none;" >' . ' Siswa yang bernama ' .  $row['namasiswa'] . ' telah memiliki poin pelanggaran ' . $row['notif_35'] . '</a>';
                echo ' <li class="divider"></li>';
            }
        } 
        
        echo "</div>";
    }
    //akhir notifikasi

    //awal history
    function getHistory($idSiswa){
		$data = "
			select b.namaSiswa, a.jamPelanggaran, a.tanggalPelanggaran, a.jenisPelanggaran, a.deskripsiPelanggaran, a.poinPelanggaran
			from history c
			join siswa b on b.idSiswa = c.idSiswa
			join history a on c.idSiswa = a.idSiswa
			where b.idSiswa = '$idSiswa'
			";
		$sql = $this->db->query($data);
		return $sql->result();

		
	}

	function caribulan($caribulan){
		$query = $this->db->query('select siswa.kelasSiswa, data_pelanggaran.tanggalPelanggaran, count(siswa.kelasSiswa) as banyak from data_pelanggaran join siswa on siswa.idSiswa = data_pelanggaran.idSiswa where data_pelanggaran.tanggalPelanggaran like "%$caribulan%" group by siswa.kelasSiswa');
			return $query;
	}
	//akhir history

    //awal kirim sms
   function get_list_data_sms($idSiswa){
			$query = $this->db->query("select a.idSiswa, b.namaSiswa, sum(poinPelanggaran) as JumlahPoin, b.kelasSiswa, c.noHpOrangTua
					from data_pelanggaran a
					join siswa b on a.idSiswa = b.idSiswa
					join data_orangtua c on b.idSiswa = c.idSiswa
					where b.idSiswa='$idSiswa'");
			 $rows=$query->row();
			return $rows;
		}


		function get_list_data_sms2($idSiswa){
			$query = $this->db->query("select a.idSiswa, b.namaSiswa, sum(poinPelanggaran) as JumlahPoin, b.kelasSiswa, c.noHpOrangTua
					from data_pelanggaran a
					join siswa b on a.idSiswa = b.idSiswa
					join data_orangtua c on b.idSiswa = c.idSiswa
					where b.idSiswa='$idSiswa'");
			return $query->row();
		}

		function get_list_data_nomor($idSiswa){
			$query=$this->db->query("select noHpSiswa from siswa where idSiswa='$idSiswa'");
			$row=$query->row();
			return $row;
		}
	//akhir kirim sms

		function getPelanggaran($tahun, $jenisPelanggaran)
		{
			$result = $this->db->query('
				SELECT 
					*, 
					count(tanggalPelanggaran) as pelanggaran
				FROM 
					data_pelanggaran
				WHERE
					jenisPelanggaran = "'.$jenisPelanggaran.'"
				AND
					tanggalPelanggaran LIKE "'.$tahun.'%"
				GROUP BY
					tanggalPelanggaran
			')->result();
			return $result;
		}

		function getKelasTerbaik2($tahun, $bulan) 
		{
			$bulan = str_pad($bulan, 2, "0", STR_PAD_LEFT);
			$query = $this->db->query('
				select 
					siswa.kelasSiswa, 
					data_pelanggaran.tanggalPelanggaran, 
					count(siswa.kelasSiswa) as banyak 
				from 
					data_pelanggaran 
				join 
					siswa on siswa.idSiswa = data_pelanggaran.idSiswa 
				WHERE 
					data_pelanggaran.tanggalPelanggaran LIKE "'.$tahun.'-'.$bulan.'%"
				group by 
					siswa.kelasSiswa
			')->result();
			return $query;
		}
	}
?>	