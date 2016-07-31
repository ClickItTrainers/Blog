<!DOCTYPE html>
<html>

<head lang="es">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title><?php echo $title ?></title>
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/profile.css" rel="stylesheet">
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/showProfile.js"></script>
</head>
	<body>

		<style>
			
		</style>

		<div class="container">
			<div class="row profile">
				<div class="col-md-3">
					<div class="profile-sidebar">
						<!-- SIDEBAR USERPIC -->
						<div class="profile-userpic">
							<img src="<?php echo base_url(); ?>assets/images/jordan.jpg" class="img-responsive" alt="">
						</div>
						<!-- END SIDEBAR USERPIC -->
						<!-- SIDEBAR USER TITLE -->
						<div class="profile-usertitle">
							<div class="profile-usertitle-name">
								<?php echo $this->session->userdata('username'); ?>
							</div>
							<div class="profile-usertitle-job">
								Developer
							</div>
						</div>
						<!-- END SIDEBAR USER TITLE -->
						<!-- SIDEBAR BUTTONS -->
						<div class="profile-userbuttons">
							<a href="<?php echo base_url(); ?>">
								<button type="button" class="btn btn-success btn-sm">Home</button>
							<a>
							<a href="<?php echo base_url(); ?>index.php/Security/logout">
								<button type="button" class="btn btn-danger btn-sm">Logout</button>
							</a>
						</div>
						<!-- END SIDEBAR BUTTONS -->
						<!-- SIDEBAR MENU -->
						<div class="profile-usermenu">
							<ul class="nav">
								<li class="active">
									<a href="" onclick="myFunctionO()">
									<i class="glyphicon glyphicon-home"></i>
									Overview </a>
								</li>
								<li>
									<a href="#settings" onclick="myFunctionS()">
									<i class="glyphicon glyphicon-user"></i>
									Account Settings </a>
								</li>
								<li>
									<a href="" target="_blank">
									<i class="glyphicon glyphicon-ok"></i>
									Tasks </a>
								</li>
								<li>
									<a href="">
									<i class="glyphicon glyphicon-flag"></i>
									Help </a>
								</li>
							</ul>
						</div>
					<!-- END MENU -->
					</div>
				</div>
				<div class="col-md-9">
					<div class="profile-content">

						<!-- Overview -->
						<div id="overview" class="container" style="background-color:#E0E0E0; margin: 0 auto; width: 750px; border-radius:5px;">
							<!-- Form Name -->
							<legend>Posts List</legend>


								<?php
									foreach ($posts_arr as $item):
										$url = 'post/' . $item->id_post . '/';
										$url .= url_title(convert_accented_characters($item->title), '-', TRUE);
								?>
										
									<div class="col-sm-6 col-md-4">
									    <div class="thumbnail" style="">
									      <img class="img-responsive" src="<?php echo base_url(); ?>assets/images/hitman.jpg" alt="Loading image failed">
									      <div class="caption">
									        <h3>
									        	<?php echo anchor($url, $item->title) ?>
									        </h3>
									        <p>
									        	<?php echo $item->description ?>
									        </p>

									        <p>
									          <a href="<?php echo base_url() . "index.php/" . $url ?>" class="btn btn-primary" role="button">Read more</a>
									          <span class="glyphicon glyphicon-chevron-right"></span></a>
									        </p>
									      </div>
									    </div>
									  </div>

								<?php
									endforeach;
								?>
						</div>
						<!-- End Overview -->
						
						<!-- Account Settings -->
						<div id="settings" class="container" style="background-color:#E0E0E0; margin: 0 auto; width: 750px; border-radius:5px; display:none;">
							<form class="form-horizontal">
							<fieldset>

							<!-- Form Name -->
							<legend>Account setting</legend>

							<!-- Email input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="textinput">Change Email ID</label>  
							  <div class="col-md-4">
							  <input id="textinput" name="textinput" type="text" placeholder="your current email " class="form-control input-md">
							  <span class="help-block">your new email ID</span>  
							  </div>
							</div>

							<!-- Password input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="passwordinput">New password</label>
							  <div class="col-md-4">
							    <input id="passwordinput" name="passwordinput" type="password" placeholder="new password" class="form-control input-md">
							    
							  </div>
							</div>

							<!-- Password input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="passwordinput">Repeat password</label>
							  <div class="col-md-4">
							    <input id="passwordinput" name="passwordinput" type="password" placeholder="repeat password" class="form-control input-md">
							    
							  </div>
							</div>

							<!-- Birth input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="passwordinput">Birth</label>
							  <div class="col-md-4">
							    <input id="passwordinput" name="passwordinput" type="password" placeholder="your birth" class="form-control input-md">
							    
							  </div>
							</div>

							<!-- Select Basic -->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="selectbasic">Gender</label>
							  <div class="col-md-4">
							    <select id="selectbasic" name="selectbasic" class="form-control">
							      <option value="1">Female</option>
							      <option value="2">Male</option>
							    </select>
							  </div>
							</div>

							<!-- Address Input -->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="textinput">Address</label>  
							  <div class="col-md-4">
							  <input id="textinput" name="textinput" type="text" placeholder="your current address" class="form-control input-md">  
							  </div>
							</div>

							<!-- Cel Input -->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="textinput">Celphone</label>  
							  <div class="col-md-4">
							  <input id="textinput" name="textinput" type="text" placeholder="your current celphone" class="form-control input-md">
							  </div>
							</div>

							<!-- Select Multiple -->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="selectmultiple">What is your job ?</label>
							  <div class="col-md-4">
							    <select id="selectmultiple" name="selectmultiple" class="form-control" multiple="multiple">
							      <option value="1">Student</option>
							      <option value="2">Office employee</option>
							      <option value="3">Nini</option>
							    </select>
							  </div>
							</div>

							<!-- Save Button -->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="singlebutton">Save your data</label>
							  <div class="col-md-4">
							    <button id="singlebutton" name="singlebutton" class="btn btn-success">Save</button>
							  </div>
							</div>

							<!-- Delete Button -->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="singlebutton">Remove my account</label>
							  <div class="col-md-4">
							    <button id="singlebutton" name="singlebutton" class="btn btn-danger">remove</button>
							  </div>
							</div>

							</fieldset>
							</form>

						</div>
					<!-- End Account Settings -->

					</div>
				</div>
			</div>
		</div>

	</body>
</html>