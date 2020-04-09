
    <section class="content-header">
		<h1>
			Fasilitas Form
		</h1>
    </section>

    <!-- Main content -->
    <section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">Fasilitas</h3>
						<?php if($this->session->flashdata('form_false')){?>
						<div class="alert alert-danger text-center">
							<strong><?php echo $this->session->flashdata('form_false');?></strong>
						</div>
					  <?php } ?>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<form class="form-horizontal" method="POST" action="<?php echo site_url('admin/trip/saveFasilitas/').$this->uri->segment(4);?>" enctype="multipart/form-data">
						<div class="box-body">
							<div class="col-md-12">
								  <div class="form-group">
                                        <label class="col-sm-12 pull-left" for="exampleInputEmail1">Input Fasilitas<span style="color:red;font-weight:bold">*</span></label>
                                        <div class="col-sm-12">
                                        	<textarea class="form-control" placeholder="Fasilitas......" name="fasilitas"  value ="" id="editor" required>
                                        		<?php echo !empty($fasilitas['fasilitas'])? $fasilitas['fasilitas'] : ""; ?>
                                        		</textarea>
                                        </div>
                                    </div>
							</div>
						</div>
						<!-- /.box-body -->
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
						<!-- /.box-footer -->
					</form>
				</div>
			</div>
			<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
			<script>
			    CKEDITOR.replace( 'editor' );

			    function cek(){
			    	$(this).val();
			    }
			</script>
			<!-- /.col -->
		</div>
		<!-- row -->
    </section>
    <!-- /.content -->