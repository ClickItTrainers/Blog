<!DOCTYPE html>
<html>

<head lang="es">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title><?php echo $title ?></title>
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/login.css" rel="stylesheet">
</head>
	<body>

			<!--Pulling Awesome Font -->
			<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

			<div class="container">
				<div class="row">
					<div class="col-md-offset-5 col-md-3">
						<div class="form-login">

						<form action="<?php echo base_url() ?>index.php/Security/secure_login" method="post">

							<h4>Welcome back.</h4>
							<input type="text" name="username" class="form-control input-sm chat-input" placeholder="username" value="<?php echo set_value('username'); ?>"/>
							<span class="text-danger"><?php echo form_error('username'); ?></span>

							<br>

							<input type="password" name="password" class="form-control input-sm chat-input" placeholder="password" />
							<span class="text-danger"><?php echo form_error('password')?></span>

							</br>
							<input type="hidden" name="token" value="<?php echo $token?>" />

							<div class="wrapper">
								<input type="submit" name="submit" value="Login" class="btn btn-primary btn-md"/>
								<i class="fa fa-sign-in"></i>
							</div>

						</form>

						</div>
					</div>
				</div>
			</div>

		</body>
	</html>