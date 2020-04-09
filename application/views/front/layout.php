<!doctype html>
<html class="no-js" lang="en">
<head>
<?php  $this->load->view('front/include/head') ?>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- Body main wrapper start -->
    <div class="wrapper">
        <?php  $this->load->view('front/include/header') ?>
        <?php $this->load->view($v_content) ?>
        <!-- End Header Area -->
            <!-- End Footer Widget -->
            <!-- Start Copyright Area -->

        <!-- End Footer Style -->
        <?php $this->load->view('front/include/footer') ?>
    </div>

</body>
<?php include 'include/scripts.php' ?>

</html>