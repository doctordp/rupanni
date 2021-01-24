<?php
/* 
  require 'database.php';
  error_reporting(0);
  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {

    $sql1 = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $sql1->execute([
      'email' => strip_tags($_POST['email'])
    ]);
    // $sql1->fetch();
    if($sql1->fetchColumn() > 0){
      $message = '
      <div class="alert alert-danger alert-dismissible" id="myAlert">
        <button type="button" class="close">&times;</button>
        <strong>Error!</strong> This user has already an account.
      </div>
      ';
    } else {
      $segs = time();
      $fecha = date('d-m-Y', $segs);
      $rango = "1";
      $sql = "INSERT INTO users (nombre_completo, email, password, rango, fecha) VALUES (:nombre_completo, :email, :password, :rango, :fecha)";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':nombre_completo', strip_tags($_POST['nombre_completo']));
      $stmt->bindParam(':email', strip_tags($_POST['email']));
      $password = password_hash(strip_tags($_POST['password']), PASSWORD_BCRYPT);
      $stmt->bindParam(':password', strip_tags($password));
      $stmt->bindParam(':rango', $rango);
      $stmt->bindParam(':fecha', $fecha);


      if ($stmt->execute()) {
        $message = '
        <div class="alert alert-success alert-dismissible" id="myAlert">
          <button type="button" class="close">&times;</button>
          <strong>Success!</strong> This user has been created. Redirecting to login, please wait...
        </div>
        ';
        header("Refresh:2; url=login.php");
      } else {
        $message = '
        <div class="alert alert-danger alert-dismissible" id="myAlert">
          <button type="button" class="close">&times;</button>
          <strong>Error!</strong> An error has ocurred.
        </div>
        ';
      }

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
                <div class="col-lg-6 col-md-8 text-center">
                    <div class="user-ath-logo">
                        <a href="../main-html/index-crocus-multi.php">
                            <img src="images/logo-sm.png"  srcset="images/logo-sm2x.png 2x" alt="icon">
                        </a>
                    </div>
                    <div class="user-ath-box">
                        <h4>Creat New Account</h4>
                        <form action=" " class="user-ath-form">
<!--
                            <div class="note note-lg note-no-icon note-danger">
                                <p>Please check your submited information for error.</p>
                            </div>
                            <div class="note note-lg note-no-icon note-success">
                                <p>Your registration is succesfull, please check you email to confirm.</p>
                            </div>
-->
                            <div class="input-item">
                                <input type="text" placeholder="Your Name" class="input-bordered">
                            </div>
                            <div class="input-item">
                                <input type="text" placeholder="Your Email" class="input-bordered">
                            </div>
                            <div class="input-item">
                                <input type="password" placeholder="Password" class="input-bordered">
                            </div>
                            <!-- <div class="input-item">
                                <input type="password" placeholder="Repeat Password" class="input-bordered">
                            </div> -->
                            <!-- <div class="input-item text-left">
                                <input class="input-checkbox" id="term-condition" type="checkbox">
                                <label for="term-condition">I agree to <a href="#">Terms</a> and <a href="#"> Policy.</a></label>
                            </div> -->
                            <div class="gaps"></div>
                            <div class="d-flex justify-content-between align-items-center">
                                <button type="submit" class="btn btn-primary">Sign Up</button>
                            </div>
                        </form>
                        <!-- <div class="or-saparator"><span>or</span></div>
                        <span class="small-heading">Sign in with:</span>
                        
                        <ul class="btn-grp guttar-30px">
                            <li><a href="#" class="btn btn-sm btn-icon btn-facebook"><em class="fab fa-facebook-f"></em>Facebook</a></li>
                            <li><a href="#" class="btn btn-sm btn-icon btn-google"><em class="fab fa-google"></em>Google</a></li>
                        </ul> -->
                    </div>
                    <div class="gaps-2x"></div>
                    <div class="form-note">
                        Already a member? <a href="./login.php">Login</a>
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
