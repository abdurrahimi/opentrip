       <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/css/font-awesome.css" />

    <!-- page specific plugin styles -->
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/css/jquery-ui.custom.css" />
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/css/chosen.css" />
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/css/datepicker.css" />
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/css/bootstrap-timepicker.css" />
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/css/daterangepicker.css" />
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/css/bootstrap-datetimepicker.css" />
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/css/colorpicker.css" />

    <!-- text fonts -->
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/css/ace-fonts.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets') ?>/tippedJs/css/tipped/tipped.css" />

    <!--[if lte IE 9]>
        <link rel="stylesheet" href="../assets/css/ace-part2.css" class="ace-main-stylesheet" />
    <![endif]-->

    <!--[if lte IE 9]>
      <link rel="stylesheet" href="../assets/css/ace-ie.css" />
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
            <script type="text/javascript">
        window.jQuery || document.write("<script src='<?php echo base_url('assets') ?>/js/jquery.js'>"+"<"+"/script>");
    </script>
    <script src="<?php echo base_url('assets') ?>/js/ace-extra.js"></script>
    <script src="<?php echo base_url('assets') ?>/js/autoNumeric.js"></script>

    <link rel="styleSheet" href="<?php echo base_url('assets') ?>/dtree/dtree.css" type="text/css" />
    <script type="text/javascript" src="<?php echo base_url('assets') ?>/dtree/dtree.js"></script>
    <script src="<?php echo base_url('assets') ?>/js/jstree/dist/jstree.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/js/jstree/dist/themes/default/style.min.css" />
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/jOrgChart/css/jquery.jOrgChart.css"/>
    <script src="<?php echo base_url('assets') ?>/jOrgChart/jquery.jOrgChart.js"></script>
    
    
    <script src="<?php echo base_url('assets/js/highchart/js/highcharts.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/highchart/js/modules/exporting.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/highchart/js/modules/drilldown.js') ?>"></script>
    <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url('public');?>/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('public');?>/plugins/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url('public');?>/plugins/ionic/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('public');?>/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('public');?>/plugins/iCheck/square/blue.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('public');?>/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('public');?>/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url('public');?>/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url('public');?>/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url('public');?>/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('public');?>/plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url('public');?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <link rel="stylesheet" href="<?php echo base_url('public');?>/css/fa-loading.css">
  <link rel="stylesheet" href="<?php echo base_url('public');?>/css/main.css">
  <link rel="stylesheet" href="<?php echo base_url('public');?>/rating/dist/themes/fontawesome-stars.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <link rel="stylesheet" href="<?php echo base_url('public');?>/plugins/ie/html5shiv.min.js">
  <link rel="stylesheet" href="<?php echo base_url('public');?>/plugins/ie/respond.min.js">
  <![endif]-->
    <div class="main-content">
    <div class="main-content-inner">
        <!-- #section:basics/content.breadcrumbs -->
        
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Data Open Trip
                
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">

                <div class="row">
                    <div class="col-xs-12">

                        <div class="clearfix">

                            <?php echo $this->session->flashdata('msgbox') ?>
                        </div>
                        
                        <div class="table-header">
                           <h3> Tujuan : <?= $listData[0]->judul ?> </h3>
                        </div>
                       

                        <div>
                            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Peserta</th>
                                        <th>No. Hp</th>
                                        <th>Status</th>
                                    </tr>
                                </thead> 
                                <tbody>
                                <?php
                                if(empty($listData)){ ?>
                                    <tr>
                                       <td colspan="4" class="text-center"> Data Kosong</td>
                                       
                                   </tr>
                               <?php }
                               $arr = array("Belum Bayar","Sudah Bayar");
                                foreach ($listData as $key => $value) { ?>
                                   <tr>
                                       <td><?= $key+1 ?></td>
                                       <td><?= $value->first_name ?></td>
                                       <td><?= $value->no_hp ?></td>
                                       <td><?= $arr[$value->status] ?></td>
                                   </tr>
                                <?php } ?>
                                </tbody>
                        </table> 
                    </div>

                </div><!-- /.modal-dialog -->
            </div><!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.page-content -->
</div>

    <footer>
        <!-- ./wrapper -->

        <!-- jQuery 2.2.0 -->
        <script src="<?php echo base_url('public');?>/plugins/jQuery/jQuery-2.2.0.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="<?php echo base_url('public');?>/js/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        
        <!-- Bootstrap 3.3.6 -->
        <script src="<?php echo base_url('public');?>/bootstrap/js/bootstrap.min.js"></script>
        <!-- Morris.js charts -->
        <script src="<?php echo base_url('public');?>/plugins/raphael/raphael-min.js"></script>
        <!-- script src="<?php echo base_url('public');?>/plugins/morris/morris.min.js"></script -->
        <!-- Sparkline -->
        <script src="<?php echo base_url('public');?>/plugins/sparkline/jquery.sparkline.min.js"></script>
        <!-- jvectormap -->
        <script src="<?php echo base_url('public');?>/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="<?php echo base_url('public');?>/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="<?php echo base_url('public');?>/plugins/knob/jquery.knob.js"></script>
        <!-- daterangepicker -->
        <script src="<?php echo base_url('public');?>/plugins/moment/moment.min.js"></script>
        <script src="<?php echo base_url('public');?>/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- datepicker -->
        <script src="<?php echo base_url('public');?>/plugins/datepicker/bootstrap-datepicker.js"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?php echo base_url('public');?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
        <!-- Slimscroll -->
        <script src="<?php echo base_url('public');?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url('public');?>/plugins/fastclick/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url('public');?>/dist/js/app.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <!-- script src="<?php echo base_url('public');?>/dist/js/pages/dashboard.js"></script -->
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url('public');?>/dist/js/demo.js"></script>        
        <!-- iCheck -->
        <script src="<?php echo base_url('public');?>/plugins/iCheck/icheck.min.js"></script>
        <script src="<?php echo base_url('public');?>/js/fa-loading.js"></script>
        <script src="<?php echo base_url('public');?>/js/jquery.printPage.js"></script>
        <script src="<?php echo base_url('public');?>/plugins/jquery-price-format/jquery.price_format.2.0.min.js"></script>
        <script src="<?php echo base_url('public');?>/rating/dist/jquery.barrating.min.js"></script>
        <!-- main JS -->
        <script src="<?php echo base_url('public');?>/js/main.js"></script>
        
        
        
        
        
        <!-- basic scripts -->

