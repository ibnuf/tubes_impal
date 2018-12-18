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
                        <i class="fa fa-folder-open"></i><b>&nbsp;Halo ! </b>   Selamat Datang Kembali 
                        <b><?php echo $nama?>,</b>
            <i class="fa  fa-people"></i>&nbsp;Sudah </b>Input Pelanggaran Apa Hari Ini?
                    </div>
                </div>
                <!--end  Welcome -->
            </div>


            <div class="row">
                <!--quick info section -->
           <h3 style="margin:15px;">Sambutan Kepala Sekolah</h3>
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
                </div>
                <div class="row" style="background-color:white">
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
    <!-- <script src="<?php echo base_url()?>assets/plugins/pace/pace.js"></script> -->
    <script src="<?php echo base_url()?>assets/scripts/siminta.js"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="<?php echo base_url()?>assets/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="<?php echo base_url()?>assets/plugins/morris/morris.js"></script>
    <script src="<?php echo base_url()?>assets/scripts/dashboard-demo.js"></script>

</body>

</html>
