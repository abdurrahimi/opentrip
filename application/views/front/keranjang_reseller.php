<div class="cart-main-area ptb--100 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <?= $this->session->flashdata('msgbox') ?>
                <form action="<?= base_url('depan/checkout_reseller') ?>" method="post">         
                    <div class="table-content table-responsive">
                        <h1 style="text-align: center;margin-bottom: 50px;">Keranjang Reseller</h1>
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">products</th>
                                    <th class="product-name">name of products</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-price">Price Reseller</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $jumlahTotal = 0;
                                foreach ($list_barang as $key => $value) { 
                                    $jumlahTotal += floatval($value->barang_harga*$value->cart_jumlah);
                                    ?>
                                    <tr>
                                        <td class="product-thumbnail"><a href="#"><img src="<?= base_url() ?><?= (empty($value->barang_foto)?'assets_front/images/product-2/cart-img/1.jpg':$value->barang_foto)?>" alt="product img" style="height: 150px;width: 100px;"/></a></td>
                                        <td class="product-name"><a href="<?= base_url('depan/product_detail/'.$value->barang_id) ?>"><?= $value->barang_name ?></a>
                                        </td>
                                        <td class="product-price"><span class="amount">Rp.<?= number_format($value->barang_harga,0) ?></span></td>
                                        <td class="product-price">
                                            <input type="number" name="cart[<?= $key ?>][cart_harga]" 
                                            style="width:100px;background-color: white;border: 1px solid #e5e5e5" 
                                            value="<?= $value->barang_harga ?>" />
                                        </td>
                                        <td class="product-quantity">
                                            <input type="hidden" name="cart[<?= $key ?>][cart_id]" value="<?= $value->cart_id ?>">
                                            <input type="hidden" name="cart[<?= $key ?>][id_barang]" value="<?= $value->id_barang ?>">
                                            <input type="hidden" name="cart[<?= $key ?>][cart_size]" value="<?= $value->cart_size ?>">
                                            <input type="number" readonly name="cart[<?= $key ?>][cart_jumlah]" 
                                            style="width:100px;background-color: white;border: 1px solid #e5e5e5" 
                                            value="<?= $value->cart_jumlah ?>" /></td>
                                            <td class="product-subtotal">Rp.<?= number_format($value->barang_harga*$value->cart_jumlah,0) ?></td>
                                            <td class="product-remove"><a href="<?= base_url('depan/removeCart/'.$value->cart_id) ?>" onclick="return confirm('Are you sure you ?');"><i class="icon-trash icons"></i></a></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="transaksi_reseller_name" aria-describedby="emailHelp" placeholder="Enter Name" required="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">No Telp</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="transaksi_reseller_notelp" aria-describedby="emailHelp" placeholder="Enter No Telp" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Address</label>
                                    <textarea class="form-control" name="transaksi_reseller_alamat" rows="5" placeholder="address" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="buttons-cart--inner">
                                    <div class="buttons-cart">
                                        <a href="<?= base_url('depan/product') ?>">Kembali ke Produk</a>
                                    </div>
                                    <?php if (count($list_barang)>0) { ?>
                                        <div class="buttons-cart checkout--btn">
                                            <button type="submit" name="checkout" style="background: #ebebeb none repeat scroll 0 0;color: #3f3f3f;font-family: 'Poppins', sans-serif;font-size: 12px;font-weight: 500;height: 62px;line-height: 62px;padding: 0 45px;text-transform: uppercase;display: inline-block;border-style: none;">checkout sebagai reseller</button>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6 col-sm-12 col-xs-12 smt-40 xmt-40">
                                <div class="htc__cart__total">
                                    <h6>cart total</h6>
                                    <div class="cart__total">
                                        <span>order total</span>
                                        <span>Rp.<?= number_format($jumlahTotal,0) ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>