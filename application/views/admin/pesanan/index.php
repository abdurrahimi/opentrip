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

                
                <li class="active">Data Pesanan</li>
            </ul><!-- /.breadcrumb -->

            <!-- /section:basics/content.searchbox -->
        </div>

        <!-- /section:basics/content.breadcrumbs -->
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Data Pesanan
                
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
                            Menampilkan Seluruh Data Pesanan
                        </div>

                        <div>
                            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Nama User</th>
                                        <th>Pesanan</th>
                                        <th>Total</th>
                                        <th width="25%">Status</th>
                                    </tr>
                                </thead> 
                                <tbody>
                                 <?php
                                 $no = 0 ;

                                 foreach($listData as $value){
                                    $no++;
                                    $arr=array('<b class="btn btn-primary btn-sm">Menunggu Pembayaran</b>','<b class="btn btn-success btn-sm">Pembayaran Sukses</b>');
                                    ?>

                                    <form method="post" action="<?=site_url('admin/pesanan/bayar')?>">
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $value['tangal'] ?></td>
                                        <td><?= $value['first_name'] ?> </td>
                                        <td>
                                            <?php foreach ($listDetail[$value['transaksi_id']] as $detail){ 
                                                  $jumlah[$detail['detail_id']] = $detail['harga']*$detail['jumlah'];
                                            ?>

                                            <h3> <?= $detail['judul'] ?> </h3>
                                            <p> <?= "Harga  : Rp.". number_format($detail['harga'],0) ?> </p>
                                            <p> <?= "Jadwal : ". $detail['jadwal'] ?> </p>
                                            <p> <?= "Jumlah : ".$detail['jumlah'] ?> PAX </p>
                                            <p> <?= "Total  : Rp.". number_format($jumlah[$detail['detail_id']]) ?> </p>
                                        <?php } ?>
                                        </td>
                                        <td><?php
                                            $total = 0;
                                            foreach ($jumlah as $jml) {
                                                $total = $total + $jml;
                                            }
                                            echo "Rp.". number_format($total,0); 
                                             unset($jumlah);
                                         ?></td>
                                        <td>
                                            
                                            <?php if($value['status']==1){echo $arr[$value['status']];} ?>

                                            <?php if($value['bukti']=="" || $value['bukti'] == NULL){ ?>
                                                <?= $arr[$value['status']] ?>
                                            <?php }else{ ?>
                                                 <a data-toggle="modal" data-target="#modal<?= $no ?>" class="btn btn-primary-dark btn-sm btnEmptySaldo">Bukti Pembayaran</a>
                    
                                            <?php } ?>
                                               <?php
                                                if($value['status'] == 0){ ?>
                                                        
                                                        <input type="hidden" name="id" value="<?=$value['transaksi_id']?>">
                                                        <input type="submit" class="btn btn-danger btn-sm btnEmptySaldo" value="Set Terbayar">
                                                    
                                               <?php }
                                            ?>
                                        </td>                                    
                                        
                                    </tr>
                                    <div id="modal<?= $no ?>" class="modal fade" role="dialog">
                                      <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Bukti Pembayaran</h4>
                                          </div>
                                          <div class="modal-body">
                                            <img class="img-thumbnail rounded float-left" src="<?= site_url()."uploads/bukti/".$value['bukti'] ?>">
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                          </div>
                                        </div>

                                      </div>
                                  </div>
                                    </form>  
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
