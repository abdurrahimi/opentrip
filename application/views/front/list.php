<section class="htc__category__area ptb--100 bg__edited">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title--2 text-center">
                    <h2 class="title__line"><?php if(empty($_GET['province'])){echo "Daftar Semua Open Trip";}else{echo "Trip di ".$province['province_name'];} ?></h2>
                </div>
            </div>
        </div>
        <div class="htc__product__container">
            <div class="row">
                <div class="product__list clearfix mt--30">
                    <?php 
                        $no=0; 
                        foreach ($listData as $key => $value) {
                            $no++;
                            $getFotoList = $this->db->query("select * from tbl_trip_foto where id_opentrip = '".$value->opentrip_id."' limit 1")->row();
                    ?>
                    <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                        <div class="category">
                            <div class="ht__cat__thumb">
                                <a href="<?= base_url('front/detail/'.$value->opentrip_id) ?>">
                                    <img src="<?= base_url() ?><?= (empty($getFotoList)?'assets_front/images/product/1.jpg':'uploads/'.$getFotoList->foto)?>" alt="product images" style="height: 355px;width: 290px;">
                                </a>
                            </div>
                            <div class="fr__product__inner">
                                <?php $stock = array('Kuota : '.$value->kuota,'Unlimited'); ?>
                                <label><?= $stock[$value->is_unlimited]; ?></label>
                                <h4><a href="<?= base_url('front/detail/'.$value->opentrip_id) ?>"><?= $value->judul ?></a></h4>
                                <ul class="fr__pro__prize">
                                    <li>Rp.<?= number_format($value->harga,0) ?></li>
                                </ul>
                                
                            </div>
                        </div>
                    </div>
                    <?php  } ?>
                </div>
            </div>
        </div>
    </div>
</section>

        