<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin - Start Bootstrap Template</title>
  <!-- Bootstrap core CSS-->
  <?= link_tag('admin_asset/vendor/bootstrap/css/bootstrap.min.css') ?>
  <!-- Custom fonts for this template-->
  <?= link_tag('admin_asset/vendor/font-awesome/css/font-awesome.min.css') ?>
  <!-- Custom styles for this template-->
  <?= link_tag('admin_asset/css/sb-admin.css') ?>
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <?php if ($message = $this->session->userdata('message')): ?>
          <!-- display error message -->
          <div class="alert alert-danger" role="alert">
            <strong>Oh snap!</strong><?= $message; $this->session->unset_userdata('message') ?>
          </div>
        <?php endif ?>
        <?php if ($message = $this->session->userdata('success_message')): ?>
          <div class="alert alert-success" role="alert">
            <strong>Well done!</strong> <?= $message; $this->session->unset_userdata('success_message') ?>
          </div>
        <?php endif ?>

        <?= form_open('/login-check'); ?>
          <div class="form-group">
            <label for="email_address">Email address</label>
            <input class="form-control" id="email_address" name="email_address" type="email" aria-describedby="emailHelp" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" id="exampleInputPassword1" name="password" type="password" placeholder="Password">
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember Password</label>
            </div>
          </div>
          <?= form_submit(['class'=>'btn btn-primary btn-block','type'=>'submit','value'=>'Login']); ?>
        
        <div class="text-center">
          <a class="d-block small mt-3" href="register.html">Register an Account</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>
        
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('admin_asset/vendor/jquery/jquery.min.js') ?>"></script>
  <script src="<?= base_url('admin_asset/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('admin_asset/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
</body>

</html>