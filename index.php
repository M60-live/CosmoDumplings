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

	<header id="intro">
		<div class="container">
			<div class="table">
				<div class="header-text">
					<div class="row">
            <div class="col col-md-3"></div>
            <div class="col col-md-6">
							<h3 class="light white">Welcome to our delicious world.</h3>
							<h1 class="white typed">Cosmo Dumplings.</h1>
							<span class="typed-cursor">|</span>
              <?php
              if(isset($_SESSION['message']))
              {
                if(strtolower($_SESSION['messageStatus'])==='ok')
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
            <div class="col col-md-3"></div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<section>
		<div class="cut cut-top"></div>
		<div class="container">
			<div class="row intro-tables">
				<div class="col-md-3">
					<div class="intro-table intro-table-first">
						<h5 class="white heading">Our Hours</h5>
						<div class="owl-carousel owl-schedule bottom">
							<div class="item">
								<div class="schedule-row row">
									<div class="col-xs-4">
										<h5 class="regular white">Mon - Fri</h5>
									</div>
									<div class="col-xs-8 text-right">
										<h5 class="white">8:00-s18:00</h5>
									</div>
								</div>
								
								<div class="schedule-row row">
									<div class="col-xs-12">
										<h5 class="regular white">Petunia</h5>
									</div>
									<div class="col-xs-12 text-left">
										<h5 class="white">082 309 6721</h5>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="schedule-row row">
									<div class="col-xs-6">
										<h5 class="regular white">Weekend's</h5>
									</div>
									<div class="col-xs-6 text-right">
										<h5 class="white">8:00-20:00</h5>
									</div>
								</div>
								<div class="schedule-row row">
									<div class="col-xs-6">
										<h5 class="regular white">Online</h5>
									</div>
									<div class="col-xs-6 text-right">
										<h5 class="white">24hrs</h5>
									</div>
								</div>
								<div class="schedule-row row">
									<div class="col-xs-6">
										<h5 class="regular white">Chat</h5>
									</div>
									<div class="col-xs-6 text-right">
										<h5 class="white">8:00-16:00</h5>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="intro-table intro-table-hover">
						<h5 class="white heading hide-hover">Plain Dumpling</h5>
						<div class="bottom">
							
							<h4 class="white heading small-pt" style="font-size: 18px;">R6.00 p/unit <br>R72.00 x 12<br>R180.00 x 30<br>R360.00 x 60</h4>
							<a href="#" class="btn btn-white-fill expand">Buy</a>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="intro-table intro-table-hover">
						<h5 class="white heading hide-hover">Carrot Dumpling</h5>
						<div class="bottom">
							<h4 class="white heading small-pt" style="font-size: 18px;">R6.00 p/unit <br>R72.00 x 12<br>R180.00 x 30<br>R360.00 x 60</h4>
							<a href="#" class="btn btn-white-fill expand">Buy</a>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="intro-table intro-table-hover">
						<h5 class="white heading hide-hover">Sweetcorn Dumpling</h5>
						<div class="bottom">
							<h4 class="white heading small-pt" style="font-size: 18px;">R7.00 p/unit <br>R84.00 x 12<br>R210.00 x 30<br>R420.00 x 60</h4>
							<a href="#" class="btn btn-white-fill expand">Buy</a>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>

	<section id="services" class="section section-padded">
		<div class="container">
			<div class="row text-center title">
				<h2>Services</h2>
				<h4 class="light muted">We render excellent service to all our clients and quality steamed dumplings.</h4>
                Cosmo Dumpling is well established in the bakery industry and service a variety of clients to which they provide homemade steamed dumpling. Our clients these around Cosmo City: Pubs and individuals in the community as well as cater for all events.
			</div>
			<div class="row services">
				<div class="col-md-4">
					<div class="service">
						<div class="icon-holder">
							<img src="img/icons/heart-blue.png" alt="" class="icon">
						</div>
						<h4 class="heading">Our Vision</h4>
						<p class="description">Our vision is to render excellent service to all our clients and to provide in all of their needs with quality steamed dumplings.</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="service">
						<div class="icon-holder">
							<img src="img/icons/guru-blue.png" alt="" class="icon">
						</div>
						<h4 class="heading">We Deliver</h4>
						<p class="description">Anywhere Around Gouteng charging per kilomieter. We can make arrangements to deleiver and or corrier anywhere in around the country.</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="service">
						<div class="icon-holder">
							<img src="img/icons/weight-blue.png" alt="" class="icon">
						</div>
						<h4 class="heading">We're creative</h4>
						<p class="description">We create these home cooked african mouth watering delicacies to your spec and request. </p>
					</div>
				</div>
			</div>
		</div>
		<div class="cut cut-bottom"></div>
	</section>

	<section id="pricing" class="section gray-bg">
		<div class="container">
			<div class="row title text-center">
				<h2 class="margin-top">Dombolo</h2>
				<h4 class="light muted">Taste the dream!</h4>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="team text-center">
						<div class="cover" style="background:url('img/team/team-cover1.jpg'); background-size:cover;">
							<div class="overlay text-center">
								<h3 class="white">R6.00</h3>
								<h5 class="light light-white">Plain / Carrot </h5>
							</div>
						</div>
						<img src="img/team/team1.jpg" alt="Team Image" class="avatar">
						<div class="title">
							<h4>Plain / Carrot</h4>
							<h5 class="muted regular">Best sellers</h5>
						</div>
						<!--<button data-toggle="modal" data-target="#modalOrder" class="btn btn-blue-fill">Buy Now</button>-->
						<button class="btn btn-blue-fill" id="buynow">Buy Now</button>
					</div>
				</div>
				<div class="col-md-4">
					<div class="team text-center">
						<div class="cover" style="background:url('img/team/team-cover1-2.jpg'); background-size:cover;">
							<div class="overlay text-center">
								<h3 class="white">R6.00</h3>
								<h5 class="light light-white">Other flavours</h5>
							</div>
						</div>
						<img src="img/team/team3.jpg" alt="Team Image" class="avatar">
						<div class="title">
							<h4>Other</h4>
							<h5 class="muted regular">Design your own "Dombolo" dumpling and price depends on ingredients</h5>
						</div>
						<a href="#" data-toggle="modal" data-target="#modalOrder" class="btn btn-blue-fill ripple">Buy Now</a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="team text-center">
						<div class="cover" style="background:url('img/team/team-cover1-3.jpg'); background-size:cover;">
							<div class="overlay text-center">
								<h3 class="white">R7.00</h3>
								<h5 class="light light-white">Sweetcorn</h5>
							</div>
						</div>
						<img src="img/team/team2.jpg" alt="Team Image" class="avatar">
						<div class="title">
							<h4>Sweetcorn</h4>
							<h5 class="muted regular">Best African No1 corn</h5>
						</div>
						<a href="#" data-toggle="modal" data-target="#modalOrder" class="btn btn-blue-fill ripple">Buy Now</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="contact" class="section">
		<div class="container">
			<div class="row title text-center">
				<h2 class="margin-top white">Get in touch with us today</h2>
				<h4 class="light white">We are open for new business and very custom orders</h4>
			</div>
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
          <form action="actions.php" method="post" class="popup-form">
            <input type="hidden" name="action" value="contact_form" />
            <input type="text" name="name" class="form-control form-white" placeholder="Full Name" required />
            <input type="email" name="email" class="form-control form-white" placeholder="Email Address" required />
            <input type="text" name="contact" class="form-control form-white" placeholder="Mobile Number" required />
            <textarea class="form-control form-white" rows="5" name="message" placeholder="Message"></textarea>
            <button type="submit" class="btn btn-submit">Send</button>
          </form>
				</div>
        <div class="col-md-2"></div>
			</div>
		</div>
	</section>

	<section class="section section-padded blue-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="owl-twitter owl-carousel">
						<div class="item text-center">
							<i class="icon fa fa-twitter"></i>
							<h4 class="white light">To enjoy the glow of good health, you must exercise.</h4>
							<h4 class="light-white light">#health #training #exercise</h4>
						</div>
						<div class="item text-center">
							<i class="icon fa fa-twitter"></i>
							<h4 class="white light">To enjoy the glow of good health, you must exercise.</h4>
							<h4 class="light-white light">#health #training #exercise</h4>
						</div>
						<div class="item text-center">
							<i class="icon fa fa-twitter"></i>
							<h4 class="white light">To enjoy the glow of good health, you must exercise.</h4>
							<h4 class="light-white light">#health #training #exercise</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

  <!--<div class="modal fade" id="modalOrder" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content modal-popup">
				<a href="#" class="close-link" data-dismiss="modal"><i class="icon_close_alt2"></i></a>
				<h3 class="white">Order Now</h3>
				<form action="actions.php" class="popup-form">
					<input type="text" class="form-control form-white" placeholder="Full Name">
					<input type="text" class="form-control form-white" placeholder="Email Address">
					<div class="dropdown">
						<button id="dLabel" class="form-control form-white dropdown" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Flavour
						</button>
						<ul class="dropdown-menu animated fadeIn" role="menu" aria-labelledby="dLabel">
								<li class="animated lightSpeedIn"><a href="#">Plain</a></li>
								<li class="animated lightSpeedIn"><a href="#">Carrot</a></li>
								<li class="animated lightSpeedIn"><a href="#">Sweetcorn</a></li>
								<li class="animated lightSpeedIn"><a href="#">Other</a></li>
							</ul>
						</ul>
					</div>
					<div class="dropdown">
						<button id="dLabel" class="form-control form-white dropdown" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Quantity
						</button>
						<ul class="dropdown-menu animated fadeIn" role="menu" aria-labelledby="dLabel">
								<li class="animated lightSpeedIn"><a href="#">6</a></li>
								<li class="animated lightSpeedIn"><a href="#">12</a></li>
								<li class="animated lightSpeedIn"><a href="#">30</a></li>
								<li class="animated lightSpeedIn"><a href="#">60</a></li>
							</ul>
						</ul>
					</div>
					<div class="checkbox-holder text-left">
						<div class="checkbox">
							<input type="checkbox" value="None" id="squaredOne" name="check" />
							<label for="squaredOne"><span>I Agree to the <strong>Terms &amp; Conditions</strong></span></label>
						</div>
					</div>
					<button type="submit" class="btn btn-submit">Submit</button>
				</form>
			</div>
		</div>
	</div>-->

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
  <script type="application/javascript">
    $(document).ready(function(){
      $('#buynow').click(function(){

        $.ajax({
          url:'actions.php',
          type:'POST',
          data:{action:'checksession'},
          success:function(data){
            console.log(data);
            if(data.trim()==='OK')
            {
//              $('#modalOrder').modal('show');
              window.location = 'Orders.php';
            }
            else
            {
              $('#modalLogin').modal('show');
            }
          }
        });

      });
    });
  </script>
</body>

</html>