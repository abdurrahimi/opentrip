<?php $dataUser = $this->session->userdata('loginUser') ?>
<header id="htc__header" class="htc__header__area header--one">
    <!-- Start Mainmenu Area -->
    <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
        <div class="container">
            <div class="row">
                <div class="menumenu__container clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5"> 
                        <div class="logo">
                             <a href="<?php echo base_url(); ?>"><img src="<?= base_url('assets_front/') ?>images/logo/4.png" alt="logo images"></a> 
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                        <nav class="main__menu__nav hidden-xs hidden-sm">
                            <ul class="main__menu">
                                <li class="drop"><a href="<?= base_url() ?>" style="<?php if(empty($this->uri->segment(2))){echo "color: #1768ae;";} ?>">Home</a></li>
                                <li class="drop"><a href="<?= base_url('front/list') ?>" style="<?php if($this->uri->segment(2) == "list" OR $this->uri->segment(2) == "detail"){echo "color: #1768ae;";} ?>">Opentrip</a></li>
                                <li class="drop"><a href="#">Destinasi</a>
                                    <ul class="dropdown mega_dropdown">
                                        <!-- Start Single Mega MEnu -->
                                        <li><a class="mega__title" href="#">Domestik</a>
                                            <ul class="mega__item">
                                                <?php
                                                    $domestik = $this->m_global->getDomExist();
                                                    foreach ($domestik as $key_dom => $value_dom) {
                                                ?>
                                                <li><a href="<?php echo base_url('front/list?province='.$value_dom->province_id); ?>"><?php echo $value_dom->province_name ?></a></li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                        <!-- End Single Mega MEnu -->
                                        
                                    </ul>
                                </li>
                                <!-- <li><a href="contact.html">Contact</a></li> -->
                            </ul>
                        </nav>

                        <div class="mobile-menu clearfix visible-xs visible-sm">
                            <nav id="mobile_dropdown">
                                <ul>
                                    <li>
                                        <a href="<?= base_url() ?>" style="<?php if(empty($this->uri->segment(2))){echo "color: #1768ae;";} ?>">Home</a>
                                    </li>
                                    <li><a href="<?= base_url('front/list') ?>" style="<?php if($this->uri->segment(2) == "list" OR $this->uri->segment(2) == "detail"){echo "color: #1768ae;";} ?>">Opentrip</a></li>
                                    <li><a href="#">Destinasi</a>
                                        <ul>
                                            <?php
                                                $domestik = $this->m_global->getDomExist();
                                                foreach ($domestik as $key_dom => $value_dom) {
                                            ?>
                                            <li><a href="<?php echo base_url('front/list?province='.$value_dom->province_id); ?>"><?php echo $value_dom->province_name ?></a></li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </nav>
                        </div>  
                    </div>
                    <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                        <div class="header__right">
                            <div class="header__search">
                                <?php if (!empty($dataUser)){ ?>
                                <a href="<?= base_url('front/logout') ?>">Logout</a>
                                <?php }else{ ?>
                                <a href="<?= base_url('front/login') ?>">Login</a>
                                <?php } ?>
                            </div>
                            <div class="header__account">
                                <a href="<?= base_url('front/profile') ?>"><i class="icon-user icons"></i></a>
                            </div>
                            <div class="htc__shopping__cart">
                                <?php if (!empty($dataUser)){ ?>
                                <a class="cart__menu" href="#">
                                <?php }else{ ?>
                                <a class="" href="<?= base_url('front/login') ?>">
                                <?php } ?>
                                    <i class="icon-handbag icons"></i>
                                </a>
                                <a href="#">
                                    <span class="htc__qua">
                                        <?php 
                                            if (!empty($dataUser)){
                                                $jumlah = $this->db->query('select count(*) as jumlah from tbl_cart where id_user = "'.$dataUser['id'].'"')->row();
                                                echo $jumlah->jumlah;
                                            }else{
                                                echo "0";
                                            }
                                        ?>
                                    </span>
                                </a>
                            </div>

                            
                        </div>
                    </div>

                </div>
            </div>
            <div class="mobile-menu-area"></div>
        </div>
    </div>
    <!-- End Mainmenu Area -->
</header>

<div class="body__overlay"></div>
<!-- Start Offset Wrapper -->
<div class="offset__wrapper">
    <!-- Start Search Popap -->
    <div class="search__area">
        <div class="container" >
            <div class="row" >
                <div class="col-md-12" >
                    <div class="search__inner">
                        <form action="#" method="get">
                            <input placeholder="Search here... " type="text">
                            <button type="submit"></button>
                        </form>
                        <div class="search__close__btn">
                            <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Search Popap -->
    <!-- Start Cart Panel -->
    <div class="shopping__cart">
        <div class="shopping__cart__inner">
            <div class="offsetmenu__close__btn">
                <a href="#"><i class="zmdi zmdi-close"></i></a>
            </div>
            <?php if (!empty($dataUser)){ ?>
            <div class="shp__cart__wrap">
                <?php 
                $cart = $this->db->query("select * from tbl_cart a join tbl_opentrip b on a.id_opentrip = b.opentrip_id  where id_user ='" . $dataUser['id'] . "'")->result_array();
                $total = 0;
                foreach ($cart as $key => $value) {
                    $total += $value['harga'];
                    $getFotoList = $this->db->query("select * from tbl_trip_foto where id_opentrip = '".$value['id_opentrip']."' limit 1")->row_array();
                ?>
                <div class="shp__single__product">
                    <div class="shp__pro__thumb">
                        <a href="#">
                            <img src="<?= base_url() ?><?= (empty($getFotoList)?'assets_front/images/product-2/cart-img/1.jpg':'uploads/'.$getFotoList['foto'])?>" alt="product images">
                        </a>
                    </div>
                    <div class="shp__pro__details">
                        <h2><a href="product-details.html"><?= $value['judul'] ?></a></h2>
                        <span class="quantity">Pax: <?= $value['jumlah'] ?></span>
                        <span class="shp__price"><?= number_format($value['harga'],0) ?></span>
                    </div>
                    <div class="remove__btn">
                        <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                    </div>
                </div>
                <?php } ?>
            </div>
            <ul class="shoping__total">
                <li class="subtotal">Subtotal:</li>
                <li class="total__price"><?= number_format($total,0) ?></li>
            </ul>
            <ul class="shopping__btn">
                <li><a href="<?= base_url('front/transaksi') ?>">Lihat History</a></li>
                <li class="shp__checkout"><a href="<?= base_url('front/cart') ?>">Checkout</a></li>
            </ul>
            <?php } ?>
        </div>
    </div>
    <!-- End Cart Panel -->
</div>
<!-- End Offset Wrapper -->