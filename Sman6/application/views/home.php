
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
    <link href="<?php echo base_url()?>assets/bootstrapchart/css/mdb.min.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/bootstrapchart/css/style.min.css" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <link href="<?php echo base_url()?>assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
    
    <link href="<?php echo base_url()?>css/gaya.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/scripts/jquery-1.4.3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrapchart/js/mdb.min.js"></script>

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
                                <div><div><?php echo $nama?></div>
                                </div>
                                <div class="user-text-online">
                                    <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online
                                </div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                    <li>
                        <a href="<?php echo site_url()?>/bk/admin_page"><i class="fa fa-home fa-fw"></i> Dashboard</a>
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
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h3 class="page-header">Selamat Datang !!</h3>
                </div>
                <!--End Page Header -->
            </div>

            <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;Halo ! </b>   Selamat Datang Kembali <b><?php echo $nama?>,
 </b>
            <i class="fa  fa-people"></i>&nbsp;Sudah </b>Input Pelanggaran Apa Hari Ini?
                    </div>
                </div>
                <!--end  Welcome -->
            </div>


            <div class="row">
                <!--quick info section -->
           <h3>Sambutan Kepala Sekolah</h3>
           <div class="container">
                <div class="row" style="background-color:white">
                    <div class="col-sm-6">
                        <h3>Larangan Siswa (<?php echo date("Y")?>)</h3>
                        <canvas id="myChart" style="max-width: 600px;"></canvas>
                    </div>
                    <div class="col-sm-6">
                        <h3>Kerajinan (<?php echo date("Y")?>)</h3>
                        <canvas id="myChart2" style="max-width: 600px;"></canvas>
                    </div>
                    <div class="col-sm-6">
                        <h3>Kerapihan (<?php echo date("Y")?>)</h3>
                        <canvas id="myChart3" style="max-width: 600px;"></canvas>
                    </div>
                    <div class="col-sm-6">
                        <h3>Pelanggaran Per-Kelas (<?php echo date("Y - M")?>)</h3>
                        <canvas id="myChart4" style="max-width: 600px;"></canvas>
                    </div>
                </div>
            </div>
                <!--end quick info section -->
            </div>

            <div class="row">
                <div class="col-lg-8">



                    <!--Area chart example -->
                    
                    <!--End area chart example -->
                    <!--Simple table example -->
                   
                    <!--End simple table example -->

                


        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->

    <script type="text/javascript">
        var ctx = document.getElementById("myChart").getContext('2d');
        var ctx2 = document.getElementById("myChart2").getContext('2d');
        var ctx3 = document.getElementById("myChart3").getContext('2d');
        var ctx4 = document.getElementById("myChart4").getContext('2d');

        $(document).ready(function(){
            var d = new Date();
            var year = d.getFullYear();
            getChartData(year);
        });

        $('#filterBtn').click(function(){
            var tahun = $('#tahunFilter').val();
            if (tahun == '') {
                var d = new Date();
                var tahun = d.getFullYear();
            }
            getChartData(tahun);
        });

        function getChartData(tahun) {
            $.ajax({
                url: "<?php echo base_url()?>index.php/bk/getChartData",
                type: "GET",
                dataType: "JSON",
                data: { 
                    "tahun" : tahun 
                },
                success: function(response){
                    var kerajinan = response.kerajinan;
                    var kerapihan = response.kerapihan;
                    var larangan_siswa = response.larangan_siswa;
                    var kelas_terbaik = response.kelas_terbaik;
                    var label = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Sep", "Des"];
                    
                    var dataKerajinan = [];
                    $.each(kerajinan, function( index, value ) {
                        var res = value.tanggalPelanggaran.split("-");
                        var bulan = res[1];
                        // var bulan = bulan.replace("0", "");
                        for (var i = 1 ; i <= 12; i++) {
                            if (i == bulan) {
                                dataKerajinan[i] = value.pelanggaran;
                            }
                        }
                    });

                    var dataKerapihan = [];
                    $.each(kerapihan, function( index, value ) {
                        var res = value.tanggalPelanggaran.split("-");
                        var bulan = res[1];
                        // var bulan = bulan.replace("0", "");
                        for (var i = 1 ; i <= 12; i++) {
                            if (i == bulan) {
                                dataKerapihan[i] = value.pelanggaran;
                            }
                        }
                    });

                    var dataLarangan = [];
                    $.each(larangan_siswa, function( index, value ) {
                        var res = value.tanggalPelanggaran.split("-");
                        var bulan = res[1];
                        // var bulan = bulan.replace("0", "");
                        for (var i = 1 ; i <= 12; i++) {
                            if (i == bulan) {
                                dataLarangan[i] = value.pelanggaran;
                            }
                        }
                    });

                    var dataKelasTerbaik = [];
                    var labelKelas = [];
                    $.each(kelas_terbaik, function( index, value ) {
                        labelKelas[index] = value.kelasSiswa;
                        dataKelasTerbaik[index] = value.banyak; 
                    });

                    charGrafik(ctx, dataLarangan, label);
                    charGrafik(ctx2, dataKerajinan, label);
                    charGrafik(ctx3, dataKerapihan, label);
                    charGrafik(ctx4, dataKelasTerbaik, labelKelas);
                },
                error: function(response){
                    console.log(response);
                }
            });
        }

        function charGrafik(ctxAttr, data, label) {
            var myChart = new Chart(ctxAttr, {
                type: 'bar',
                data: {
                labels: label,
                datasets: [{
                    label: '# jumlah pelanggaran',
                    data: data,
                    backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    ],
                    borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    ],
                    borderWidth: 1
                }]
                },
                options: {
                scales: {
                    yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                    }]
                }
                }
            });
        }
    </script>

    <!-- Core Scripts - Include with every page -->
    <script src="<?php echo base_url()?>assets/plugins/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url()?>assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url()?>assets/plugins/pace/pace.js"></script>
    <script src="<?php echo base_url()?>assets/scripts/siminta.js"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="<?php echo base_url()?>assets/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="<?php echo base_url()?>assets/plugins/morris/morris.js"></script>
    <script src="<?php echo base_url()?>assets/scripts/dashboard-demo.js"></script>

</body>

</html>
