<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>KolGold | Sign Up</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/admin_css.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page "  >
<div class="login-box">
  <!-- <div class="login-logo ">
    <b class="bg-light p-3">User Login</b>
  </div> -->
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Login </p>
      <form  role="form" action="" method="post">
        <div class="row">
          <div class="col-md-6">
            <label>First Name*</label>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="customer_fname" id="customer_fname" placeholder="First Name" required>
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
          </div>
          <div class="col-md-6">
            <label>Last Name*</label>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="customer_lname" id="customer_lname" placeholder="Last Name" required>
            <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
          </div>
          </div>
        </div>

      <label>Mobile No.*</label>
    <div class="input-group mb-3">
      <input type="number" class="form-control" name="customer_mobile" id="customer_mobile" placeholder="Mobile Number" required>
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-mobile"></span>
        </div>
      </div>
    </div>

    <label>Email</label>
    <div class="input-group mb-3">
      <input type="email" class="form-control" name="customer_email" id="customer_email" placeholder="Email">
      <div class="input-group-append">
        <div class="input-group-text">
        <span class="fas fa-envelope"></span>
        </div>
      </div>
    </div>
    <label>Password*</label>
    <div class="input-group mb-3">
      <input type="password" class="form-control" name="customer_password" id="customer_password" placeholder="Password" required>
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-lock"></span>
        </div>
      </div>
    </div>
    <span class="text-red"> <?php echo form_error('password'); ?> </span>

        <div class="row">
          <div class="col-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign Up</button>
          </div>
          <div class="col-8">
            <p style="font-size:14px;">Existing Customer  <a href="<?php echo base_url(); ?>Website/login">Log In ?</a> </p>
          </div>
        </div>
      </form>
      <!-- /.social-auth-links -->

      <div class="alert alert-danger p-2 msg_invalid" style="display:none" role="alert">
        Invalid Information
      </div>
    </div>
    <!-- /.login-card-body -->
  </div>




</div>
<!-- /.login-box -->
<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<script type="text/javascript">
<?php if($this->session->flashdata('msg')){ ?>
  $(document).ready(function(){
    // alert();
    $('.msg_invalid').show().delay(5000).fadeOut();
  });
<?php } ?>
</script>
</body>
</html>
