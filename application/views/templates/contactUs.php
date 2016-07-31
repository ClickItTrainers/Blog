<!DOCTYPE html>
<html>

<head lang="es">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title><?php echo $title ?></title>
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">
</head>
	<body style="padding-top:20px;">

		<div class="container">
		<div class="row">
	      <div class="col-md-6 col-md-offset-3">
	        <div class="well well-sm">
	          <form class="form-horizontal" action="<?php echo base_url() ?>index.php/Home/send_mail" method="post">
	          <fieldset>
	            <legend class="text-center">Contact us</legend>
	    
	            <!-- Name input-->
	            <div class="form-group">
	              <label class="col-md-3 control-label" for="email">Your E-mail</label>
	              <div class="col-md-9">
	                <input id="email" name="email" type="text" placeholder="Your email" class="form-control" value="<?php echo set_value('email'); ?>">
	                <span class="text-danger"><?php echo form_error('email'); ?></span>
	              </div>
	            </div>
	    
	            <!-- Email input-->
	            <div class="form-group">
	              <label class="col-md-3 control-label" for="subject">Subject</label>
	              <div class="col-md-9">
	                <input id="subject" name="subject" type="text" placeholder="Subject" class="form-control" value="<?php echo set_value('subject'); ?>">
	                <span class="text-danger"><?php echo form_error('subject')?></span>
	              </div>
	            </div>
	    
	            <!-- Message body -->
	            <div class="form-group">
	              <label class="col-md-3 control-label" for="message">Your message</label>
	              <div class="col-md-9">
	                <textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5" style="resize: none;"></textarea>
	                <span class="text-danger"><?php echo form_error('message')?></span>
	              </div>
	            </div>
	    
	            <!-- Form actions -->
	            <div class="form-group">
	              <div class="col-md-12 text-right">
	                <button type="submit" class="btn btn-primary">Submit</button>
	              </div>
	            </div>
	          </fieldset>
	          </form>
	          <a class="btn btn-primary" href="<?php echo base_url(); ?>" role="button">Back</a>
	        </div>
	      </div>
		</div>
	</div>

	</body>
</html>