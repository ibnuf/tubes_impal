        <!--  page-wrapper -->
        <div id="page-wrapper">

            
            <div class="row">
                 <!--  page header -->
                <div class="col-lg-12">
                    <h4 class="page-header">Tabel Data Orang Tua Siswa</h4>
                </div>
                 <!-- end  page header -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">      
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <button type="button" class="btn btn-primary" style="margin-bottom: 20px;">
                                    <a style="color:white;" href="<?php echo site_url()?>/bk/form_input_OrangTua">
                                    <i class="fa fa-plus fa-fw"></i>Tambah Data Orang Tua</a>
                                </button>
                                    <thead>
                                        <tr style="font-family: Cambria,"Times New Roman",serif;>
                                            <th>No</th>
                                            <th>Nama Orang Tua</th>
                                            <th>Nama Anak</th>
                                            <th>Alamat</th>
                                            <th>Kota</th>
                                            <th>Provinsi</th>  
                                            <th>No TLP</th>
                                            <th>No HP</th>
                                            <th><em class="fa fa-cog"></em></th>
                                        </tr>
                                    </thead>
                                    <tbody>    
                                        
                                        <?php
                                        $nomer=1;   
                                        foreach($list_data->result()as $row) { ?>
                                        <tr class="odd gradeX" style="font-family: Cambria,"Times New Roman",serif;>
                                          <td><?php echo $nomer;?></td>
                                            <td><?php echo $row->namaOrangTua;?></td>
                                            <td><?php echo $row->namaSiswa;?></td>
                                            <td><?php echo $row->alamatOrangTua;?></td>
                                            <td><?php echo $row->kotaOrangTua;?></td>
                                            <td><?php echo $row->provinsiOrangTua;?></td>
                                            <td><?php echo $row->noTlpOrangTua;?></td>
                                            <td><?php echo $row->noHpOrangTua;?></td>
                                            <td align="center">
                                                <?php echo anchor('/bk/hapus_orangtua/'.$row->idOrangTua,
                                                '<em class="fa fa-eraser" title="Hapus Data"></em>'); ?> 

                                                 <?php echo anchor('/bk/updateOrangTua/'.$row->idOrangTua,
                                                '<em class="fa fa-pencil" title="Edit Data"></em>'); ?>                                           
                                                <p>                  
                                                
                                            </td>
                                        </tr>
                                <?php $nomer++;} ?>
                                   <tbody> 
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
            
                    </div>
                    <!--  end  Context Classes  -->
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
    <!-- Page-Level Plugin Scripts-->
    <script src="<?php echo base_url()?>assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url()?>assets/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>

</body>

</html>
