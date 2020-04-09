<div class="cart-main-area ptb--100 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <?= $this->session->flashdata('msgbox') ?>
                <div class="table-content table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th class="product-thumbnail">No</th>
                                <th class="product-name">Transaksi No</th>
                                <th class="product-price">Transaksi Tanggal</th>
                                <th class="product-quantity">Transaksi Status</th>
                                <th class="product-remove">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            $status = ['0'=>'Baru','1'=>'check pembayaran','2'=>'kirim','3'=>'selesai'];
                            foreach ($list_transaksi as $key => $value) { 
                            ?>
                            <tr>
                                <td class="product-name">
                                    <?= $no++; ?>
                                </td>
                                <td class="product-name">
                                    <?= $value->transaksi_no; ?>
                                </td>
                                <td class="product-name">
                                    <?= $value->transaksi_tanggal; ?>
                                </td>
                                <td class="product-name">
                                    <?= $status[$value->transaksi_status]; ?> (Sebagai : <?= ($value->transaksi_type == '0'?'pembeli':'reseller' )?>)
                                </td>
                                <td class="product-name"><a href="<?= base_url('depan/transaksi_detail/'.$value->transaksi_id) ?>" class="btn btn-primary">Detail</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>