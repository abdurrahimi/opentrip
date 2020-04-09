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
                    <a href="<?php echo base_url('admin/dashboard'); ?>">Beranda</a>
                </li>

                <li>
                    <a href="<?php echo base_url('admin/trip') ?>">Trip</a>
                </li>
                
                
                <li class="active">Jadwal Trip</li>
            </ul><!-- /.breadcrumb -->

            <!-- #section:basics/content.searchbox -->
            

            <!-- /section:basics/content.searchbox -->
        </div>

        <!-- /section:basics/content.breadcrumbs -->
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Form Jadwal Trip
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                    </small>
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                   <?php if(isset($jadwal)){  ?>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/trip/editJadwal/'.$this->uri->segment(4);?>" role="form">
                    <?php }else{ ?> 
                        <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/trip/saveJadwal/'.$this->uri->segment(4);?>" role="form"> 
                     <?php }   ?>
                       <?php 
                       $dataOld = $this->session->flashdata('oldPost'); 
                       echo $this->session->flashdata('msgbox');?>
                        <!-- #section:elements.form -->
						<div class="form-group">        
                          <div class="col-sm-2" style="border-bottom: 2px solid #6EBACC;">
                            Harap isi isian di bawah ini:
                          </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Judul Trip <span style="color:red;font-weight:bold">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" id="form-field-1" value="<?= $judul->judul ?>" placeholder="Isi Judul Open Trip" class="col-xs-10 col-sm-5" disabled/>
                            </div>
                        </div>

                        <?php
                            if(isset($jadwal)){ 
                            foreach ($jadwal as $key => $value) { ?>


                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Tanggal Keberangkatan<span style="color:red;font-weight:bold">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="jadwal_id[]" value="<?= $value['jadwal_id'] ?>" class="col-xs-10 col-sm-5" hidden/>
                                <input type="date" id="form-field-1" name="tanggal[]" value="<?= $value['jadwal'] ?>" class="col-xs-10 col-sm-5" required />
                            </div>
                        </div>
                        

                        <?php }}else{ ?>


                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Tanggal Keberangkatan<span style="color:red;font-weight:bold">*</span></label>
                            <div class="col-sm-9">
                                <input type="date" id="form-field-1" name="tanggal[]" value="" placeholder="Isi Judul Open Trip" class="col-xs-10 col-sm-5" required />
                            </div>
                        </div>


                       <?php } ?>


                        <div id="addmore"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"></label>
                            <div class="col-md-offset-3 col-sm-9">
                                <a onclick="tambah()" class="btn btn-info">Tambah Jadwal</a>
                                <a onclick="kurang()" class="btn btn-reset">Kurangi Jadwal</a><br/><br/>
                            </div>
                        </div>
                        
                        
                        <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                                <button class="btn btn-info" type="submit">
                                    <i class="ace-icon fa fa-check bigger-110"></i>
                                    Simpan
                                </button>

                                &nbsp; &nbsp; &nbsp;
                                <button class="btn btn-cancel" href="<?php echo site_url('admin/trip/')?>">
                                    <i class="ace-icon fa fa-close bigger-110"></i>
                                    Cancel
                                </button>
                            </div>
                        </div>

                        <div class="hr hr-24"></div>

                    </form>
                    <script type="text/javascript">
                        function tambah(){
                            $("#addmore").append('<div id="new" class="form-group">'+
                            '<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Tanggal Keberangkatan<span style="color:red;font-weight:bold">*</span></label>'+
                            '<div class="col-sm-9">'+
                                '<input type="date" id="form-field-1" name="tanggal[]" value="" placeholder="Isi Judul Open Trip" class="col-xs-10 col-sm-5" required />'+
                            '</div>'+
                        '</div>').children(':last');
                        }
                        function kurang(){
                            $("#new").remove().children(':last');
                        }

                    </script>


                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->