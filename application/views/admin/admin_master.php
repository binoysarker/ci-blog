<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Admin | Home</title>
  <!-- Bootstrap core CSS-->
  <?= link_tag('admin_asset/vendor/bootstrap/css/bootstrap.min.css') ?>
  <!-- Page level plugin CSS-->
  <?= link_tag('admin_asset/vendor/datatables/dataTables.bootstrap4.css') ?>
  <!-- Custom fonts for this template-->
  <?= link_tag('admin_asset/vendor/font-awesome/css/font-awesome.min.css') ?>
  <!-- Custom styles for this template-->
  <?= link_tag('admin_asset/css/sb-admin.css') ?>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="<?= base_url('/admin') ?>">Admin Panel</a>
    <a class="navbar-brand" href="<?= base_url('/') ?>">Visit Website</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.html">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Category" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Category</span>
          </a>
          <ul class="sidenav-second-level collapse" id="Category">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
              <a class="nav-link" href="<?= base_url('/add-category') ?>">
                <i class="fa fa-fw fa-area-chart"></i>
                <span class="nav-link-text">Add Category</span>
              </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
              <a class="nav-link" href="<?= base_url('/manage-category') ?>">
                <i class="fa fa-fw fa-area-chart"></i>
                <span class="nav-link-text">Manage Category</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Post" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Post</span>
          </a>
          <ul class="sidenav-second-level collapse" id="Post">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
              <a class="nav-link" href="<?= base_url('/add-post') ?>">
                <i class="fa fa-fw fa-table"></i>
                <span class="nav-link-text">Add Posts</span>
              </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
              <a class="nav-link" href="<?= base_url('/manage-post') ?>">
                <i class="fa fa-fw fa-table"></i>
                <span class="nav-link-text">Manage Posts</span>
              </a>
            </li>
          </ul>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <!-- user name view section -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="userDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <!-- show use information -->
            <span ><?= $this->session->userdata('admin_name'); ?></span>
          </a>
          <div class="dropdown-menu" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="<?= base_url('/logout') ?>" data-toggle="modal" data-target="#exampleModal">
              <i class="fa fa-fw fa-sign-out"></i>Logout</a>
            </a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <?= $admin_content ?>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="<?= base_url('/logout') ?>">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('admin_asset/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('admin_asset/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('admin_asset/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
    <!-- Page level plugin JavaScript-->
    <script src="<?= base_url('admin_asset/vendor/chart.js/Chart.min.js') ?>"></script>
    <script src="<?= base_url('admin_asset/vendor/datatables/jquery.dataTables.js') ?>"></script>
    <script src="<?= base_url('admin_asset/vendor/datatables/dataTables.bootstrap4.js') ?>"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('admin_asset/js/sb-admin.min.js')  ?>"></script>
    <!-- Custom scripts for this page-->
    <script src="<?= base_url('admin_asset/js/sb-admin-datatables.min.js') ?>"></script>
    <script src="<?= base_url('admin_asset/js/sb-admin-charts.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('admin_asset/ckeditor/ckeditor.js') ?>"></script>
    <script type="text/javascript">
      document.addEventListener( 'DOMContentLoaded',function()
      {
       CKEDITOR.replace( 'editor' ); 
      });
    </script>
  </div>
</body>

</html>