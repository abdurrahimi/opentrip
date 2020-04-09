<!-- Start Product Details Area -->
<section class="htc__product__details bg__edited ptb--100">
    <!-- Start Product Details Top -->
    <div class="htc__product__details__top">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                    <div class="htc__product__details__tab__content">
                        <!-- Start Product Big Images -->
                        <div class="product__big__images">
                            <div class="portfolio-full-image tab-content">
                                <?php foreach ($listFoto as $key => $value) { ?>
                                <div role="tabpanel" class="tab-pane fade <?php if($key == 0){echo "in active";} ?>" id="img-tab-<?php echo $key;?>">
                                    <img src="<?php echo $value['foto'] ?>" alt="full-image">
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- End Product Big Images -->
                        <!-- Start Small images -->
                        <ul class="product__small__images" role="tablist">
                            <?php foreach ($listFoto as $key => $value) { ?>
                            <li role="presentation" class="pot-small-img <?php if($key == 0){echo "active";} ?>">
                                <a href="#img-tab-<?php echo $key;?>" role="tab" data-toggle="tab">
                                    <img src="<?php echo $value['foto'] ?>" style="width: 50px;height: 50px;">
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                        <!-- End Small images -->
                    </div>
                </div>
                <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">
                    <div class="ht__product__dtl">
                        <h2><?= $listData['judul'] ?></h2>
                        <h6></h6>
                        <ul class="rating">
                            <li><i class="icon-star icons"></i></li>
                            <li><i class="icon-star icons"></i></li>
                            <li><i class="icon-star icons"></i></li>
                            <li class="old"><i class="icon-star icons"></i></li>
                            <li class="old"><i class="icon-star icons"></i></li>
                        </ul>
                        <ul  class="pro__prize">
                            <!-- <li class="old__prize"></li> -->
                            <li><?= "Rp. ".number_format($listData['harga'],0)?></li>
                        </ul>
                        <p class="pro__info"><?= $listData['catatan']?></p>
                        <div class="ht__pro__desc">
                            <div class="sin__desc">
                                <p><span>Kuota:</span> Tersedia</p>
                            </div>

                            <div class="sin__desc product__share__link">
                                <button type="button" class="fv-btn" style="float: left;" data-toggle="modal" data-target="#myModal">Cek Ketersediaan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product Details Top -->

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Cek Ketersediaan</h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo base_url().'front/addtocart'?>" role="form">
                        <div class="row">
                            <div class="col-md-12" style="padding-bottom: 10px;">
                                <div class="single-input mt-0">
                                    <input type="hidden" name="id_opentrip" value="<?php echo $this->uri->segment(3); ?>">
                                    <select name="jadwal" id="jadwal" style="height: 40px;" required="">
                                        <option selected disabled>Pilih Jadwal Tersedia</option>
                                        <?php foreach ($jadwal as $key => $value) { 
                                            $sql = "select count(*) jml from tbl_jadwal where jadwal ='".$value['jadwal']."'";
                                            $count = $this->db->query($sql)->row()->jml;
                                                   
                                            if($listData['is_unlimited']==0){
                                                if($count >= $listData['kuota']){continue;}
                                            }     
                                            if($value['jadwal']<date('Y-m-d')){
                                                continue;
                                            }
                                        ?>
                                        <option value="<?= $value['jadwal_id'] ?>"><?= $value['jadwal'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-input">
                                    <input type="number" min="1" name="jumlah" required="" placeholder="Jumlah" style="height: 40px;">
                                </div>
                            </div>
                            <div class="col-md-12" style="padding-top: 50px;">
                                <div class="single-input">
                                    <button type="submit" class="fv-btn" style="float: left;">Tambah Ke Cart</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Product Details Area -->
<!-- Start Product Description -->
<section class="htc__produc__decription bg__white">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <!-- Start List And Grid View -->
                <ul class="pro__details__tab" role="tablist">
                    <li role="presentation" class="fasilitas active"><a href="#fasilitas" role="tab" data-toggle="tab">Fasilitas</a></li>
                    <li role="presentation" class="itinerary"><a href="#itinerary" role="tab" data-toggle="tab">Itinerary</a></li>
                    <li role="presentation" class="jadwal"><a href="#jadwal" role="tab" data-toggle="tab">Jadwal Trip</a></li>
                    <li role="presentation" class="info"><a href="#info" role="tab" data-toggle="tab">Info</a></li>
                </ul>
                <!-- End List And Grid View -->
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="ht__pro__details__content">
                    <!-- Start Single Content -->
                    <div role="tabpanel" id="fasilitas" class="pro__single__content tab-pane fade in active">
                        <div class="pro__tab__content__inner">
                            <?php echo !empty($fasilitas['fasilitas'])? $fasilitas['fasilitas'] : "Data Kosong" ; ?>
                        </div>
                    </div>
                    <!-- End Single Content -->

                    <!-- Start Single Content -->
                    <div role="tabpanel" id="itinerary" class="pro__single__content tab-pane fade">
                        <div class="pro__tab__content__inner">
                            <?php echo !empty($itenerary['itenerary'])? $itenerary['itenerary'] : "Data Kosong" ; ?>
                        </div>
                    </div>
                    <!-- End Single Content -->

                    <!-- Start Single Content -->
                    <div role="tabpanel" id="jadwal" class="pro__single__content tab-pane fade">
                        <div class="pro__tab__content__inner">
                            <?php
                                if(!empty($jadwal)){
                                    foreach ($jadwal as $key => $value) {
                                        $sql = "select count(*) jml from tbl_jadwal where jadwal ='".$value['jadwal']."'";
                                        $count = $this->db->query($sql)->row()->jml;
                                        $sisa = $listData['kuota']-$count;
                                        
                                        if($listData['is_unlimited']==0){
                                                if($count >= $listData['kuota']){continue;}
                                        } 
                                        echo "<h2>". $value['jadwal'] . "</h2> Kuota : ".$listData['kuota']." Orang</br>Sisa : ".$sisa." Orang<br>";
                                    }

                                }
                                 
                            ?>
                        </div>
                    </div>
                    <!-- End Single Content -->

                    <!-- Start Single Content -->
                    <div role="tabpanel" id="info" class="pro__single__content tab-pane fade">
                        <div class="pro__tab__content__inner">
                            
                        </div>
                    </div>
                    <!-- End Single Content -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Product Description -->
<!-- Start Product Area -->
<section class="htc__product__area--2 pb--100 product-details-res">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title--2 text-center">
                    <h2 class="title__line">Trip Lainnya</h2>
                    <p></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="product__wrap clearfix">
                <?php 
                    foreach ($listTrip as $key => $value) {
                        $getFotoList = $this->db->query("select * from tbl_trip_foto where id_opentrip = '".$value->opentrip_id."' limit 1")->row();
                ?>
                <!-- Start Single Product -->
                <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                    <div class="category">
                        <div class="ht__cat__thumb">
                            <a href="product-details.html">
                                <img src="<?= base_url() ?><?= (empty($getFotoList)?'assets_front/images/product/1.jpg':'uploads/'.$getFotoList->foto)?>" alt="product images" height="300">
                            </a>
                        </div>
                        <div class="fr__hover__info">
                            <ul class="product__action">
                                <li><a href="#"><i class="icon-heart icons"></i></a></li>

                                <li><a href="#"><i class="icon-handbag icons"></i></a></li>

                                <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                            </ul>
                        </div>
                        <div class="fr__product__inner">
                            <h4><a href="<?= base_url('front/detail/'.$value->opentrip_id) ?>"><?= $value->judul ?></a></h4>
                            <ul class="fr__pro__prize">
                                <li>Rp.<?= number_format($value->harga,0) ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <!-- End Single Product -->
            </div>
        </div>
    </div>
</section>
<!-- End Product Area -->

