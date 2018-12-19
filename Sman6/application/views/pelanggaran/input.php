        <!--  page-wrapper -->
          <div id="page-wrapper">
            <div class="row">
                 <!-- page header -->
                <div class="col-lg-12">
                    <h4 class="page-header">Tambah Data Pelanggaran Nilai Sikap Siswa</h4>
                </div>
                <!--end page header -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Silahkan isi data pelanggar nilai sikap
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-8">
                                    <form role="form" action="<?php echo base_url();?>index.php/bk/simpan_pelanggaran" method="post">

                                        <div class="form-group">
                                            <label for="idSiswa">ID SISWA</label>
                                            <input type ="text" class="form-control" name="idSiswa" onkeypress="return hanyaAngka(event)" placeholder="NIS Siswa" required />
                                        </div>

                                       <div></div>
										<div class="form-group">
                                            <label>PILIH JENIS PELANGGARAN SIKAP</label>
                                                <select required class="form-control" id="jenisPelanggaran" name="jenisPelanggaran" placeholder="Kategori Pelanggaran" required class="a">
													<option value="">-- Pilih Jenis Pelanggaran Sikap --</option>
                                                    <?php foreach ($list_id as $kl) { ?>
                                                        <option  value="<?php echo $kl->name; ?>"><?php echo $kl->name?>
                                                    <?php
                                                    }
                                                    ?>
												</select>
                                        </div>
										

                                         <div class="form-group">
                                            <label>TANGGAL PELANGGARAN SIKAP</label>
                                             <input required class="form-control" value="<?php date_default_timezone_set('asia/Bangkok'); echo date('Y-m-d'); ?>" name="tanggalPelanggaran" readonly>
                                         </div>

										
                                        <div class="form-group">
                                            <label>JAM PELANGGARAN SIKAP</label>
                                            <input required   class="form-control" value="<?php date_default_timezone_set('asia/Bangkok'); echo date('H:i:s'); ?>" name="jamPelanggaran" readonly>
                                        </div>
										
                                        <div class="form-group" id="kerapihan">
                                            <label>DESKRIPSI KERAPIAN</label>
                                            <select class="form-control" name="deskripsiPelanggaranKerapihan" class="a">
                                                <option value="">-- pilih jenis pelanggaran --</option>
                                                <?php foreach ($list_kerapihan as $kl) { ?>
                                                    <option onclick="get_poin('<?php echo $kl->value?>')" value="<?php echo $kl->name; ?>"><?php echo $kl->name?>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group" id="kerajinan">
                                            <label>DESKRIPSI KERAJINAN</label>
                                            <select class="form-control" name="deskripsiPelanggaranKerajinan" class="a">
                                                <option value="">-- Pilih Jenis Pelanggaran --</option>
                                                <?php foreach ($list_kerajinan as $kl) { ?>
                                                    <option onclick="get_poin('<?php echo $kl->value?>')" value="<?php echo $kl->name; ?>"><?php echo $kl->name?>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
										<div class="form-group" id="larangan">
                                            <label>DESKRIPSI LARANGAN SISWA</label>
                                            <select class="form-control" name="deskripsiPelanggaranLarangan" class="a">
                                                <option value="">-- pilih jenis pelanggaran --</option>
                                                <?php foreach ($list_larangan_siswa as $kl) { ?>
                                                    <option onclick="get_poin('<?php echo $kl->value?>')" value="<?php echo $kl->name; ?>"><?php echo $kl->name?>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
										<div class="form-group">
                                            <label>POIN PELANGGARAN</label>
                                            <input required class="form-control" id="poinPelanggaran" name="poinPelanggaran" placeholder="Poin Yang Di Dapat" readonly="">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit Button</button>
                                        <button type="reset" class="btn btn-success">Reset Button</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>
        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="<?php echo base_url()?>assets/plugins/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url()?>assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url()?>assets/plugins/pace/pace.js"></script>
    <script src="<?php echo base_url()?>assets/scripts/siminta.js"></script>
    <script>
        $(function(){
            $("#kerajinan").hide();
            $("#kerapihan").hide();
            $("#larangan").hide();
            $('#jenisPelanggaran').on('change', function(){
                if($('#jenisPelanggaran').val() == 'Kerajinan'){
                    get_kerajinan();
                }else if($('#jenisPelanggaran').val() == 'Kerapihan'){
                    get_kerapihan();
                }else{
                    get_larangan();
                }
            });
        });
        function get_poin(poin){
            $("#poinPelanggaran").val(poin);
        }
        function get_kerapihan(){
            $("#kerajinan").hide();
            $("#kerapihan").show();
            $("#larangan").hide();
            
        }
        function get_kerajinan(){
            $("#kerajinan").show();
            $("#kerapihan").hide();
            $("#larangan").hide();
            
        }
        function get_larangan(){
            $("#kerajinan").hide();
            $("#kerapihan").hide();
            $("#larangan").show();
            
        }

        function hanyaAngka(evt) {
          var charCode = (evt.which) ? evt.which : event.keyCode
           if (charCode > 31 && (charCode < 48 || charCode > 57))
 
            return false;
          return true;
        }
    </script>
</body>

</html>
