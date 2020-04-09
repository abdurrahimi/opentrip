<section class="htc__contact__area ptb--100 bg__edited">
    <div class="container">
        <div class="row">
            <div class="contact-form-wrap mt--60" style="margin-top: -65px;">
                <div class="col-xs-12">
                    <div class="contact-title">
                        <h2 class="title__line--6">Register</h2>
                    </div>
                </div>
                <div class="col-xs-12">
                    <?php if($this->session->flashdata('GagalLogin')=='Ya'){ ?>
                    <div class="alert alert-danger"style="width: 60%;">
                        <strong>ERROR!</strong> username atau password salah, silakan coba kembali
                    </div>
                    <?php } ?>

                    <?php if($this->session->flashdata('unameExist')=='Ya'){ ?>
                        <div class="alert alert-danger"style="width: 60%;">
                            <strong>GAGAL!</strong> username sudah terpakai
                        </div>
                    <?php } ?>

                    <form id="contact-form" action="<?= base_url('front/doRegister') ?>" method="post">
                        <div class="single-contact-form">
                            <div class="contact-box message">
                                <input type="text" name="user_name" placeholder="Your Name*" required>
                            </div>
                        </div>
                        <div class="single-contact-form">
                            <div class="contact-box name">
                                <input type="text" name="username" placeholder="Your Username*" required>
                                <input type="password" name="password" placeholder="Your Password*"  required>
                            </div>
                        </div>
                        <div class="single-contact-form">
                            <div class="contact-box name">
                                <input type="text" name="no_hp" placeholder="Your Phone*" required>
                                <input type="email" name="email" placeholder="Your Email*"  required>
                            </div>
                        </div>
                        <div class="single-contact-form">
                            <div class="contact-box message">
                                <textarea name="alamat" placeholder="Your Address*" required></textarea>
                            </div>
                        </div>
                        <div class="contact-btn">
                            <button type="submit" class="fv-btn" style="float: left;">Register</button>
                            <a href="<?= base_url('front/login') ?>" class="edited-btn" style="margin-left:10px;float: left;display: inline-block;padding: 12px 20px;">Back To Login</a>
                        </div>
                    </form>
                    <div class="form-output">
                        <p class="form-messege"></p>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</section>