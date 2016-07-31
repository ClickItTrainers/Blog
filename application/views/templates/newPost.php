<!DOCTYPE html>
<html>

<head lang="es">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title><?php echo $title ?></title>
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">
</head>
	<body>

		<form class="form-horizontal" role="form" method="post" action="<?php echo base_url() ?>index.php/Home/insert_post">
			<div class="form-group">
				<label class="col-sm-2 control-label">Title</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="title" placeholder="Post Title" value="<?php echo set_value('title'); ?>">
					<span class="text-danger"><?php echo form_error('title'); ?></span>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Description</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="description" placeholder="Short description..." value="<?php echo set_value('description'); ?>">
					<span class="text-danger"><?php echo form_error('description'); ?></span>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Content</label>
				<div class="col-sm-10">
					<textarea class="form-control" rows="4" name="content" style="resize: none;"></textarea>
					<span class="text-danger"><?php echo form_error('content'); ?></span>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-10 col-sm-offset-2">
					<input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-10 col-sm-offset-2">
					<! Will be used to display an alert to the user>
				</div>
			</div>
		</form>

	</body>
</html>