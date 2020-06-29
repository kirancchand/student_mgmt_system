<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>

  <div class="register-box-body">

    <p class="login-box-msg">Register a new membership</p>

     <form method="post" action="<?php echo site_url('indexoption/register'); ?>">  
      <div class="form-group has-feedback">
               <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First name" autofocus="autofocus">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
                          <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last name" >
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" id="email" name="email" class="form-control" placeholder="Email ID" >
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
      <div class="col-xs-12">
          <select  id="f_utype_id" name="f_utype_id"  class="form-control" style="width: 100%;">
          <option selected="selected" value=''>Please Select UserType</option>
          <?php
            foreach ($usertype as $key => $value)
            {
          ?>
            <option value='<?php echo $value['utype_id']; ?>'><?php echo $value['usertype'] ;?></option>
          <?php
            }
          ?>
          </select>
      </div>
      </div>
      <br/>
       <div class="row">
      <div class="col-xs-12">
          <select  id="f_crse_id" name="f_crse_id"  class="form-control" style="width: 100%;">
          <option selected="selected" value=''>Please Select Course</option>
          <?php
            foreach ($course as $key => $value)
            {
          ?>
            <option value='<?php echo $value['crse_id']; ?>'><?php echo $value['crse_name'] ;?></option>
          <?php
            }
          ?>
          </select>
      </div>
      </div>
      <br/>
      <div class="row">
      <div class="col-xs-12">
          <select  id="f_sem_id" name="f_sem_id"  class="form-control" style="width: 100%;">
          <option selected="selected" value=''>Please Select Semester</option>
          <?php
            foreach ($semester as $key => $value)
            {
          ?>
            <option value='<?php echo $value['sem_id']; ?>'><?php echo $value['semester_name'] ;?></option>
          <?php
            }
          ?>
          </select>
      </div>
      </div>
      <br/>
      <div class="row">
      <div class="col-xs-12">
          <select  id="f_year_id" name="f_year_id"  class="form-control" style="width: 100%;">
          <option selected="selected" value=''>Please Select Year of Joining</option>
          <?php
            foreach ($year as $key => $value)
            {
          ?>
            <option value='<?php echo $value['year_id']; ?>'><?php echo $value['year'] ;?></option>
          <?php
            }
          ?>
          </select>
      </div>
      </div>
            <br/>
      <div class="form-group has-feedback">
      <input type="text" id="admn_no" name="admn_no" class="form-control" placeholder="admission No" >
      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" id="emp_code" name="emp_code" class="form-control" placeholder="employee code" >
         <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" >
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
       <input type="password" name="cpassword" id="confirmPassword" class="form-control" placeholder="Confirm password" >
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      
      
      

      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> I agree to the <a href="#">terms</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
    </div>

    <a href="login.html" class="text-center">I already have a membership</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url(); ?>public/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>public/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>public/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
