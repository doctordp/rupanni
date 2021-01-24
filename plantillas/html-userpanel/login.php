<?php
/* 
  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /login/index.php');
  }
  error_reporting(0);
  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', strip_tags($_POST['email']));
    $records->execute();
    $results = $records->fetch();

    $message = '';

    if (count($results) > 0 && password_verify(strip_tags($_POST['password']), $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: ./redirect-user.php");
    } else {
      $message = '
        <div class="alert alert-danger alert-dismissible" id="myAlert">
          <button type="button" class="close">&times;</button>
          <strong>Error!</strong> Sorry, those credentials do not match.
        </div>
        ';
    }
  } */

?>
<!DOCTYPE html>
<html lang="zxx" class="js">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Softnio">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="ICO Crypto is a modern and elegant landing page, created for ICO Agencies and digital crypto currency investment website.">
	<!-- Fav Icon  -->
	<link rel="shortcut icon" href="images/favicon.png">
	<!-- Site Title  -->
	<title>User Center - ICO Crypto</title>
	<!-- Vendor Bundle CSS -->
	<link rel="stylesheet" href="assets/css/vendor.bundle.css?ver=101">
	<!-- Custom styles for this template -->
	<link rel="stylesheet" href="assets/css/style.css?ver=101">
	
</head>

<body class="user-ath">
   
   <div class="user-ath-page">
       <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8  text-center">
                    <div class="user-ath-logo">
                        <a href="../main-html/index-crocus-multi.php">
                            <img src="images/logo-sm.png"  srcset="images/logo-sm2x.png 2x" alt="icon">
                        </a>
                    </div>
                    <div class="user-ath-box">
                        <h4>Login to Your Account</h4>
                        <form action=" " class="user-ath-form">
<!--
                            <div class="note note-lg note-no-icon note-danger">
                                <p>Your email and password is invalid.</p>
                            </div>
-->
                            <div class="input-item">
                                <input name="email" type="text" placeholder="Your Email" class="input-bordered">
                            </div>
                            <div class="input-item">
                                <input name="password" type="password" placeholder="Password" class="input-bordered">
                            </div>
                            <div class="gaps"></div>
                            <div class="d-flex justify-content-between align-items-center">
                                <button type="submit" class="btn btn-primary">Log in</button>
                                <!-- <a href="recovery.html" class="simple-link">Forgot password?</a> -->
                            </div>
                        </form>
                        <!-- <div class="or-saparator"><span>or</span></div>
                        <span class="small-heading">Log in with:</span>
                        
                        <ul class="btn-grp guttar-30px">
                            <li><a href="#" class="btn btn-sm btn-icon btn-facebook"><em class="fab fa-facebook-f"></em>Facebook</a></li>
                            <li><a href="#" class="btn btn-sm btn-icon btn-google"><em class="fab fa-google"></em>Google</a></li>
                        </ul> -->
                    </div>
                    <div class="gaps-2x"></div>
                    <div class="form-note">
                        Not a member? <a href="./signup.php">Sign up now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
	<!-- JavaScript (include all script here) -->
	<script src="assets/js/jquery.bundle.js?ver=101"></script>
	<script src="assets/js/script.js?ver=101"></script>
</body>
</html>
