
    <!-- Content Wrapper. Contains page content -->
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Open Trip Index
                <small>List Open Trip</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <ul class="nav nav-tabs">
                        <li role="presentation"><a href="<?php echo site_url('opentrip/create');?>">Input Open Trip</a></li>
                        <li role="presentation" class="active"><a href="<?php echo site_url('opentrip');?>">List Open Trip</a></li>
                    </ul>
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Data Table Input Open Trip</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Nama Opentrip</th>
                                    <th>Harga</th>
                                    <th>Pergi </th>
                                    <th>Pulang</th>
                                    <th>Detail</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
								
                                <tbody>
                                <?php if(isset($opentrip) && is_array($opentrip)){ ?>
                                    <?php $no=0; foreach($opentrip as $value){ $no++;?>
                                        <tr>
                                            <td><?= $no?></td>
                                            <td><?= $value->judul;?></td>
                                            <td><?= $value->harga;?></td>
                                            <td><?= $value->pergi;?></td>
                                            <td><?= $value->pulang;?></td>
                                            <td><?= $value->detail;?></td>
                                            <td>
                                                <a href="<?php echo site_url('opentrip/edit').'/'.$value->opentrip_id;?>" class="btn btn-xs btn-primary">Edit</a>
                                                <a onclick="return confirm('Are you sure you want to delete this product?');" href="<?php echo site_url('opentrip/delete').'/'.$value->opentrip_id;?>" class="btn btn-xs btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- row -->
        </section>
        <!-- /.content -->