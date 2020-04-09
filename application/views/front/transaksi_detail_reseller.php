<div class="cart-main-area ptb--100 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <?= $this->session->flashdata('msgbox') ?>
                <form action="<?= base_url('depan/uploadTransaksi/'.$list_detail->transaksi_id) ?>" method="post" enctype="multipart/form-data">         
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">products</th>
                                    <th class="product-name">name of products</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-price">Price Reseller</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-quantity">Size</th>
                                    <th class="product-subtotal">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $jumlahTotal = 0;
                                foreach ($list_barang as $key => $value) { 
                                    $jumlahTotal += floatval($value->transaksi_detail_harga*$value->transaksi_detail_jumlah);
                                ?>
                                <tr>
                                    <td class="product-thumbnail"><a href="#"><img src="<?= base_url() ?><?= (empty($value->barang_foto)?'assets_front/images/product-2/cart-img/1.jpg':$value->barang_foto)?>" alt="product img" style="height: 150px;width: 100px;"/></a></td>
                                    <td class="product-name"><a href="<?= base_url('depan/product_detail/'.$value->barang_id) ?>"><?= $value->barang_name ?></a>
                                    </td>
                                    <td class="product-price"><span class="amount">Rp.<?= number_format($value->transaksi_detail_harga,0) ?></span></td>
                                    <td class="product-price"><span class="amount">Rp.<?= number_format($value->transaksi_detail_harga_reseller,0) ?></span></td>
                                    <td class="product-price">
                                        <span class="amount">
                                        <?= $value->transaksi_detail_jumlah ?>
                                        </span>
                                    </td>
                                    <td class="product-price">
                                        <span class="amount">
                                        <?= $value->transaksi_detail_size ?>
                                        </span>
                                    </td>
                                    <td class="product-subtotal">Rp.<?= number_format($value->transaksi_detail_harga*$value->transaksi_detail_jumlah,0) ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="transaksi_reseller_name" aria-describedby="emailHelp" placeholder="Enter Name" readonly="" value="<?= $list_detail->transaksi_reseller_name ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">No Telp</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="transaksi_reseller_notelp" aria-describedby="emailHelp" placeholder="Enter No Telp" readonly value="<?= $list_detail->transaksi_reseller_notelp ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <textarea class="form-control" name="transaksi_reseller_alamat" rows="5" placeholder="address" readonly><?= $list_detail->transaksi_reseller_alamat ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="buttons-cart--inner">
                                <div class="buttons-cart">
                                    <a href="<?= base_url('depan/history') ?>">Kembali ke Transaksi</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                    $status = ['0'=>'Baru','1'=>'check pembayaran','2'=>'kirim','3'=>'selesai'];
                    ?>
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <?php if ($list_detail->transaksi_status == '0') { ?>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Harap Upload Bukti transfer kirim ke rek 12345678(xxx) bank abc</label>
                                <input type="file" name="photo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <?php }else if ($list_detail->transaksi_status == '2') { ?>
                            <p>Harap pencet selesai jika pemesanan sudah tiba atau inginkan komplain</p>
                            <a href="<?= base_url('depan/selesaiTransaksi/'.$list_detail->transaksi_id) ?>" class="btn btn-primary" style="margin-bottom: 10px;">Selesai</a>
                            <?php } ?>
                            <?php if ($list_detail->transaksi_status != '0') { ?>
                                <div>
                                    <img src="<?= base_url($list_detail->transaksi_image) ?>" style="width: 100px;height: 100px;"><br>
                                    <a href="<?= base_url($list_detail->transaksi_image) ?>" download="">Download here</a>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 smt-40 xmt-40">
                            <div class="htc__cart__total">
                                <h6>Detail</h6>
                                <div class="cart__total">
                                    <span>order total</span>
                                    <span>Rp.<?= number_format($jumlahTotal,0) ?></span>
                                </div>
                                <div class="cart__total">
                                    <span>Transaksi No</span>
                                    <span><?= $list_detail->transaksi_no ?></span>
                                </div>
                                <div class="cart__total">
                                    <span>Transaksi Status</span>
                                    <span><?= $status[$list_detail->transaksi_status] ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</div>