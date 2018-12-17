<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootsrtap Free Admin Template - SIMINTA | Admin Dashboad Template</title>
    <!-- Core CSS - Include with every page -->
    <link href="<?php echo base_url()?>assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/css/main-style.css" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <link href="<?php echo base_url()?>assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
   </head>
<body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">
                    <img src="<?php echo base_url()?>assets/img/logoSmanam.jpg" alt="" class="img-square" style="width:100px; height: 45px" />
                </a>
                <a class="navbar-brand" href="index.html">
                    <img src="<?php echo base_url()?>assets/img/tulisan.jpg" alt="" class="img-square" style="width:100px; height: 45px" />
                </a>
            </div>
            <!-- end navbar-header -->
            <!-- navbar-top-links -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- main dropdown -->
              
                        
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-3x"></i>
                    </a>
                    <!-- dropdown user-->
                    <ul class="dropdown-menu dropdown-user">
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url()?>/walikelas/logout"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                        </li>
                    </ul>
                    <!-- end dropdown-user -->
                </li>
                <!-- end main dropdown -->
            </ul>
            <!-- end navbar-top-links -->

        </nav>
        <!-- end navbar top -->

        <!-- navbar side -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        <!-- user image section-->
                        <div class="user-section">
                               <div class="user-section-inner">
                                <img src="<?php echo base_url()?>assets/img/user.png" alt="">
                            </div>
                            <div class="user-info">
                                <div>Wali <strong>Kelas</strong></div>
                                <div class="user-text-online">
                                    <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online
                                </div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                    <li>
                        <a href="<?php echo site_url()?>/walikelas/walas_page"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
                    </li>                
                    
                    <li>
                        <a href="#"><i class="fa fa-ban fa-fw"></i>Kelola Pelanggaran Sikap<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                           <li>
                            <a href="<?php echo site_url()?>/walikelas/form_input_pelanggaran"><i class="fa fa-edit fa-fw"></i>Tambah Pelanggaran Sikap</a>
                           </li>
                            <li>
                                <a href="<?php echo site_url()?>/walikelas/data_pelanggaran_siswa"><i class="fa fa-table fa-fw"></i>Data Pelanggaran Sikap</a>
                            </li>
                            
                            </ul>
                        <!-- second-level-items -->
                    </li>
                    
                    
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i>Daftar Peraturan Sekolah<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo site_url()?>/walikelas/peraturan_kerapian"><i class="fa fa-table fa-fw"></i>Pelanggaran Kerapian</a>
                            </li>
                            <li>
                               <a href="<?php echo site_url()?>/walikelas/peraturan_kerajinan"><i class="fa fa-table fa-fw"></i>Pelanggaran Kerajinan</a>
                            </li>
                            <li>
                               <a href="<?php echo site_url()?>/walikelas/peraturanLaranganSiswa"><i class="fa fa-table fa-fw"></i>Larangan Siswa</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                     <li>
                        <a href="<?php echo site_url()?>/walikelas/dataSiswa"><i class="fa fa-files-o fa-fw"></i> Data Siswa </a>
                    </li> 
                                        
                        </ul>
                        <!-- second-level-items -->
                    </li>
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>
        <!-- end navbar side -->
        <!--  page-wrapper -->
          <div id="page-wrapper">
            <div class="row">
                 <!-- page header -->
                <div class="col-lg-12">
                    <h4 class="page-header">Tambah Data Pelanggaran Siswa</h4>
                </div>
                <!--end page header -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Silahkan isi data pelanggar
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-8">
                                    <form role="form" action="<?php echo base_url();?>index.php/walikelas/simpan_pelanggaran" method="post">

                                        <div class="form-group">
                                            <label>PILIH JENIS PELANGGARAN</label>
                                                <select required class="form-control" id="idSiswa" name="idSiswa" placeholder="idSiswa" required class="a">
                                                    <option value="">-- Pilih NIS Siswa --</option>
                                                    <?php 
                                                        foreach ($nis->result() as $ns) { 
                                                        if($ns->kelasSiswa == $kelas){
                                                    ?>
                                                        <option value="<?php echo $ns->idSiswa; ?>"><?php echo $ns->idSiswa?></option>
                                                    <?php
                                                    }
                                                    }
                                                    ?>
                                                </select>
                                        </div>

                                       <div></div>
                                        <div class="form-group">
                                            <label>PILIH JENIS PELANGGARAN</label>
                                                <select required class="form-control" id="jenisPelanggaran" name="jenisPelanggaran" placeholder="Kategori Pelanggaran" required class="a">
                                                    <option value="">-- pilih jenis pelanggaran --</option>
                                                    <?php foreach ($list_id as $kl) { ?>
                                                        <option  value="<?php echo $kl->name; ?>"><?php echo $kl->name?>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                        </div>
                                        

                                         <div class="form-group">
                                            <label>TANGGAL PELANGGARAN</label>
                                             <input required class="form-control" value="<?php echo date('Y-m-d'); ?>" name="tanggalPelanggaran" readonly>

                                        </div>

                                        
                                        <div class="form-group">
                                            <label>JAM PELANGGARAN</label>
                                            <input required   class="form-control" value="<?php date_default_timezone_set('Asia/Bangkok'); echo date('H:i:s'); ?>" name="jamPelanggaran" readonly>
                                        </div>
                                        
                                        <div class="form-group" id="kerapihan">
                                            <label>DESKRIPSI KERAPIHAN</label>
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
                                                <option value="">-- pilih jenis pelanggaran --</option>
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
                                            <input required class="form-control" id="poinPelanggaran" name="poinPelanggaran">
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
    </script>
</body>

</html>
