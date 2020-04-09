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
                
                
                <li class="active">Tambah Trip</li>
            </ul><!-- /.breadcrumb -->

            <!-- #section:basics/content.searchbox -->
            

            <!-- /section:basics/content.searchbox -->
        </div>

        <!-- /section:basics/content.breadcrumbs -->
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Form Tambah Trip
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                    </small>
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <form class="form-horizontal" enctype="multipart/form-data" method="post" action="<?php echo base_url().'admin/trip/doAddFoto/'.$id_opentrip?>" role="form"> 
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
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Foto<span style="color:red;font-weight:bold">*</span></label> 
                            <div class="col-sm-9">
                                <input type='file' name="foto" id="img" required/>
                                <img id="preview" width="400" height="250" src="#" alt=" " />
                            </div>
                        </div>
                        
                        <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                                <button class="btn btn-info" type="submit">
                                    <i class="ace-icon fa fa-check bigger-110"></i>
                                    Simpan
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
            </div><!-- /.row -->

            <div class="row">
                <div class="col-xs-12">
                    <div class="clearfix">
                        <?php echo $this->session->flashdata('msgbox') ?>
                    </div>
                    <div class="table-header">
                        Menampilkan Seluruh Foto Trip
                    </div>
                    <div class="agile3-grids">
                        <div class="gallery-grids">
                            <?php 
                            $getFoto = $this->db->query("select * from tbl_trip_foto where id_opentrip = '".$id_opentrip."'")->result();
                            foreach ($getFoto as $key => $value){
                            ?>
                                
                            
                            <div class="col-md-3 gallery-grids-left">
                                <div class="gallery-grids-right1">
                                    <div class="gallery-grid" style="padding-bottom: 5px;">
                                        <a class="example-image-link" href="<?php echo base_url('uploads/'.$value->foto)?>" data-lightbox="example-set" data-title="">
                                            <img src="<?php echo base_url('uploads/'.$value->foto)?>" alt="" width="300" height="200">
                                        </a>
                                    </div>
                                    <a href="<?php echo base_url('admin/trip/doDeleteImage/'.$id_opentrip.'/'.$value->trip_foto_id); ?>" class="btn btn-danger btn-sm tbl-btn" title="Delete">
                                        <i class="fa fa-trash-alt"></i> Delete
                                    </a>
                                    
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <?php } ?>
                            
                            <div class="clearfix"> </div>
                            
                        </div>
                    </div>
                </div><!-- /.modal-dialog -->
            </div>
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->
<script>
    CKEDITOR.replace( 'editor' );

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$("#img").change(function() {
    readURL(this);
});
</script>