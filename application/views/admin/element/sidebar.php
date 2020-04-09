<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

		<!-- Sidebar user panel (optional) -->
		<!-- search form (Optional) -->
		<!-- /.search form -->

		<!-- Sidebar Menu -->
		<ul class="sidebar-menu">
			<!--<li class="header">HEADER</li>-->
			<!-- Optionally, you can add icons to the links -->
			<li class="<?php if($this->uri->segment(2) == "dashboard"){echo "active";} ?>"><a href="<?php echo site_url('admin/dashboard');?>"><i class="fa fa-dashboard" aria-hidden="true"></i> <span>Dashboard</span></a></li>
			
			<li class="treeview <?php if($this->uri->segment(2) == "admin"){echo "active";} ?>">
				<a href="#"><i class="fa fa-user"></i> <span>Admin</span> <i class="fa fa-angle-left pull-right"></i></a>
				<ul class="treeview-menu">
					<li class="<?php echo is_menu('admin');?>"><a href="<?php echo site_url('admin/admin');?>"><i class="fa fa-list" aria-hidden="true"></i> <span>List Admin</span></a></li>
					<li class="<?php echo is_menu('admin','add');?>"><a href="<?php echo site_url('admin/admin/add');?>"><i class="fa fa-plus-square-o" aria-hidden="true"></i> <span>Add Admin</span></a></li>
				</ul>
			</li>
			
			<li class="treeview <?php if($this->uri->segment(2) == "member"){echo "active";} ?>">
				<a href="#"><i class="fa fa-users"></i> <span>Data Member</span> <i class="fa fa-angle-left pull-right"></i></a>
				<ul class="treeview-menu">
					<li class="<?php echo is_menu('member');?>"><a href="<?php echo site_url('admin/member');?>"><i class="fa fa-list" aria-hidden="true"></i> <span>Data Member</span></a></li>
				</ul>
			</li>
			<li class="treeview <?php if($this->uri->segment(2) == "trip"){echo "active";} ?>">
				<a href="#"><i class="fa fa-database"></i> <span>Data Trip Master</span> <i class="fa fa-angle-left pull-right"></i></a>
				<ul class="treeview-menu">
					<li class="<?php echo is_menu('trip');?>"><a href="<?php echo site_url('admin/trip');?>"><i class="fa fa-list" aria-hidden="true"></i> <span>Data Trip Master</span></a></li>
					<li class="<?php echo is_menu('trip','add');?>"><a href="<?php echo site_url('admin/trip/add');?>"><i class="fa fa-plus-square-o" aria-hidden="true"></i> <span>Tambah Trip Master</span></a></li>
				</ul>
			</li>
			<li class="<?php if($this->uri->segment(2) == "pesanan"){echo "active";} ?>"><a href="<?php echo site_url('admin/pesanan');?>"><i class="fa fa-history" aria-hidden="true"></i> <span>Pesanan</span></a></li>
			<li class="<?php if($this->uri->segment(2) == "laporan"){echo "active";} ?>"><a href="<?php echo site_url('admin/laporan');?>"><i class="fa fa-book" aria-hidden="true"></i> <span>Laporan</span></a></li>
			
		</ul>
		<br />
		<br />
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
