<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Log in / Sign up</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body class="">
    <!-- Header -->
    <?php
      include_once("./header.php");
     ?>
    <div class="container container-padding">
    	<div class="row container-height div-center">
        <div class="col-md-6 col-md-offset-3 "><!-- login / register DIV start-->
          <?php
          if (isset($_SESSION['u_id'])) {
            echo '<div><form  action="includes/logout.inc.php" method="POST">
                    <h3 style="color: black; text-align: center;">Jeigu norite atsijungti spauskite Logout</h3>
                    <button class="btn-bg-color form-control btn btn-register" type="submit" name="submit">logout</button>
                    <a style="text-align: center;" href="index.php"><h3>arba spauskite grizti i pagrindini puslapi</h3></a>
                  </form></div>';
          } else {
            echo '<div class="panel panel-login">
            					 <div class="panel-heading">
            						<div class="row">
            							<div class="col-xs-6">
            								<a href="#" class="active" id="login-form-link">Login</a>
            							</div>
            							<div class="col-xs-6">
            								<a href="#" id="register-form-link">Register</a>
            							</div>
            						</div>
            						<hr>
            					</div><!-- login register DIV end-->

            					 <div class="panel-body"> <!-- input field DIV start -->
            						<div class="row">

            							<div class="col-lg-12">
            								<form id="login-form" action="includes/login.inc.php" method="POST" role="form"><!--  login form start -->
            									<div class="form-group">
            										<input type="text" name="uid" id="username" tabindex="1" class="form-control" placeholder="Username/E-mail" value="">
            									</div>
            									<div class="form-group">
            										<input type="password" name="pwd" id="password" tabindex="2" class="form-control" placeholder="Password">
            									</div>
            									<div class="form-group">
            										<div class="row">
            											<div class="col-sm-6 col-sm-offset-3">
            												<input type="submit" name="submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
            											</div>
            										</div>
            									</div>
            								</form><!--  login form end -->
            								 <form id="register-form" action="includes/signup.inc.php" method="POST" role="form"><!-- registration form start  -->
            									<div class="form-group">
            										<input type="text" name="first" id="username" tabindex="1" class="form-control" placeholder="Firstname">
            									</div>
            									<div class="form-group">
            										<input type="text" name="last" id="username" tabindex="1" class="form-control" placeholder="Lastname">
            									</div>
            									<div class="form-group">
            										<input type="text" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address">
            									</div>
            									<div class="form-group">
            										<input type="text" name="uid" id="password" tabindex="2" class="form-control" placeholder="Username">
            									</div>
            									<div class="form-group">
            										<input type="password" name="pwd" id="confirm-password" tabindex="2" class="form-control" placeholder="Password">
            									</div>
            									<div class="form-group">
            										<div class="row">
            											<div class="col-sm-6 col-sm-offset-3">
            												<input type="submit" name="submit" id="register-submit" tabindex="4" class="btn-bg-color form-control btn btn-register" value="Register Now">
            											</div>
            										</div>
            									</div>
            								</form><!-- registration form end  -->
            							</div>
            						</div>
            					</div><!-- input field DIV end -->
            				</div>';
          }
          ?>
      </div><!-- login / register DIV end-->
		</div>
    <?php
    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if (strpos($fullUrl, "signup=empty") == true) {
        echo "<h2 style='color: red; text-align: center;'>Jus neuzpildete visu lauku!</h2>";
        exit();
    } elseif (strpos($fullUrl, "signup=char") == true) {
        echo "<h2 style='color: red; text-align: center;'>galima naudoti tik raides ir skaicius!</h2>";
        exit();
    } elseif (strpos($fullUrl, "signup=email") == true) {
        echo "<h2 style='color: red; text-align: center;'>blogai nurodete elektronini pasta!</h2>";
        exit();
    } elseif (strpos($fullUrl, "signup=usertaken") == true) {
        echo "<h2 style='color: red; text-align: center;'>toks vartojas jau yra!</h2>";
        exit();
    } elseif (strpos($fullUrl, "signup=success") == true) {
        echo "<h2 style='color: green; text-align: center;'>jus uzsiregistravote sekmingai galite prisijungti!</h2>";
        exit();
    } elseif (strpos($fullUrl, "signup=success") == true) {
        echo "<h2 style='color: green; text-align: center;'>jus prisijungete sekmingai!</h2>";
        exit();
    } elseif (strpos($fullUrl, "login=empty") == true) {
        echo "<h2 style='color: red; text-align: center;'>neuzpildete visu lauku!</h2>";
        exit();
    } elseif (strpos($fullUrl, "login=error1") == true) {
        echo "<h2 style='color: red; text-align: center;'>blogai nurodete prisijungimo duomenis!</h2>";
        exit();
    } elseif (strpos($fullUrl, "login=success") == true) {
      if (isset($_SESSION['u_uid'])) {
        echo "<h2 style='color: green; text-align: center;'>jus prisijungete sekmingai {$_SESSION["u_uid"]}!</h2>";
        exit();
        }
    }
    ?>
	</div>
  <!-- Footer -->
  <?php
    include_once("./footer.php");
  ?>
  <script>
  $(function() {
    $('#login-form-link').click(function(e) {
    $("#login-form").delay(100).fadeIn(100);
    $("#register-form").fadeOut(100);
    $('#register-form-link').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
  });
  $('#register-form-link').click(function(e) {
    $("#register-form").delay(100).fadeIn(100);
    $("#login-form").fadeOut(100);
    $('#login-form-link').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
  });

});
  </script>
  </body>
</html>
