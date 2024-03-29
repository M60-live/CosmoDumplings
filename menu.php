<nav class="navbar">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img src="img/logo.png" data-active-url="img/logo.png" width="80px" alt=""></a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right main-nav">
        <li><a href="index.php#intro">Home</a></li>
        <li><a href="index.php#services">Service</a></li>
        <li><a href="index.php#pricing">Pricing</a></li>
        <li><a href="index.php#contact">Contact Us</a></li>
        <?php if(!isset($_SESSION['client_session']['id'])){ ?>
          <li><a href="#" data-toggle="modal" data-target="#modalLogin" class="btn btn-blue">Login</a></li>
          <li><a href="register.php" class="btn btn-blue">Register</a></li>
        <?php }else{ ?>
          <li><a href="Orders.php">Orders</a></li>
          <li><a href="Cart.php"><span class="fa fa-shopping-cart"></span> <span class="badge">0</span></a></li>
          <li><a href="logout.php">Logout</a></li>
        <?php } ?>
      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container-fluid -->
</nav>