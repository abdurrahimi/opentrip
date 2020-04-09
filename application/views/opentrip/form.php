
    <section class="content-header">
		<h1>
			Open Trip Form
			<small>List Open Trip</small>
		</h1>
    </section>

    <!-- Main content -->
    <section class="content">
		<div class="row">
			<div class="col-xs-12">
				<ul class="nav nav-tabs">
					<li role="presentation" class="active"><a href="<?php echo site_url('opentrip/create');?>">Input Open Trip</a></li>
					<li role="presentation"><a href="<?php echo site_url('opentrip');?>">List Open Trip</a></li>
				</ul>
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">Open Trip</h3>
						<?php if($this->session->flashdata('form_false')){?>
						<div class="alert alert-danger text-center">
							<strong><?php echo $this->session->flashdata('form_false');?></strong>
						</div>
					  <?php } ?>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<?php if(!empty($opentrip)){?>
					<form class="form-horizontal" method="POST" action="<?php echo site_url('opentrip/save').'/'.$opentrip['id'];?>" enctype="multipart/form-data">
					<?php }else{?>
					<form class="form-horizontal" method="POST" action="<?php echo site_url('opentrip/save');?>" enctype="multipart/form-data">
					<?php } ?>
						<div class="box-body">
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-sm-4 control-label" for="name">Judul</label>
									<div class="col-sm-8">
										<input type="text" value="<?php echo !empty($opentrip) ? $opentrip['username'] : '';?>" name="judul" placeholder="Nama Open Trip" id="name" class="form-control" required/>
									</div>
								</div>
								
								
								<div class="form-group">
									<label class="col-sm-4 control-label" for="name">Harga</label>
									<div class="col-sm-8">
										<input type="number" value="<?php echo !empty($opentrip) ? $opentrip['email'] : '';?>" name="harga" placeholder="harga dalam angka" id="name" class="form-control" required/>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label" for="name">Tanggal Pergi</label>
									<div class="col-sm-8">
										<input type="date" value="<?php echo !empty($opentrip) ? $opentrip['email'] : '';?>" name="pergi" id="name" class="form-control" required/>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label" for="name">Tanggal Pulang</label>
									<div class="col-sm-8">
										<input type="date" value="<?php echo !empty($opentrip) ? $opentrip['email'] : '';?>" name="pulang" id="name" class="form-control" required/>
									</div>
								</div>
								
								
							</div>
							
						</div>
						<!-- /.box-body -->
						<div class="box-footer">
							<div class="col-md-3 col-md-offset-2">
								<a class="btn btn-default" href="<?php echo site_url('opentrip');?>">Cancel</a>
								<button class="btn btn-info pull-right" type="submit">Save</button>
							</div>
						</div>
						<!-- /.box-footer -->
					</form>
				</div>
			</div>
			<!-- /.col -->
		</div>
		<!-- row -->
    </section>
    <!-- /.content -->