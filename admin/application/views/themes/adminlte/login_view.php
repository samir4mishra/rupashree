<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo base_url(); ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login Panel</title>
  <link rel="stylesheet" href="admin/<?php echo $this->config->item('theme_uri');?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="admin/<?php echo $this->config->item('theme_uri');?>bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="admin/<?php echo $this->config->item('theme_uri');?>bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="admin/<?php echo $this->config->item('theme_uri');?>dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="admin/<?php echo $this->config->item('theme_uri');?>plugins/iCheck/square/blue.css">
  <style>
  /*.login-page, .register-page {
    	background:url(admin/<?php echo $this->config->item('theme_uri');?>custom/website-admin-background.jpg);
		background-size:cover;
	}*/
	.login-logo, .register-logo{ margin-bottom:0;}
	.admin-img img{ height:100px;}
	.login-logo a, .register-logo a {
		color: #0576d8;
		font-weight: bold;
	}
	.login-box a{color: #0576d8;}
	.btn-primary{background: #2576d8;border: none; padding:6px 15px; font-size:15px;}
	.mt10{ margin-top:10px;}
	.login-box .form-control{border: none;border-bottom: #999 1px solid;padding-left: 0;}
	.login-box-body,.register-box-body{ padding:20px 30px;box-shadow: 2px 3px 3px rgba(0,0,0,0.4); -webkit-box-shadow: 2px 3px 3px rgba(0,0,0,0.4); -moz-box-shadow: 2px 3px 3px rgba(0,0,0,0.4); -o-box-shadow: 2px 3px 3px rgba(0,0,0,0.4);}
  </style>
</head>

<body class="hold-transition login-page">


<div class="login-box">
  
  <div class="login-box-body">
        <div class="login-logo">
        	<div class="admin-img">
        		
            </div>    
           <b> Rupashree</b> Admin 
        </div>
  <!-- /.login-logo -->
  <p class="login-box-msg">Provide username and password for login</p>
  <?php echo (isset($error_message)) ? $error_message : "";?>
    <?php echo form_open('admin/Login',array('class' => 'login_form', 'id' => 'login_form','autocomplete'=>'off')); ?>
      <input type="hidden" name="security_code" value="<?php echo hash('sha256',strtoupper($cap['word']).$this->config->item('encryption_key')) ?>">
      <div class="form-group has-feedback">
		<input type="text" class="form-control" name="login_id" value="" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <?php echo form_error('login_id'); ?>
       </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-asterisk form-control-feedback"></span>
       <?php echo form_error('password'); ?>
      </div>
      <div class="form-group has-feedback">
      <div class="row">
      	<div class="col-xs-6">
      		 <?php echo $cap['image']; ?>
      	</div>
		<div class="col-xs-6">
			<input type="text" class="form-control" name="captcha" placeholder="Captcha">
		<?php echo form_error('captcha'); ?>
		</div>
		
      </div>
		
      </div>
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    
    <!-- /.social-auth-links -->

    <p align="center" class="mt10"><a href="#">I forgot my password</a></p>

  </div>
  <!-- /.login-box-body -->
</div>

</body>
</html>
