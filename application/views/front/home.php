<div class="slider__container slider--one bg__cat--3">
            <div class="slide__container slider__activation__wrap owl-carousel">
                <!-- Start Single Slide -->
                <?php 
                    $i=0; 
                    foreach ($listSlider as $key => $value) { 
                        $getFoto = $this->db->query("select * from tbl_trip_foto where id_opentrip = '".$value->opentrip_id."' limit 1")->row();
                ?>
                <div class="single__slide animation__style01 slider__fixed--height">
                    <div class="container">
                        <div class="row align-items__center">
                            <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                                <div class="slide">
                                    <div class="slider__inner">
                                        <h2 style="color:#fff;"><?= $value->judul ?></h2>
                                        <h1></h1>
                                        <div class="cr__btn">
                                            <a href="<?= base_url('front/detail/'.$value->opentrip_id) ?>">Lihat</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                                <div class="slide__thumb">
                                    <img src="<?= base_url() ?><?= (empty($getFoto)?'assets_front/images/slider/fornt-img/1.png':'uploads/'.$getFoto->foto)?>" alt="slider images">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php $i++;} ?>
                <!-- End Single Slide -->
            </div>
        </div>
        
        
            <?= $this->session->flashdata('msgbox') ?>
        <section class="htc__category__area ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">Daftar Open Trip</h2>
                        </div>
                    </div>
                </div>
                <div class="htc__product__container">
                    <div class="row">
                        <div class="product__list clearfix mt--30">
                            <?php 
                                $no=0;
                                foreach ($listData as $key => $value) {
                                    $no++; if($no<3){
                                        continue;
                                    }
                                    $getFotoList = $this->db->query("select * from tbl_trip_foto where id_opentrip = '".$value->opentrip_id."' limit 1")->row();
                            ?>
                            <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                <div class="category">
                                    <div class="ht__cat__thumb">
                                        <a href="<?= base_url('front/detail/'.$value->opentrip_id) ?>">
                                            <img src="<?= base_url() ?><?= (empty($getFotoList )?'assets_front/images/product/1.jpg':'uploads/'.$getFotoList->foto)?>" alt="product images" style="height: 355px;width: 290px;">
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

        