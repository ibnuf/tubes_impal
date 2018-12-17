
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
    <link href="<?php echo base_url()?>css/gaya.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/scripts/jquery-1.4.3.min.js"></script>

    <script type="text/javascript">
            $(document).ready(function() {
                des();
            });

            function cek() {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/Bk/viewApp",
                    cache: false,
                    success: function(msg) {
                        $("#notification").html(msg);
                    }
                });
                var waktu = setTimeout("cek()", 3000);
            }

            function des(){
                cek();
                //$("#pesan").click(function() {
                    $.ajax({
                        url: "<?php echo base_url(); ?>index.php/Bk/des",
                        cache: false,
                        success: function(msg) {
                        //  document.write(msg);
                            $("#kontent").html(msg);
                        }
                    });
                //});
            }

        </script>
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
            </div>
            <!-- end navbar-header -->
            <!-- navbar-top-links -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- main dropdown   
                 <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="top-label label label-warning" id="notifications"></span>  <i class="fa fa-bell fa-3x"></i>
                    </a>
                    <!-- dropdown alerts
                    <ul class="dropdown-menu dropdown-alerts" id="kontent">
                        
                        <li class="divider" id="kontent"></li>
                        <li>
                            <a class="text-center" href="<?php echo base_url() ?>index.php/rapat/nn" class="list-group-item text-right" >
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- end dropdown-alerts -->
                </li>
                <!--- dropdown logout -->                  
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-3x"></i>
                    </a>
                    <!-- dropdown user-->
                    <ul class="dropdown-menu dropdown-user">
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url()?>/login/logout"><i class="fa fa-sign-out fa-fw"></i> Keluar</a>
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
                                <div>Guru <strong>BK</strong>
                                    <?php echo ($this->session->userdata('$role')); ?>
                                </div>
                                <div class="user-text-online">
                                    <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online
                                </div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                    <li>
                        <a href="<?php echo site_url()?>/bk/admin_page"><i class="fa fa-home fa-fw"></i> Beranda</a>
                    </li>                
                    
                    <li>
                        <a href="#"><i class="fa fa-ban fa-fw"></i> Kelola Pelangaran  Sikap<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                           <li>
                            <a href="<?php echo site_url()?>/bk/form_input_pelanggaran"><i class="fa fa-edit fa-fw"></i> Tambah Pelanggaran Sikap</a>
                           </li>
                            <li>
                                <a href="<?php echo site_url()?>/bk/data_pelanggaran_siswa"><i class="fa fa-table fa-fw"></i> Data Pelangaran Sikap</a>
                            </li>
                            
                            <li>
                                <a href="<?php echo site_url()?>/bk/display_chart"><i class="fa fa-bar-chart-o"></i> Grafik Pelanggaran Sikap</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url()?>/bk/kelas_terbaik"><i class="fa fa-bar-chart-o"></i> Kelola Kelas Terbaik</a>
                            </li>
                             <li>
                                <a href="<?php echo site_url()?>/bk/history"><i class="fa fa-bar-chart-o"></i> History Pelanggaran Sikap</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                    
                    
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i> Daftar Peraturan Sekolah<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo site_url()?>/bk/peraturan_kerapian"><i class="fa fa-table fa-fw"></i> Pelanggaran Kerapian</a>
                            </li>
                            <li>
                               <a href="<?php echo site_url()?>/bk/peraturan_kerajinan"><i class="fa fa-table fa-fw"></i> Pelanggaran Kerajinan</a>
                            </li>
                            <li>
                               <a href="<?php echo site_url()?>/bk/peraturanLaranganSiswa"><i class="fa fa-table fa-fw"></i> Larangan Siswa</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                    <li>
                        <a href="<?php echo site_url()?>/bk/orangTuaSiswa"><i class="fa fa-male fa-fw"></i> Data Orang Tua Siswa</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url()?>/bk/dataSiswa"><i class="fa fa-files-o fa-fw"> </i> Data Siswa</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url()?>/bk/dataSurat"><i class="fa fa-envelope fa-fw"></i> Data Surat Terkirim</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url()?>/bk/wali_kelas"><i class="fa fa-book fa-fw"> </i> Kelola Guru </a>
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
                    <h4 class="page-header">Tambah Data Peraturan Pelanggaran Kerajinan</h4>
                </div>
                <!--end page header -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Basic Form Elements
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-8">
                                    <form role="form" action="<?php echo base_url();?>index.php/bk/simpan_kerajinan" method="post">
                                        <div class="form-group">
                                            <label>Tanggal Berlaku Peraturan</label>
                                             <input required class="form-control" value="<?php date_default_timezone_set('asia/Bangkok'); echo date('Y-m-d'); ?>" name="tanggalBerlaku" readonly>
                                         </div>

										<div class="form-group">
                                            <label>Deskripsi Pelanggaran</label>
                                            <textarea required class="form-control" name="deskripsiKerajinan" rows="3"></textarea>
                                        </div>
																		
										<div class="form-group">
                                            <label>POIN PELANGGARAN</label>
                                            <input required class="form-control" name="poinKerajinan">
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

</body>

</html>
