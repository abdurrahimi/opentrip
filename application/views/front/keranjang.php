<!-- cart-main-area start -->
        <div class="checkout-wrap ptb--100">
            <div class="container">
                <div class="row">
                    <form action="<?= base_url('front/checkout') ?>" method="post">
                        <div class="col-md-8">
                            <div class="checkout__inner">
                                <div class="accordion-list">
                                    <div class="accordion">
                                        <div class="accordion__title">
                                            Billing Information
                                        </div>
                                        <div class="accordion__body">
                                            <div class="bilinfo">
                                                <div class="row">
                                                    <div class="col-md-12" style="padding-bottom: 50px;">
                                                        <div class="single-input mt-0">
                                                            <?php foreach ($listBank as $key => $value) { ?>
                                                            <input type="radio" name="id_bank" class="id_bank" id="id_bank<?php echo $value['bank_id']?>" value="<?php echo $value['bank_id']?>" required="" onchange="retrieve(<?php echo $value['bank_id']?>)"> &nbsp;
                                                            <img src="<?php echo base_url('uploads/bank/'.$value['img']); ?>" width="80">
                                                            <br>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <input type="text" placeholder="Nama Bank" id="nama_bank" readonly="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="single-input">
                                                            <input type="text" placeholder="Nomor Rekening" id="norek" readonly="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="single-input">
                                                            <input type="text" placeholder="Atas Nama" id="an" readonly="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="order-details">
                                <h5 class="order-details__title">Your Order</h5>
                                    <div class="order-details__item">
                                        <?php 
                                        $total =0;
                                            foreach ($listData as $key => $value) {
                                                $total+= $value['jumlah']*$value['harga'];
                                                $getFotoList = $this->db->query("select * from tbl_trip_foto where id_opentrip = '".$value['id_opentrip']."' limit 1")->row_array();
                                        ?>

                                        <div class="single-item">
                                            <input type="hidden" name="produk[]" value="<?= $value['opentrip_id'] ?>">
                                            <input type="hidden" name="tanggal[]" value="<?= $value['id_jadwal'] ?>">
                                            <div class="single-item__thumb">
                                                <img src="<?= base_url() ?><?= (empty($getFotoList)?'assets_front/images/product-2/cart-img/1.jpg':'uploads/'.$getFotoList['foto'])?>" alt="ordered item">
                                            </div>
                                            <div class="single-item__content">
                                                <a href="#"><?= $value['judul'] ?></a>
                                                <span class="price"><?= number_format($value['harga'],0) ." x".$value['jumlah']." pax" ?></span>
                                            </div>
                                            <div class="single-item__remove">
                                                <a href="<?= site_url('front/hapus/').$value['cart_id'] ?>"><i class="zmdi zmdi-delete"></i></a>
                                            </div>
                                        </div>
                                        <?php $jml[] =  $value['jumlah']*$value['harga'];  } ?>
                                    </div>
                                    <div class="ordre-details__total">
                                        <h5>Order total</h5>
                                        <span class="price"><?php echo "Rp. ".number_format($total); ?></span>
                                        <input type="text" name="total" value="<?= $total ?>">
                                    </div>
                                    <div class="single-input" style="padding-left: 20px;padding-bottom: 20px;">
                                       
                                            <button type="submit" class="dark-btn">Proccess</button>
                                    </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->
<script type="text/javascript">
    function retrieve($id){
        var id_bank = $('#id_bank'+$id).val();
        $.ajax({
            url : "<?php echo base_url("front/getBank/") ?>" +id_bank,
            type: "GET",
            dataType: "JSON",
            success: function(data){ 
                $('#nama_bank').val("Bank " +data.bank);
                $('#norek').val("Nomor Rekening : " +data.no_rek);
                $('#an').val("Atas Nama : " +data.atas_nama);
            }
        });

        //$('.form_barang').append(selection_form);
       getApriori();

    }
</script>
        