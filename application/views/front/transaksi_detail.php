<div class="cart-main-area ptb--100 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <?= $this->session->flashdata('msgbox') ?>      
                    <div class="table-content table-responsive">
                        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Pesanan</th>
                                        <th>Total</th>
                                        <th width="15%">Status</th>
                                    </tr>
                                </thead> 
                                <tbody>
                                    <?php if(empty($listData)){
                                            echo "<td colspan='5'>Belum Ada Transaksi</td>";
                                    } ?>
                                 <?php
                                 $no=1;
                                 foreach($listData as $value){

                                    //$no++;
                                    ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $value['tangal']; ?></td>
                                        <td align="left">
                                            <?php foreach ($listDetail[$value['transaksi_id']] as $detail){

                                                  $jumlah[$detail['detail_id']] = $detail['harga']*$detail['jumlah'];

                                            ?>
                                            <h3> <?= "<b>".$detail['judul']."</b>" ?> </h3>
                                            <p> <?= "Harga  : Rp.". number_format($detail['harga'],0); ?> </p>
                                            <p> <?= "Jadwal : ". $detail['jadwal']; ?> </p>
                                            <p> <?= "Jumlah : ".$detail['jumlah']; ?> PAX </p>
                                            <p> <?= "Total  : Rp.". number_format($jumlah[$detail['detail_id']]); ?> </p>
                                            <br> <br>
                                        <?php } ?>
                                        </td>
                                        <td><?php
                                            echo "Rp.". number_format($value['total']);
                                            /*$total = 0;
                                            foreach ($jumlah as $jml) {
                                                $total = $total + $jml;
                                            }
                                            echo "Rp.". number_format($total,0); 
                                            unset($jumlah);*/
                                         ?>
                                             
                                         </td>
                                        <td>
                                           <a href="<?php echo base_url('front/invoice/'.$value['transaksi_id']); ?>" class="btn btn-warning" class="btn btn-primary-dark">Download Invoice</a>
                                           <br>
                                            <?php
                                                if($value['status'] == 0 ){ ?>
                                                    <?php if($value['bukti']=="" || $value['bukti']==NULL){ ?>
                                                    <br> <a class="btn btn-primary" data-toggle="modal" data-target="#modal<?= $no ?>" class="btn btn-primary-dark">Upload Bukti Pembayaran</a>
                                                <?php }else{  echo "Sukses Upload Bukti"; } }else{
                                                echo "Pembayaran Diterima";
                                               }  ?>
                                        </td>                                    
                                        
                                    </tr>
                                    <div id="modal<?= $no?>" class="modal fade" role="dialog">
                                      <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Upload Bukti Pembayaran</h4>
                                          </div>
                                          <div class="modal-body">

                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <!-- PAGE CONTENT BEGINS -->
                                                    <form class="form-horizontal" enctype="multipart/form-data" method="post" action="<?php echo base_url().'front/uploadbukti'?>" role="form"> 
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Foto<span style="color:red;font-weight:bold">*</span></label> 
                                                            <div class="col-sm-9">
                                                                <input type='file' name="foto" id="img" required/>
                                                                <input type='hidden' name="id_opentrip" value="<?= $value['transaksi_id'] ?>"/>
                                                                <img id="preview" width="400" height="250" src="#" alt=" " />
                                                            </div>
                                                        </div>
                                                    
                                                </div>
                                            </div>
                                                </div>
                                          <div class="modal-footer">
                                            <input type="submit" value="Simpan" class="btn btn-primary">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                          </div>
                                        </div>
                                        </form>

                                      </div>
                                  </div>
                                    
                                    <?php
                                    $no++;
                                }
                                ?>   
                            </tbody>
                        </table> 
                    </div>
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
            </div>
        </div>
    </div>
</div>