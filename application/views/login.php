<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>KJSCE Feedback | Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="<?=base_url();?>assets/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url();?>icon/fontawesome/css/font-awesome.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url();?>icon/ionicon/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url();?>dist/css/login_form.css">

</head>
<body class="hold-transition login-page set-full-height">
<div class="login-box">
  <!-- <div class="login-logo">
    <a href="index.php"><b>KJSCE Feedback</b></a>
  </div> -->
  <!-- /.login-logo -->

    <?php $attr = array('name' => 'form1','method' => 'POST');
              echo form_open('ctrl_login/check',$attr); ?>
        <div class="form-group has-feedback">
            <div class="row">
                <div class="col-4">
                  <!-- Admin -->
                  <label class="custom-radio-btn">
                    <input type="radio" name="per" id="per" value="admin" />
                    <span class="custom-radio-outer">
                      <span class="custom-radio-inner"></span>
                    </span>
                    Admin
                  </label>
                </div>

                  <!-- Student -->
                <div class="col-4">
                  <label class="custom-radio-btn">
                    <input type="radio" name="per" id="per" value="student" />
                    <span class="custom-radio-outer">
                      <span class="custom-radio-inner"></span>
                    </span>
                    Student
                  </label>
                </div>
                  <!-- <label for="per">Student</label>
                  <input type="radio" id="per" name="per" value="student"> -->

                  <!-- <label for="per">Admin</label> -->
                  <!-- <input type="radio" id="per" name="per" value="admin" checked> -->

                  <!-- Faculty -->
                <div class="col-4">
                  <label class="custom-radio-btn">
                    <input type="radio" name="per" id="per" value="faculty" />
                    <span class="custom-radio-outer">
                      <span class="custom-radio-inner"></span>
                    </span>
                    Faculty
                  </label>
                </div>

                  <!-- <label for="per">Faculty</label>
                  <input type="radio" id="per" name="per" value="faculty"> -->
            </div>
      <div class="title text-center" style="padding-top: 2rem; padding-bottom: 1.3rem;">
        <p class="h4 font-weight-bold">Enter your credentials</p>
      </div>
      <br>
      <div class="group username">
			 <input type="text" id="username" name="username" class="text-dark" autocomplete="off" required>
       <span class="highlight"></span>
       <span class="bar"></span>
			<label>Username</label>
		</div>
		<div class="group password">
			<input type="password" id="password" name="password" class="text-dark" required>
      <span class="highlight"></span>
      <span class="bar"></span>
			<label>Password</label>
		</div>
	  </div>
      <div class="row text-center">
        <div class="col-8">
          <b><?php echo $error ?></b>
        </div>
        
        <button type="submit" name="login" class="button buttonBlue font-weight-bold mx-auto">Login
			    <div class="ripples buttonRipples">
            <span class="ripplesCircle"></span>
          </div>
		    </button>
        <!-- /.col -->
      </div>
    <div class="text-center">
      <a href="<?php echo base_url();?>index.php/Ctrl_login/load_forgot_password" class="display-5" style="color: #303F9F;">I forgot my password</a><br>
    </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.1.4 -->
<script src="<?=base_url();?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>

<script src="<?=base_url();?>dist/js/login_form.js"></script>
</body>
</html>
