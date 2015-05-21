<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.png'); ?>">
		<title>e-disposisi</title>
		<link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/css/bootstrap-reset.css'); ?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/css/font-awesome.css'); ?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/css/jquery.gritter.css'); ?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/css/DT_bootstrap.css'); ?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/css/style-responsive.css'); ?>" rel="stylesheet">
		
		<!--[if lt IE 9]>
		<script src="<?php echo base_url('assets/js/html5shiv.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/respond.min.js'); ?>"></script>
		<![endif]-->
	</head>
	<body>
		<section id="container">
			<!--header start-->
			<header class="header white-bg">
				<div class="sidebar-toggle-box">
					<div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
				</div>
				<!--logo start-->
				<a href="<?php echo site_url(); ?>" class="logo"><img src="<?php echo base_url('assets/img/logo.png'); ?>" height="30px" alt="e-disposisi"></a>
				<!--logo end-->
				<div class="horizontal-menu navbar-collapse collapse ">
					<ul class="nav navbar-nav">
						<li class="dropdown">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-hdd"></i> Data Umum <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li>
									<a  href="<?php echo site_url('departements'); ?>">Departemen</a>
								</li>
								<li>
									<a  href="<?php echo site_url('users'); ?>">Pegawai</a>
								</li>
								<li>
									<a  href="<?php echo site_url('positions'); ?>">Jabatan</a>
								</li>
							</ul>
						</li>
						<li class="dropdown">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-paperclip"></i> Atribut Surat <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li>
									<a  href="<?php echo site_url('mail_types'); ?>">Jenis Surat</a>
								</li>
								<li>
									<a  href="<?php echo site_url('mail_classes'); ?>">Klasifikasi Surat</a>
								</li>
								<li>
									<a  href="<?php echo site_url('mail_levels'); ?>">Derajat Surat</a>
								</li>
								<li>
									<a  href="<?php echo site_url('mail_origins'); ?>">Asal Surat</a>
								</li>
								<li>
									<a  href="<?php echo site_url('mail_shelves'); ?>">Rak Surat</a>
								</li>
							</ul>
						</li>
						<li class="dropdown">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-envelope"></i> Managemen Surat <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li>
									<a  href="">Surat Masuk</a>
								</li>
								<li>
									<a  href="">Surat Keluar</a>
								</li>
							</ul>
						</li>
						<li class="dropdown">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-file"></i> Pelaporan <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li>
									<a  href="">Surat Masuk</a>
								</li>
								<li>
									<a  href="">Surat Keluar</a>
								</li>
							</ul>
						</li>
						<li class="dropdown">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-cogs"></i> Pengaturan <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li>
									<a href="#">Konfigurasi System</a>
								</li>
							</ul>
						</li>
					</ul>       
				</div>				
				<div class="top-nav ">
					<ul class="nav pull-right top-menu">						
						<!-- user login dropdown start-->
						<li class="dropdown userdata">
							<a data-close-others="true" data-hover="dropdown" data-toggle="dropdown" class="dropdown-toggle" href="#">
								<img src="<?php echo base_url('assets/img/avatar1_small.jpg'); ?>" alt="">
								<span class="username"><?php echo $this->session->userdata('name'); ?></span>
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li>
									<a href="<?php echo site_url('auth/logout'); ?>"><i class=" icon-user"></i> Profil</a>
								</li>
								<li>
									<a href="<?php echo site_url('auth/logout'); ?>"><i class="icon-signout"></i> Keluar</a>
								</li>
							</ul>
						</li>
						<!-- user login dropdown end -->
					</ul>
				</div>
			</header>
			<!--header end-->
			<!--sidebar start-->
			<aside>
				<div id="sidebar"  class="nav-collapse ">
					<!-- sidebar menu start-->
					<ul class="sidebar-menu" id="nav-accordion">
                        <li>
                            <a  href="inbox.html">
                                <i class="icon-star"></i>
                                <span>Disposisi </span>
                                <span class="label label-danger pull-right mail-info">2</span>
                            </a>
                        </li>
                        <li>
                            <a  href="inbox.html">
                                <i class="icon-mail-forward"></i>
                                <span>Surat Masuk</span>
                                <span class="label label-danger pull-right mail-info">2</span>
                            </a>
                        </li>
                        <li>
                            <a  href="inbox.html">
                                <i class=" icon-mail-reply"></i>
                                <span>Surat Keluar</span>
                                <span class="label label-danger pull-right mail-info">2</span>
                            </a>
                        </li>
					</ul>
					<!-- sidebar menu end-->
				</div>
			</aside>
			<!--sidebar end-->
			<!--main content start-->
			<section id="main-content">
				<section class="wrapper site-min-height">
					<!--state overview start-->
					<div class="row state-overview">
						<div class="col-lg-3 col-sm-6">
							<section class="panel">
								<div class="symbol terques">
									<i class="icon-download-alt"></i>
								</div>
								<div class="value">
									<h1 class="count">
										0
									</h1>
									<p>Surat Masuk</p>
								</div>
							</section>
						</div>
						<div class="col-lg-3 col-sm-6">
							<section class="panel">
								<div class="symbol red">
									<i class="icon-upload-alt"></i>
								</div>
								<div class="value">
									<h1 class=" count2">
										0
									</h1>
									<p>Surat Keluar</p>
								</div>
							</section>
						</div>
						<div class="col-lg-3 col-sm-6">
							<section class="panel">
								<div class="symbol yellow">
									<i class="icon-user"></i>
								</div>
								<div class="value">
									<h1 class=" count3">
										0
									</h1>
									<p>Pegawai</p>
								</div>
							</section>
						</div>
						<div class="col-lg-3 col-sm-6">
							<section class="panel">
								<div class="symbol blue">
									<i class="icon-bar-chart"></i>
								</div>
								<div class="value">
									<h1 class=" count4">
									0
									</h1>
									<p>Total Profit</p>
								</div>
							</section>
						</div>
					</div>
					<!--state overview end-->
					<!-- page start-->
					<div class="row">
					   <?php echo $content; ?>
					</div>
					<!-- page end-->
				</section>
			</section>
			<!--main content end-->
			<!--footer start-->
			<footer class="site-footer">
				<div class="text-center">
					2015 &copy; UPTD Hujan Buatan BPPT.
					<a href="#" class="go-top"><i class="icon-angle-up"></i> </a>
				</div>
			</footer>
			<!--footer end-->
		</section>
		
		<!--myModal-->
		<div class="modal" id="myModal"></div>
		
		<script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/jquery.dcjqaccordion.2.7.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/jquery.gritter.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/jquery.scrollTo.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/jquery.nicescroll.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/respond.min.js'); ?>" ></script>
		<script src="<?php echo base_url('assets/js/common-scripts.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/count.js'); ?>"></script>
		<?php if($script) echo $script; ?>
		<?php if($this->session->flashdata('alert')) : ?>
		<script>
			gritter_alert('<?php echo $this->session->flashdata('alert'); ?>');
		</script>
		<?php endif; ?>
	</body>
</html>
