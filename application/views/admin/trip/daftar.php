<div class="main-content">
    <div class="main-content-inner">
        <!-- #section:basics/content.breadcrumbs -->
        <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
                try {
                    ace.settings.check('breadcrumbs', 'fixed')
                } catch (e) {
                }
            </script>

            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="<?php echo base_url('admin/dashboard') ?>">Beranda</a>
                </li>

                
                <li class="active">Data Trip</li>
            </ul><!-- /.breadcrumb -->

            <!-- /section:basics/content.searchbox -->
        </div>

        <!-- /section:basics/content.breadcrumbs -->
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Data Trip
                
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">


                    <!--
                    <h4 class="pink">
                        <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer blue"></i>
                        <a href="#modal-table" role="button" class="green" data-toggle="modal"> Table Inside a Modal Box </a>
                    </h4>
                -->

                <div class="row">
                    <div class="col-xs-12">

                        <div class="clearfix">

                            <?php echo $this->session->flashdata('msgbox') ?>
                        </div>
                        <div class="table-header">
                            Menampilkan Seluruh Data Trip
                        </div>
                        <!-- div.table-responsive -->
                        <div class="modal-footer no-margin-top"> 
                            <a href="<?php echo base_url('admin/trip/add') ?>">
                                <button type="button" class="btn btn-sm btn-success pull-left" data-dismiss="modal">
                                    <i class="ace-icon fa fa-plus"></i>
                                    Tambah Data
                                </button>
                            </a>    

                        </div>
                        <!-- div.dataTables_borderWrap -->
                        <div>
                            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Harga</th>
                                        <th>Kuota</th>
                                        <th colspan="2">Aksi</th>
                                    </tr>
                                </thead> 
                                <tbody>
                                 <?php
                                 $no = 0 ;
                                 foreach($listData as $value){
                                    $no++;
                                    ?>
                                    <tr>
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $value->judul ?></td>
                                        <td><?php echo "Rp. ".number_format($value->harga); ?></td>
                                        <td><?php echo $value->kuota ?></td>
                                        <td>
                                            <a href="<?= base_url('admin/trip/edit/'.$value->opentrip_id) ?>"><button class="btn btn-primary btn-sm btnEmptySaldo"   style="margin-left:2px"><i class="fa fa-pencil-square" style="font-size: 14px;"></i>&nbsp;&nbsp;<span>Lihat/Edit</span></button></a>
                                            <a href="<?= base_url('admin/trip/doDelete/'.$value->opentrip_id) ?>"><button class="btn btn-danger btn-sm"   style="margin-left:2px" onclick="return confirm('Anda yakin ingin menghapus data ini ? ')"><i class="fa fa-trash" style="font-size: 14px;"></i>&nbsp;&nbsp;<span>Hapus</span></button></a>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('admin/trip/foto/'.$value->opentrip_id) ?>"><button class="btn btn-warning btn-sm btnEmptySaldo"   style="margin-left:2px"><i class="fa fa-picture-o" style="font-size: 14px;"></i>&nbsp;&nbsp;<span>Set Foto</span></button></a>
                                            <a href="<?= base_url('admin/trip/jadwal/'.$value->opentrip_id) ?>"><button class="btn btn-primary btn-sm btnEmptySaldo"   style="margin-left:2px"><i class="fa fa-calendar" style="font-size: 14px;"></i>&nbsp;&nbsp;<span>Set Jadwal</span></button></a>
                                            <a href="<?= base_url('admin/trip/itenarary/'.$value->opentrip_id) ?>"><button class="btn btn-primary btn-sm btnEmptySaldo"   style="margin-left:2px"><i class="fa fa-tasks" style="font-size: 14px;"></i>&nbsp;&nbsp;<span>Set Itinerary</span></button></a>
                                            <a href="<?= base_url('admin/trip/fasilitas/'.$value->opentrip_id) ?>"><button class="btn btn-primary btn-sm btnEmptySaldo"   style="margin-left:2px"><i class="fa fa-building-o" style="font-size: 14px;"></i>&nbsp;&nbsp;<span>Set Fasilitas</span></button></a>
                                        </td>
                                    </tr>
                                    <?php 
                                }
                                ?>   
                            </tbody>
                        </table> 
                    </div>

                </div><!-- /.modal-dialog -->
            </div><!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->
