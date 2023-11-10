<!DOCTYPE html>
<html lang="en">

<head>
  <title>PegiOlahraga</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  
  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url();?>assets_user/fonts/icomoon/style.css">

  <link rel="stylesheet" href="<?php echo base_url();?>assets_user/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets_user/css/jquery-ui.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets_user/css/owl.carousel.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets_user/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets_user/css/owl.theme.default.min.css">

  <link rel="stylesheet" href="<?php echo base_url();?>assets_user/css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="<?php echo base_url();?>assets_user/css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="<?php echo base_url();?>assets_user/fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="<?php echo base_url();?>assets_user/css/aos.css">
  <link href="css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="<?php echo base_url();?>assets_user/css/style.css">



</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

      <div class="container-fluid">
        <div class="d-flex align-items-center">
          <div class="site-logo"><a href="index">PegiOlahraga<span>.</span> </a></div>
          <div class="ml-auto">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="dashboard" class="nav-link">Home</a></li>
                <li><a href="user" class="nav-link">Fields</a></li>
                <li><a href="#schedule-section" class="nav-link">Schedule</a></li>
                <li><a href="#trainer-section" class="nav-link">Trainer</a></li>
                <li><a href="<?php echo base_url();?>index.php/login_user/logout" class="nav-link">Logout</a></li>
                <li><a href="<?php echo base_url();?>index.php/login_user" class="nav-link">Sign In/Up</a></li>
              </ul>
            </nav>
            <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle float-right"><span class="icon-menu h3"></span></a>
          </div>

        </div>
      </div>

    </header>

    <?php
$this->load->view($konten);
?>

    
    <footer class="footer-section bg-dark">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h3 class="text-white">About Workout</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam facere optio eligendi.</p>
          </div>

          <div class="col-md-3 ml-auto">
            <h3 class="text-white">Links</h3>
            <ul class="list-unstyled footer-links">
              <li><a href="dashboard">Home</a></li>
              <li><a href="user">Fields</a></li>
              <li><a href="#">Schedule</a></li>
              <li><a href="login_user">Login</a></li>
            </ul>
          </div>

          <div class="col-md-4">
            <h3 class="text-white">Subscribe</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus, odio beatae accusantium.
            </p>
            <form action="#">
              <div class="d-flex mb-5">
                <input type="text" class="form-control rounded-0" placeholder="Email">
                <input type="submit" class="btn btn-primary rounded-0" value="Subscribe">
              </div>
            </form>
          </div>

        </div>

        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class=" pt-5">
              <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;
            <script data-cfasync="false" src="<?php echo base_url();?>assets_user/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
            <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with
            <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com"
              target="_blank">Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
            </div>
          </div>

        </div>
      </div>
    </footer>



  </div>
  <!-- .site-wrap -->

  <script src="<?php echo base_url();?>assets_user/js/jquery-3.3.1.min.js"></script>
  <script src="<?php echo base_url();?>assets_user/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?php echo base_url();?>assets_user/js/jquery-ui.js"></script>
  <script src="<?php echo base_url();?>assets_user/js/popper.min.js"></script>
  <script src="<?php echo base_url();?>assets_user/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url();?>assets_user/js/owl.carousel.min.js"></script>
  <script src="<?php echo base_url();?>assets_user/js/jquery.stellar.min.js"></script>
  <script src="<?php echo base_url();?>assets_user/js/jquery.countdown.min.js"></script>
  <script src="<?php echo base_url();?>assets_user/js/bootstrap-datepicker.min.js"></script>
  <script src="<?php echo base_url();?>assets_user/js/jquery.easing.1.3.js"></script>
  <script src="<?php echo base_url();?>assets_user/js/aos.js"></script>
  <script src="<?php echo base_url();?>assets_user/js/jquery.fancybox.min.js"></script>
  <script src="<?php echo base_url();?>assets_user/js/jquery.sticky.js"></script>
  <script src="<?php echo base_url();?>assets_user/js/jquery.mb.YTPlayer.min.js"></script>




  <script src="<?php echo base_url();?>assets_user/js/main.js"></script>

</body>

</html>