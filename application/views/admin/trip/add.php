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
                    <form class="form-horizontal" enctype="multipart/form-data" method="post" action="<?php echo base_url().'admin/trip/doAdd'?>" role="form"> 
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
                                <input type="text" id="form-field-1" name="judul" value="" placeholder="Isi Judul Open Trip" class="col-xs-10 col-sm-5" required/>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Harga <span style="color:red;font-weight:bold">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" id="form-field-1" name="harga" value="" placeholder="Isi Harga" class="col-xs-10 col-sm-5" required/>
                            </div>
                        </div>
                        <script>
                            function myFunction() {
                                  var status = document.getElementById("status").value;
                                  var kuota = document.getElementById("kuota");

                                  if (status === "0") {
                                    kuota.style.display = "none";
                                  } else {
                                    kuota.style.display = "block";
                                  }
                            }
                        </script>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Apakah Kuota Terbatas? <span style="color:red;font-weight:bold">*</span></label>
                            <div class="col-sm-9">
                                <select id="status" name="status" value="" placeholder="Isi Kuota Peserta" class="col-xs-10 col-sm-5" onchange="myFunction()" required>
                                    <option value="1">Tidak</option>
                                    <option value="0">Ya</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Catatan <span style="color:red;font-weight:bold">*</span></label>
                            <div class="col-sm-6">
                                <textarea name="catatan" value="" placeholder="Isi Catatan" id="editor" class="col-xs-6 col-sm-5" required></textarea>
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
                    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
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
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->