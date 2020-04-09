<!DOCTYPE html>
<html>
<head>
  <?php include "element/head.php" ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include "element/header.php" ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include "element/sidebar.php" ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <?php $this->load->view($v_content); ?>
	<!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   <?php include "element/main_footer.php" ?>
   
  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
</div>
<!-- ./wrapper -->

<?php include "element/footer.php" ?>
</body>
</html>
