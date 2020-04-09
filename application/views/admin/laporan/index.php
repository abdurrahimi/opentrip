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

                
                
                
                <li class="active">Cetak Data Open Trip</li>
            </ul><!-- /.breadcrumb -->

            <!-- #section:basics/content.searchbox -->
            

            <!-- /section:basics/content.searchbox -->
        </div>

        <!-- /section:basics/content.breadcrumbs -->
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Form Cetak Laporan
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                    </small>
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/laporan/cetak'?>" role="form"> 
                       <?php 
                       $dataOld = $this->session->flashdata('oldPost'); 
                       echo $this->session->flashdata('msgbox');?>
                        <!-- #section:elements.form -->
                        <div class="form-group">        
                          <div class="col-sm-2" style="border-bottom: 2px solid #6EBACC;">
                           Cari Data :
                          </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Tujuan <span style="color:red;font-weight:bold">*</span></label>
                            <div class="col-sm-4">
                                <select id="tujuan" name="tujuan" class="form-control" required>
                                    <option value="" selected disabled>Pilih Tujuan</option>
                                    <?php foreach ($listData as $key => $value) { ?>
                                    <option value="<?= $value->opentrip_id ?>"><?= $value->judul ?></option>
                                   <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Jadwal <span style="color:red;font-weight:bold">*</span></label>
                            <div class="col-sm-4">
                                <select id="jadwal" name="jadwal" class="form-control" required>
                                    <option value="" selected disabled>Jadwal</option>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Status Pembayaran <span style="color:red;font-weight:bold">*</span></label>
                            <div class="col-sm-4">
                                <select name="status" class="form-control" required>
                                    <option selected disabled>Status Pembayaran</option>
                                    <option value="">Semua</option>
                                    <option value="1">Sudah Bayar</option>
                                    <option value="0">Belum Bayar</option>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                                <button class="btn btn-info" type="submit">
                                    <i class="ace-icon fa fa-print bigger-110"></i>
                                    Cetak
                                </button>

                                &nbsp; &nbsp; &nbsp;
                                <button class="btn" type="reset">
                                    <i class="ace-icon fa fa-undo bigger-110"></i>
                                    Reset
                                </button>
                            </div>
                        </div>

                        <div class="hr hr-24"></div>

                    </form>


                </div><!-- /.col -->
                <script type="text/javascript">
                    $('#tujuan').change(function(){
                        $.ajax({
                            type: 'POST',
                            url: "<?= site_url('admin/laporan/getJadwal') ?>",
                            data: {tujuan:$('#tujuan').val()},
                            dataType: "text",

                              success: function(resultData) {
                                    var obj = JSON.parse(resultData);        
                                    $('#jadwal').html(obj.jadwal);
                              }
                        });

        
    });
                </script>
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->