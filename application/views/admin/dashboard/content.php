
<!-- Content Wrapper. Contains page content -->

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Home Dashboard</small>
    </h1>
     <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Here</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon"><i class="fa fa-home"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Property</span>
              <span class="info-box-number"></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Member</span>
              <span class="info-box-number"></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-map-marker"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Kota</span>
              <span class="info-box-number"></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col --> 
        <div class="col-md-3 col-sm-6 col-xs-12" style="display:none;">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-bars"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Category</span>
              <span class="info-box-number"></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <div class="row" style="display:none;">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">H-7 Jatuh Tempo Pembayaran</h3>

              <div class="box-tools pull-right">
                <button data-widget="collapse" class="btn btn-box-tool" type="button"><i class="fa fa-minus"></i>
                </button>
                <div class="btn-group">
                  <button data-toggle="dropdown" class="btn btn-box-tool dropdown-toggle" type="button">
                    <i class="fa fa-wrench"></i></button>
                    <ul role="menu" class="dropdown-menu">
                      <li><a href="#">Action</a></li>
                      <li><a href="#">Another action</a></li>
                      <li><a href="#">Something else here</a></li>
                      <li class="divider"></li>
                      <li><a href="#">Separated link</a></li>
                    </ul>
                  </div>
                  <button data-widget="remove" class="btn btn-box-tool" type="button"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                  <div class="col-md-8">
                    <p class="text-center">
                      <!-- strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong -->
                    </p>

                    <div class="chart">
                     <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Transaksi ID</th>
                          <th>Customer Name</th>
                          <th>Total Item</th>
                          <th>Total Harga</th>
                          <th>Jatuh Tempo</th>
                          <th>Telepon</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                     </tbody>
                   </table>
                   <div class="clearfix">
                    <a href="<?php echo site_url('tunggakan');?>" class="btn btn-primary">Tampilkan Semua</a>
                  </div>
                </div>
                <!-- /.chart-responsive -->
              </div>
              <!-- /.col -->
              <div class="col-md-4">
                <div class="info-box bg-yellow">
                 <span class="info-box-icon"><i class="fa fa-shopping-bag"></i></span>
                 <div class="info-box-content">
                   <span class="info-box-text">TRX Penjualan Harian</span>
                   <span class="info-box-number"></span>
                 </div>
               </div>
               <div class="info-box bg-yellow">
                 <span class="info-box-icon"><i class="fa fa-shopping-basket"></i></span>
                 <div class="info-box-content">
                   <span class="info-box-text">TRX Penjualan Bulanan</span>
                   <span class="info-box-number"></span>
                 </div>
               </div>
               <div class="info-box bg-yellow">
                 <span class="info-box-icon"><i class="fa fa-exchange"></i></span>
                 <div class="info-box-content">
                   <span class="info-box-text">Retur Penjualan</span>
                   <span class="info-box-number"></span>
                 </div>
               </div>
             </div>
             <!-- /.col -->
           </div>
           <!-- /.row -->
         </div>
       </div>
       <!-- /.box -->
     </div>
     <!-- /.col -->
   </div>
 </section>
 <!-- /.content -->
<!-- /.content-wrapper -->