<!--[if !IE]> -->


<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
window.jQuery || document.write("<script src='<?php echo base_url('assets/') ?>js/jquery1x.js'>"+"<"+"/script>");
</script>
<![endif]-->



<!-- page specific plugin scripts -->
<!-- page specific plugin scripts -->
<script src="<?php echo base_url('assets') ?>/js/dataTables/jquery.dataTables.js"></script>
<script src="<?php echo base_url('assets') ?>/js/dataTables/jquery.dataTables.bootstrap.js"></script>
<script src="<?php echo base_url('assets') ?>/js/dataTables/extensions/TableTools/js/dataTables.tableTools.js"></script>
<script src="<?php echo base_url('assets') ?>/js/dataTables/extensions/ColVis/js/dataTables.colVis.js"></script>

<!--[if lte IE 8]>
  <script src="<?php echo base_url('assets/') ?>js/excanvas.js"></script>
<![endif]-->
<script src="<?php echo base_url('assets') ?>/js/jquery-ui.custom.js"></script>
<script src="<?php echo base_url('assets') ?>/js/jquery.ui.touch-punch.js"></script>
<script src="<?php echo base_url('assets') ?>/js/chosen.jquery.js"></script>
<script src="<?php echo base_url('assets') ?>/js/fuelux/fuelux.spinner.js"></script>
<script src="<?php echo base_url('assets') ?>/js/date-time/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url('assets') ?>/js/date-time/bootstrap-timepicker.js"></script>
<script src="<?php echo base_url('assets') ?>/js/date-time/moment.js"></script>
<script src="<?php echo base_url('assets') ?>/js/date-time/daterangepicker.js"></script>
<script src="<?php echo base_url('assets') ?>/js/date-time/bootstrap-datetimepicker.js"></script>
<script src="<?php echo base_url('assets') ?>/js/bootstrap-colorpicker.js"></script>
<script src="<?php echo base_url('assets') ?>/js/jquery.knob.js"></script>
<script src="<?php echo base_url('assets') ?>/js/jquery.autosize.js"></script>
<script src="<?php echo base_url('assets') ?>/js/jquery.inputlimiter.1.3.1.js"></script>
<script src="<?php echo base_url('assets') ?>/js/jquery.maskedinput.js"></script>
<script src="<?php echo base_url('assets') ?>/js/bootstrap-tag.js"></script>

<!-- ace scripts -->
<script src="<?php echo base_url('assets') ?>/js/ace/elements.scroller.js"></script>
<script src="<?php echo base_url('assets') ?>/js/ace/elements.colorpicker.js"></script>
<script src="<?php echo base_url('assets') ?>/js/ace/elements.fileinput.js"></script>
<script src="<?php echo base_url('assets') ?>/js/ace/elements.typeahead.js"></script>
<script src="<?php echo base_url('assets') ?>/js/ace/elements.wysiwyg.js"></script>
<script src="<?php echo base_url('assets') ?>/js/ace/elements.spinner.js"></script>
<script src="<?php echo base_url('assets') ?>/js/ace/elements.treeview.js"></script>
<script src="<?php echo base_url('assets') ?>/js/ace/elements.wizard.js"></script>
<script src="<?php echo base_url('assets') ?>/js/ace/elements.aside.js"></script>
<script src="<?php echo base_url('assets') ?>/js/ace/ace.js"></script>
<script src="<?php echo base_url('assets') ?>/js/ace/ace.ajax-content.js"></script>
<script src="<?php echo base_url('assets') ?>/js/ace/ace.touch-drag.js"></script>
<script src="<?php echo base_url('assets') ?>/js/ace/ace.sidebar.js"></script>
<script src="<?php echo base_url('assets') ?>/js/ace/ace.sidebar-scroll-1.js"></script>
<script src="<?php echo base_url('assets') ?>/js/ace/ace.submenu-hover.js"></script>
<script src="<?php echo base_url('assets') ?>/js/ace/ace.widget-box.js"></script>
<script src="<?php echo base_url('assets') ?>/js/ace/ace.settings.js"></script>
<script src="<?php echo base_url('assets') ?>/js/ace/ace.settings-rtl.js"></script>
<script src="<?php echo base_url('assets') ?>/js/ace/ace.settings-skin.js"></script>
<script src="<?php echo base_url('assets') ?>/js/ace/ace.widget-on-reload.js"></script>
<script src="<?php echo base_url('assets') ?>/js/ace/ace.searchbox-autocomplete.js"></script>
<script src="<?php echo base_url('assets') ?>/js/autoNumeric.js"></script>
<!-- inline scripts related to this page -->



<script type="text/javascript" src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>
    </footer>
</div><!-- /.main-content -->
