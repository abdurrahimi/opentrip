<section class="htc__contact__area ptb--100 bg__edited">
    <div class="container">
        <div class="row">
            <div class="contact-form-wrap mt--60">
                <div class="col-xs-12">
                    <div class="contact-title">
                        <h2 class="title__line--6">Login</h2>
                    </div>
                </div>
                <div class="col-xs-8">
                    <form id="contact-form" action="<?= base_url('front/doLoginUser')?>" method="post">
                        <?php if($this->session->flashdata('GagalLogin')=='Ya'){ ?>
                        <div class="alert alert-danger"style="width: 60%;">
                            <strong>ERROR!</strong> username atau password salah, silakan coba kembali
                        </div>
                        <?php } ?>
                        <?php if($this->session->flashdata('GagalRegister')=='Ya'){ ?>
                        <div class="alert alert-danger"style="width: 60%;">
                            <strong>GAGAL!</strong> register gagal.
                        </div>
                        <?php } ?>
                        <?php if($this->session->flashdata('SuksesRegister')=='Ya'){ ?>
                        <div class="alert alert-success"style="width: 60%;">
                            <strong>REGISTER BERHASIL!</strong> silakan login dengan akun yang didaftarkan
                        </div>
                        <?php } ?>
                        <div class="single-contact-form">
                            <div class="contact-box name">
                                <input type="text" name="username" placeholder="Your Username*" required>
                            </div>
                        </div>
                        <div class="single-contact-form">
                            <div class="contact-box name">
                                <input type="password" name="password" placeholder="Your Password*" required>
                            </div>
                        </div>
                        <div class="contact-btn">
                            <button type="submit" class="fv-btn" style="float: left;">Login</button>
                            <a href="<?= base_url('front/register') ?>" class="edited-btn" style="margin-left:10px;float: left;display: inline-block;padding: 12px 20px;">Register</a>
                        </div>
                    </form>
                </div>
                <div class="col-xs-4" style="margin-top: -60px;">
                    <div class="form-output">
                        <center>
                        <p><h2>Top Rated</h2></p>
                        <p class="form-messege" style="background-color: #c43b68;color: #fff;">
                            Yuk, Intip Keindahan <?php echo $top_rated->judul ?>
                        </p>
                        </center>
                        <p style="padding-top: 20px;">
                            <?php
                                $getFoto= $this->db->query("select * from tbl_trip_foto where id_opentrip = '".$top_rated->opentrip_id."' limit 1")->row();
                            ?>
                            <img src="<?= base_url() ?><?= (empty($getFoto)?'assets_front/images/product/1.jpg':'uploads/'.$getFoto->foto)?>">
                        </p>
                    </div>
                </div>
            </div> 

        </div>
    </div>
</section>