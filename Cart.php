<?php
require('php/class.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cosmo Dumplings</title>
  <meta name="description" content="Cosmo Johannesburg Dumplings" />
  <meta name="keywords" content="Dumplings, Cosmo, Food" />
  <meta name="author" content="Sipho Maswanganye" />
  <!-- Favicons (created with http://realfavicongenerator.net/)-->
  <link rel="apple-touch-icon" sizes="57x57" href="img/favicons/apple-touch-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="img/favicons/apple-touch-icon-60x60.png">
  <link rel="icon" type="image/png" href="img/favicons/favicon-32x32.png" sizes="32x32">
  <link rel="icon" type="image/png" href="img/favicons/favicon-16x16.png" sizes="16x16">
  <link rel="manifest" href="img/favicons/manifest.json">
  <link rel="shortcut icon" href="img/favicons/favicon.ico">
  <meta name="msapplication-TileColor" content="#00a8ff">
  <meta name="msapplication-config" content="img/favicons/browserconfig.xml">
  <meta name="theme-color" content="#ffffff">
  <!-- Normalize -->
  <link rel="stylesheet" type="text/css" href="css/normalize.css">
  <!-- Bootstrap -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <!-- Owl -->
  <link rel="stylesheet" type="text/css" href="css/owl.css">
  <!-- Animate.css -->
  <link rel="stylesheet" type="text/css" href="css/animate.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.1.0/css/font-awesome.min.css">
  <!-- Elegant Icons -->
  <link rel="stylesheet" type="text/css" href="fonts/eleganticons/et-icons.css">
  <!-- Main style -->
  <link rel="stylesheet" type="text/css" href="css/cardio.css">
</head>

<body>
<div class="preloader">
  <img src="img/loader.gif" alt="Preloader image">
</div>

<?php include('menu.php'); ?>

<section id="contact" class="section">
  <div class="container">
    <div class="row title text-center">
      <h2 class="margin-top white">Your Shopping Cart Basket Status</h2>
      <h4 class="light white">Making orders easy and fast!</h4>
      <?php
      if(isset($_SESSION['message']))
      {
        if(strtolower($_SESSION['messageStatus']) == 'ok')
        {
          echo '<div id="contact-success" class="alert alert-success">
                    <span class="message">'.$_SESSION['message'].'</span>
                  </div>';
        }
        else
        {
          echo '<div id="contact-error" class="alert alert-danger">
                    <span class="message">'.$_SESSION['message'].'</span>
                  </div>';
        }
        sessionMessages();
      }
      ?>
    </div>
    <div class="row ">
      <div class="col-md-6 col-md-offset-3 text-center">
        <div class="well well-lg">
          <?php
          $response = $Class->getClientCart($_SESSION['client_session']['id']);
          if($response['status']=='true')
          {
            if(!empty($response['results']))
            {
              var_dump($response['results']);
              foreach($response['results'] as $items)
              {
                
              }
            }
            else
            {
              echo "There's nothing to show. Order something first";
            }
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabelLogin" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content modal-popup">
      <a href="#" class="close-link" data-dismiss="modal"><i class="icon_close_alt2"></i></a>
      <h3 class="white">Login</h3>
      <form action="actions.php" method="post" class="popup-form">
        <input type="hidden" name="action" value="login" />
        <input type="text" name="email" class="form-control form-white" placeholder="email address">
        <input type="password" name="password" class="form-control form-white" placeholder="password">
        <button type="submit" class="btn btn-submit">Login</button>
      </form>
      <p>Not registered? <a href="register.php">Click Here</a></p>
      <p>Forgot Password? <a href="register.php">Click Here</a></p>
    </div>
  </div>
</div>

<?php include('footer.php'); ?>

<!-- Holder for mobile navigation -->
<div class="mobile-nav">
  <ul>
  </ul>
  <a href="#" class="close-link"><i class="arrow_up"></i></a>
</div>
<!-- Scripts -->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/typewriter.js"></script>
<script src="js/jquery.onepagenav.js"></script>
<script src="js/main.js"></script>

</body>
</html>