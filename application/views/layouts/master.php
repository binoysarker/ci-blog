<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
 ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Clean Blog - Start Bootstrap Theme</title>

    <!-- Bootstrap core CSS -->
    <?= link_tag('front_end/vendor/bootstrap/css/bootstrap.min.css') ?>

    <!-- Custom fonts for this template -->
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <?= link_tag('front_end/css/clean-blog.min.css') ?>
    <?= link_tag('front_end/css/myCustomcss.css') ?>
    <!-- Bootstrap core JavaScript -->
    <script src="<?= base_url('front_end/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('front_end/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Custom scripts for this template -->
    <script src="<?= base_url('front_end/js/clean-blog.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('front_end/js/lodash.min.js') ?>"></script>

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="<?= base_url('/') ?>">Main Blog</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('/') ?>">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('/about') ?>">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('/posts') ?>">All Posts</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('/contact') ?>">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    

    <!-- Main Content -->
    <?= $main_content  ?>

    <hr>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <ul class="list-inline text-center">
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
            </ul>
            <p class="copyright text-muted">Copyright &copy; Your Website 2018</p>
          </div>
        </div>
      </div>
    </footer>

    


  </body>

</html>