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
        <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/style-responsive.css'); ?>" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="<?php echo base_url('assets/js/html5shiv.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/respond.min.js'); ?>"></script>
        <![endif]-->
    </head>
	<body class="login-body">
		<div class="container">
			<?php echo form_open('auth/login', 'class="form-signin"'); ?>
			
				<div class="form-signin-heading"><img src="<?php echo base_url('assets/img/logo.png'); ?>" alt="e-disposisi"></div>
				<div class="login-wrap">
					<input type="text" class="form-control" placeholder="NIP" name="username" autofocus>
					<input type="password" class="form-control" placeholder="Password" name="password">
					<button class="btn btn-lg btn-danger btn-block" type="submit">
						<i class="icon-signin"></i> Login
					</button>
				</div>		
			<?php echo form_close(); ?>
		</div>

		<script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/jquery.gritter.js'); ?>"></script>
		<script>
			function gritter_alert(message) {
				var unique_id = $.gritter.add({
					text: message,
					sticky: false,
					before_open: function(){
						if($('.gritter-item-wrapper').length == 3)
						{
							return false;
						}
					}
				});
				setTimeout(function(){
					$.gritter.remove(unique_id, {
						fade: true,
						speed: 'slow'
					});
				}, 1500);	
			}
		</script>		
		<?php if($this->session->flashdata('alert')) : ?>
			<script>
				gritter_alert('<?php echo $this->session->flashdata('alert'); ?>');	
			</script>
		<?php endif; ?>		

	</body>
</html>