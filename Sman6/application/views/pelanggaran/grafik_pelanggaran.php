
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
                    <h4 class="page-header">Grafik Pelanggaran Nilai Sikap Siswa Di SMA Negeri 6 Surabaya</h4>
                </div>
                <!--End Page Header -->
            </div>

            <div class="row">
                <!-- Welcome -->
                
<div class="container">
        <div class="row">
            
            
            <!-- Here begin Main Content -->
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="widget-item">
                            <form action="<?php echo base_url ()?>/index.php/bk/display_chart" method="post">
                            <select name="tahun" id="tahunFilter"> 
                                
                                <?php 
                                    
                                    for ($i=2017; $i < 2021; $i++) {
                                
                                echo "<option> $i </option>";
                            }?></select>
                            
                            <!-- <input name="button" type="submit"> -->
                            <input name="button" id="filterBtn" type="button" value="submit">
                            </form>
                            <tr>
                            Grafik Dihitung Berdasarkan Katagori Pelanggaran Nilai Sikap Perbulannya
                            </tr>

                            </tr>
                            <div class="form-group">
                            <br>
                </div>  
<div class="container">
    <div class="row" style="background-color:white">
        <div class="col-sm-6">
            <h3>Larangan Siswa</h3>
            <canvas id="myChart" style="max-width: 600px;"></canvas>
        </div>
        <div class="col-sm-6">
            <h3>Kerajinan</h3>
            <canvas id="myChart2" style="max-width: 600px;"></canvas>
        </div>
        <div class="col-sm-6">
            <h3>Kerapihan</h3>
            <canvas id="myChart3" style="max-width: 600px;"></canvas>
        </div>
    </div>
</div>


    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <style type="text/css">
            ${demo.css}
        </style>
    <script type="text/javascript">
    var ctx = document.getElementById("myChart").getContext('2d');
    var ctx2 = document.getElementById("myChart2").getContext('2d');
    var ctx3 = document.getElementById("myChart3").getContext('2d');

    $(document).on('ready', function(){
        var d = new Date();
        var year = d.getFullYear();
        getChartData(year);
    });

    $('#filterBtn').on('click', function(){
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
                console.log(dataKerapihan);

                charGrafik(ctx, dataLarangan);
                charGrafik(ctx2, dataKerajinan);
                charGrafik(ctx3, dataKerapihan);
            },
            error: function(response){
                console.log(response);
            }
        });
    }

    function charGrafik(ctxAttr, data) {
        var myChart = new Chart(ctxAttr, {
            type: 'bar',
            data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Sep", "Des"],
            datasets: [{
                label: '# of Votes',
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

$(function () {
    $('#container').highcharts({
        title: {
            text: ' ',
            x: -20 //center
        },
        subtitle: {
            text: '',
            x: -20
        },
        xAxis: {
            categories: [

   <?php
                $jumlah_array  = count($label);
        for ($i=0; $i < $jumlah_array ; $i++) { 
            $label_hasil[]="'".$label[$i]->jenisPelanggaran."'";
        }
        $hasil = implode(",",$label_hasil);
        echo $hasil;
        

            ?>

            ]
        },
        yAxis: {
            title: {
                text: 'Jumlah Pelanggar '
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ' Orang'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },

        series: [
        <?php foreach($pelanggaran->result_array() as $row) {?>
        {

            name: "<?php echo " "; ?>",
            data: [
                <?=$hasil_data?>
            ]
        }
        <?php }?>
        ]
    });
});
</script>
    

                            </div>
                            <p><strong>
                            </div> <!-- /.col-md-12 -->
                            
                </div> <!-- /.row -->

                <div class="row">
                    
                    <!-- Show Latest Blog News -->
                    <div class="col-md-6">
                        <div class="widget-main">
                            
                            
                        </div> <!-- /.widget-main -->
                    </div> <!-- /col-md-6 -->
                    
                    <!-- Show Latest Events List -->
                    <div class="col-md-6">
                        <div class="widget-main">
                            
                        </div> <!-- /.widget-main -->
                    </div> <!-- /.col-md-6 -->
                    
                </div> <!-- /.row -->
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="widget-main">
                            
                        </div> <!-- /.widget-main -->
                    </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->

            </div> <!-- /.col-md-8 -->
            

            </div>
        </div>
    </div>

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
    
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

</body>

</html>



