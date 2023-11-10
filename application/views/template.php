<!doctype html>
<html lang="en">

<head>
	<title>Dashboard | Selamat Datang di Sewa Lapangan</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.css" integrity="sha512-MQXduO8IQnJVq1qmySpN87QQkiR1bZHtorbJBD0tzy7/0U9+YIC93QWHeGTEoojMVHWWNkoCp8V6OzVSYrX0oQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
</head>

<body>
	<div id="wrapper">
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="index.html"><img src="<?php echo base_url(); ?>assets/img/logo-dark.png" alt="Klorofil Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<div class="navbar-btn navbar-btn-right">
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo base_url(); ?>assets/img/user.png" class="img-circle" alt="Avatar"> <span><?php echo $this->session->userdata('name'); ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="<?= base_url('auth/logout') ?>"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>

							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<?php
						if ($this->session->userdata('level') == 'admin') {
						?>
							<li><a href="<?php echo base_url('home'); ?>" class="<?php echo $konten == 'home' ? 'active' : '' ?>"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
							<li><a href="<?php echo base_url('kategori'); ?>" class="<?php echo $konten == 'kategori' ? 'active' : '' ?>"><i class="lnr lnr-list"></i> <span> Kategori Lapangan</span></a></li>
							<li><a href="<?php echo base_url('lapangan'); ?>" class="<?php echo $konten == 'lapangan' ? 'active' : '' ?>"><i class="lnr lnr-book"></i> <span>Lapangan</span></a></li>
							<li><a href="<?php echo base_url('transaksi'); ?>" class="<?php echo $konten == 'transaksi' ? 'active' : '' ?>"><i class="lnr lnr-cart"></i> <span>Transaksi</span></a></li>
							<li><a href="<?php echo base_url('user'); ?>" class="<?php echo $konten == 'user' ? 'active' : '' ?>"><i class="lnr lnr-user"></i> <span> User</span></a></li>
							<li><a href="<?php echo base_url('level'); ?>" class="<?php echo $konten == 'level' ? 'active' : '' ?>"><i class="lnr lnr-user"></i> <span> Level</span></a></li>
						<?php
						} else if ($this->session->userdata('level') == 'manager') {
						?>
							<li><a href="<?php echo base_url('home'); ?>" class="<?php echo $konten == 'home' ? 'active' : '' ?>"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
							<li><a href="<?php echo base_url('kategori'); ?>" class="<?php echo $konten == 'kategori' ? 'active' : '' ?>"><i class="lnr lnr-list"></i> <span> Kategori Lapangan</span></a></li>
							<li><a href="<?php echo base_url('lapangan'); ?>" class="<?php echo $konten == 'lapangan' ? 'active' : '' ?>"><i class="lnr lnr-book"></i> <span>Lapangan</span></a></li>
							<li><a href="<?php echo base_url('transaksi'); ?>" class="<?php echo $konten == 'transaksi' ? 'active' : '' ?>"><i class="lnr lnr-cart"></i> <span>Transaksi</span></a></li>
						<?php
						} else if ($this->session->userdata('level') == 'user') {
						?>
							<li><a href="<?php echo base_url('home'); ?>" class="<?php echo $konten == 'home' ? 'active' : '' ?>"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
							<li><a href="<?php echo base_url('lapangan'); ?>" class="<?php echo $konten == 'lapangan' ? 'active' : '' ?>"><i class="lnr lnr-book"></i> <span>Lapangan</span></a></li>
							<li><a href="<?php echo base_url('transaksi'); ?>" class="<?php echo $konten == 'transaksi' ? 'active' : '' ?>"><i class="lnr lnr-cart"></i> <span>Transaksi</span></a></li>
						<?php
						}
						?>
					</ul>
				</nav>
			</div>
		</div>
		<div class="main">
			<div class="main-content">
				<div class="container-fluid">
					<?php
					$this->load->view($konten);
					?>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; <?php echo date("Y"); ?> </p>
			</div>
		</footer>
	</div>
	<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/scripts/klorofil-common.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.js" integrity="sha512-K/oyQtMXpxI4+K0W7H25UopjM8pzq0yrVdFdG21Fh5dBe91I40pDd9A4lzNlHPHBIP2cwZuoxaUSX0GJSObvGA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>
