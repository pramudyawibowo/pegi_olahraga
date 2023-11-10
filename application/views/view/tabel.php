<!DOCTYPE html>
<html lang="en">

<head>
  <title>Peminjaman</title>
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
  <link href="<?php echo base_url();?>assets_user/css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">

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

    <div class="site-section" id="classes-section">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-8  section-heading">
            <span class="subheading">Sport Fields</span>
            <h2 class="heading mb-3">Our Fields</h2>
            <p>Helping you exercise by making it easier to book a field.</p>
          </div>
        </div>
        
        <div class="row">
          <div class="col-lg-6">

                <?php
                foreach($lapangan as $a){
                echo'
            <div class="class-item d-flex align-items-center">
              <a href="single.html" class="class-item-thumbnail">
              <img src="'.base_url().'assets/images/'.$a->foto_lapangan.'" alt="Image">
                  </a>
                  <div class="class-item-text">
                    <span>'.$a->jam_sewa.'</span>
                    <h2><a href="single.html">'.$a->nama_lapangan.'</a></h2>,
                    <span>'.$a->harga_sewa.'</span>
              </div>
            ';}
            ?>
            </div>


          
          </div>
        </div>
      </div>
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