<html>
	<?php
	foreach($isi_surat AS $value){
		
	}
	?>
	<style>
		#kanan {
			float:right;
		}

		#Header

		
		#kanan1 {
			float:right;
			margin-right: -118px;
		}
		
		#kanan2 {
			float:right;
			margin-right:-140px;
			margin-top: 110px;
		}
		#tabel{
			margin-left: 100px;
		}
		#tanggal{
			margin-right: : 100px;
			float: right;
		}
	</style>
	<table width="1300" align="center" border="0" cellpadding="1">
		<tr>
			<td colspan="2">
				<table border="0">
					<tr>
						<td width="200" >
							<img src="<?php echo base_url()?>assets/img/jatim.jpg" class="img-square" style="width:150px;"/>
						</td>
						<td align="center" border="1" cellpadding="1" style="width:1300px;">
							<span style="font-family: arial; font-size: 30;"><b>PEMERINTAH PROVINSI JAWA TIMUR</b><br><b
							>DINAS PENDIDIKAN</b><br>
							<b><STRONG>SEKOLAH MENENGAH ATAS NEGERI 6 SURABAYA</STRONG></b></font><br>
							<span style="font-family: arial; font-size: 25;"><b>Jl. Gubernur Soeryo Nomor 11 Telp.(031) 534974 - Fax(031) 5482814</b><br>
							<span style="font-family: arial; font-size: 30;"><b>SURABAYA 60271</b>
						</td>
					</tr>
				</table>
			</td>
		<tr>
			<td colspan="2"> <hr width="1300" size="5" noshade=""></td>
		</tr>
		<tr>
			<td span style="font-family: arial; font-size: 30">
				<p> Nomor &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: 422 / <?php foreach ($isi_surat2 as $row){echo $row->idSurat;}?> / 101.6.1.6 / 2017 <br>
				 Perihal &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:<u> Permasalahan Putra/Putri Saudara </u>
				<p> Kepada Yth : <br>
				<strong> Bapak / Ibu <?php echo $value->namaOrangTua ?> </strong> <br>
				<?php echo $value->alamatOrangtua ?> <br>
				 di <br>
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $value->kotaOrangTua ?> 
			</td>
			<td  valign="top">	
				<table id="tanggal" style="font-family: arial; font-size: 30">
					<tr>
						<td>Surabaya</td>
						<td>,</td>
						<?php 
							$bulan = substr($row->tanggalSurat,0,10);
							$b = $bulan;
							$date = date('M',strtotime($b));
						?>
						<td> <?php echo substr($row->tanggalSurat,8,2) ?> <?php echo $date; ?> <?php echo substr($row->tanggalSurat,0,4) ?></td>
					</tr>
				</table>
			</td>
		</tr>
		
			<td height="100px" colspan="2"></td>
			<tr></tr>
		
		<tr>
			<td colspan="2" style="font-family: arial; font-size: 30">
				<p> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp; Mengharap dengan hormat, atas kehadiran Bapak/Ibu/orang tua / wali murid dari siswa &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp yang bernama : <STRONG><u><?php echo $value->namaSiswa ?></u></STRONG>, Kelas : <strong><u><?php echo $value->kelasSiswa ?></u></strong> besok pada :</p>
			</td>
			<td></td>
		</tr>
		<tr>
			<td colspan="2" span style="font-family: arial; font-size: 30">
				<br>
				<table id="tabel" style="font-family: arial; font-size: 30">
				<tr>
				<td>Hari</td>
				<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</td>
				<td><?php foreach ($isi_surat2 as $row){echo $row->hariPertemuan;}?></td>
				</tr>

				<tr>
				<td>Tanggal</td>
				<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</td>
				<td> <?php echo substr($row->tanggalSurat,8,2) ?>-<?php echo substr($row->tanggalSurat,5,2) ?>-<?php echo substr($row->tanggalSurat,0,4) ?></td>
				</tr>
				
				<tr>
				<td>Waktu</td>
				<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</td>
				<td><?php foreach ($isi_surat2 as $row){echo $row->jamPertemuan;}?></td>
				</tr>
				
				<tr>
				<td>Tempat</td>
				<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</td>
				<td>Ruang BK SMAN 6 Surabaya</td>
				</tr>
				
				<tr>
				<td>Menemui</td>
				<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</td>
				<td><strong>Guru BK/BP</strong></td>
				</tr>

				<tr>
				<td>Keperluan</td>
				<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</td>
				<td>Untuk membicarakan mengenai putra bapak/ibu</td>
				</tr>
				</table>
			</td>
		</tr>
			<td colspan="2" span style="font-family: arial; font-size: 30">
				<br>
				<p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;  Demikian atas perhatian dan kerjasama yang diberikan, Kami sampaikan terima kasih </p>
			</td>
		
		<tr>
			<td colspan="2">
				<p> 
				
			</td>
		</tr>
		<tr></tr>
		<td height="200px" colspan="2"></td>
		<tr>
			<td colspan="2" span style="font-family: arial; font-size: 30">
				&nbsp&nbsp&nbsp&nbsp&nbsp Mengetahui,
			</td>
		</tr>
		<tr>
			<td colspan="2" span style="font-family: arial; font-size: 30">
				
				<table border="0" align="center" style="font-family: arial; font-size: 30">
					<tr  align="center">
						<td>Kepala Sekolah SMA Negeri 6 Surabaya <br><br><br><br><br></td>
						<td width="800"></td>
						<td valign="top"> Guru BK</td>
					</tr>

					<tr align="center">
						<td width="50%">
							<b> Drs. H. F.A Nurseno M,Pd.</b><br>
							<b>Pembina Tk. I</b><br>
							<b>NIP : 19631020 198903 1 01</b>
						</td>
							<td></td>
						<td width="50%"><strong>YANIE SOESANTI, S.Pd</strong> <br>
							NIP : 	19760102 200801 2 01
						</td>
					</tr>
				</table>

			</td>
			<td></td>
		</tr>
	</table>

	
	<!-- <script>
		print();
	</script> -->
</html>

