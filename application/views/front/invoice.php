<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="<?php echo base_url('assets_front/') ?>surat.css" />
    <title>Surat 3</title>
    <style>
        #dat-table {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #dat-table td, #dat-table th {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 10px
        }

        #dat-table tr:nth-child(even){background-color: #f2f2f2;}

        #dat-table tr:hover {background-color: #ddd;}

        #dat-table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background: #ededed;
            color: #000;
            font-size: 10px
        }
</style>

  </head>
   <body>
    
    <div class="book">
        <div class="page">
            <div class="subpage">
                <div class="content">
                    <div style="width:128mm;float:left;">
                        <img src="<?php echo base_url('uploads/logo/'.$profil->logo) ?>" width="50mm"/>
                    </div>
                    <div style="width:128mm;float:right;">
                        <p style="text-align:right;">
                            <span><</span><?php echo $profil->website_email ?> <span>></span>
                            <br>
                            <?php echo  "Alamat : ".$profil->website_address ?>
                            <br>
                            <?php echo "Nomor Telepon : ".$profil->website_phone_number ?>
                        </p>
                    </div>
                    <div style="clear:both;"></div>
                    <hr/>
                        <h3 style="margin:0px;"><b>Invoice #<?php echo $trans->nomor_transaksi ?><?php if(empty($trans->bukti) && $trans->status == 0){echo " [BELUM LUNAS]";}else if(!empty($trans->bukti) && $trans->status == 0){echo " [Pembayaran Sedang Diverifikasi]";}else{echo " [LUNAS]";} ?></b></h3>
                    <hr/>
                    
                    <div style="width:128mm;float:left;">
                        <p style="text-align:left; margin-top:-2px">

                            <strong>Invoiced To</strong>
                        </p>
                        <p style="text-align:left; margin-top:-2px">    
                            <?php echo $dataMember->first_name ?>
                            <br/>    
                            <?php echo $dataMember->address_1 ?>
                            <br/>
                            <?php echo $dataMember->address_2 ?>
                            <br/>
                            <?php echo $dataMember->email ?>
                            <br/>
                        </p>
                    </div>
                    <div style="clear:both;"></div>
                    
                    <table class="tb1" id="dat-table">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $total = 0;
                                foreach ($dataTrans as $key => $value){
                                    $total += $value->jumlah * $value->harga;
                            ?>
                            <tr class="isi-colom">
                                <td><?php echo $value->judul ?></td>
                                <td><?php echo $value->jumlah ?></td>
                                <td><?php echo "Rp. ".number_format($value->harga); ?></td>
                            </tr> 
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="2">Total</th>
                                <th><?php echo "Rp. ".number_format($total); ?></th>
                            </tr>
                        </tfoot>
                        
                    </table>
                </div>
            </div>    
        </div>
    </div>
   
   </body>
</html>
</html>