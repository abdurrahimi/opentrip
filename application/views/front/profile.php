<section class="htc__contact__area ptb--100 bg__white">
    <div class="container">
        <div class="row">
            <div class="contact-form-wrap mt--60">
                <div class="col-xs-12">
                    <div class="contact-title">
                        <h2 class="title__line--6">Profile</h2>
                    </div>
                </div>

                <div class="col-xs-12">
                    <?= $this->session->flashdata('msgbox') ?>
                    <form id="contact-form" action="<?= base_url('front/doUpdate') ?>" method="post">
                        <div class="single-contact-form">
                            <div class="contact-box message">
                                <input type="text" name="user_name" placeholder="Your Name*" value="<?= $dataUser->first_name ?>" required>
                            </div>
                        </div>
                        <div class="single-contact-form">
                            <div class="contact-box name">
                                <input type="text" name="username" placeholder="Your Username*" value="<?= $dataUser->username ?>" readonly>
                                <input type="password" name="password" placeholder="Your Password* isi jika ingin ubah" >
                            </div>
                        </div>
                        <div class="single-contact-form">
                            <div class="contact-box name">
                                <input type="text" name="no_hp" placeholder="Your no Hp*" value="<?= $dataUser->no_hp ?>" required>
                                <input type="email" name="email" placeholder="Your Email*" value="<?= $dataUser->email ?>" required>
                            </div>
                        </div>
                        <div class="single-contact-form">
                            <div class="contact-box message">
                                <textarea name="alamat" placeholder="Your Message" required><?= $dataUser->address_1 ?></textarea>
                            </div>
                        </div>
                        <div class="contact-btn">
                            <button type="submit" class="fv-btn" style="float: left;">Update</button>
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