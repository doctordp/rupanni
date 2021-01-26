<?php
  ob_start();
  header('Content-Type: text/html; charset=UTF-8');
  require('../../database.php');
  error_reporting(0);
  session_start();
  if(isset($_SESSION['user_id'])){
    $rec = $conn->prepare('SELECT * FROM users WHERE id = :id');
    $rec->bindParam(':id', $_SESSION['user_id']);
    $rec->execute();
    $ss = $rec->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if(count($ss) > 0) {
      $user = $ss;
    }
  } else {
    header('Location: ../../');
  }

  $email = strip_tags($user['email']);
  $query = $conn->prepare("SELECT * FROM soporte WHERE email = :email");
  $query->execute([
    'email' => $email
  ]);
  $user1 = $query->fetchAll();
  $selected = [];

  $msg = null;
  $titulo = null;
  $contenido = null;
  $email = null;
  $nombre = null;
  $fecha = null;
  $estado = null;

  function generarCodigo($longitud) {
    $key = '';
    $pattern = '1234567890axbyz';
    $max = strlen($pattern)-1;
    for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
    return $key;
  }

  // echo '#'. $user['id']. '+' . generarCodigo(rand(7,10)) . '#';

  if(isset($_POST['titulo'], $_POST['contenido'])){

    $titulo = strip_tags($_POST['titulo']);
    $contenido = strip_tags($_POST['contenido']);

   

      $ticket = '#'. $user['id']. '!' . generarCodigo(rand(7,10)) . '#';

      $email = strip_tags($user['email']);
      $estado = strip_tags("1");
      $fecha = date('d-m-Y', time());
      $nombre_completo = strip_tags($user['nombre_completo']);

      $query = $conn->prepare("INSERT INTO soporte (titulo, contenido, email, nombre_completo, fecha, ticket, estado) VALUES(:titulo, :contenido, :email, :nombre_completo, :fecha, :ticket, :estado)");
      $query->execute([
        'titulo' => $titulo,
        'contenido' => $contenido,
        'email' => $email,
        'nombre_completo' => $nombre_completo,
        'fecha' => $fecha,
        'ticket' => $ticket,
        'estado' => $estado
      ]);
      if($query){
          $msg = '<br />
          <div class="alert alert-success alert-dismissible" id="myAlert">
            <button type="button" class="close">&times;</button>
            <strong>Success!</strong> It has been opened a new ticket. Redirecting to your current ticket panel...
          </div>
          ';
          header("Refresh:2; url=./kyc.php");

      } else {
          $msg = '<br />
          <div class="alert alert-danger alert-dismissible" id="myAlert">
            <button type="button" class="close">&times;</button>
            <strong>Error!</strong> An error has ocurred while creating the ticket.
          </div>
          ';    
      }
     

  }

?>
<?php if(!empty($user) && $user['rango']==1): ?>
<!DOCTYPE html>
<html lang="zxx" class="js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="author" content="Softnio">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="ICO Crypto is a modern and elegant landing page, created for ICO Agencies and digital crypto currency investment website.">
	<!-- Fav Icon  -->
	<link rel="shortcut icon" href="images/favicon.png">
	<!-- Site Title  -->
	<title>KYC Application | Covidtrade</title>
	<!-- Vendor Bundle CSS -->
	<link rel="stylesheet" href="assets/css/vendor.bundle.css?ver=101">
	<!-- Custom styles for this template -->
	<link rel="stylesheet" href="assets/css/style.css?ver=101">

	
</head>


<body class="user-dashboard">
    
    
<div class="topbar">
        <div class="topbar-md d-lg-none">
            <div class="container">
                <div class="d-flex align-items-center justify-content-between">
                    <a href="#" class="toggle-nav">
                        <div class="toggle-icon">
                            <span class="toggle-line"></span>
                            <span class="toggle-line"></span>
                            <span class="toggle-line"></span>
                            <span class="toggle-line"></span>
                        </div>
                    </a><!-- .toggle-nav -->

                    <div class="site-logo">
                        <a href="./index.php" class="site-brand">
                            <img src="images/logo.png" alt="logo" srcset="images/logo2x.png 2x">
                        </a>
                    </div><!-- .site-logo -->
                    
                    <div class="dropdown topbar-action-item topbar-action-user">
                        <a href="#" data-toggle="dropdown"> <img class="icon" src="images/user-thumb-sm.png" alt="thumb"> </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="user-dropdown">
                                <div class="user-dropdown-head">
                                    <h6 class="user-dropdown-name"><?php echo($user['nombre_completo']); ?><!-- <span>(IXIA1A105)</span> --></h6>
                                    <span class="user-dropdown-email"><?php echo ($user['email']); ?></span>
                                </div>
                                <!-- <div class="user-dropdown-balance">
                                    <h6>ICO TOKEN BALANCE</h6>
                                    <h3>120,000,000 IC0X</h3>
                                    <ul>
                                        <li>1.240 BTC</li>
                                        <li>19.043 ETH</li>
                                        <li>6,500.13 USD</li>
                                    </ul>
                                </div> -->
                               <!--  <ul class="user-dropdown-btns btn-grp guttar-10px">
                                    <li><a href="#" class="btn btn-xs btn-warning">Confirm Email</a></li>
                                    <li><a href="./kyc.php" class="btn btn-xs btn-warning">KYC Pending</a></li>
                                </ul> -->
                                <div class="gaps-1x"></div>
                                <ul class="user-dropdown-links">
                                    <li><a href="./account.php"><i class="ti ti-id-badge"></i>My Profile</a></li>
                                    <li><a href="./security.php"><i class="ti ti-lock"></i>Security</a></li>
                                    <li><a href="./activity.php"><i class="ti ti-eye"></i>Activity</a></li>
                                </ul>
                                <ul class="user-dropdown-links">
                                    <li><a href="../../logout.php"><i class="ti ti-power-off"></i>Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- .toggle-action -->
                </div><!-- .container -->
            </div><!-- .container -->
        </div><!-- .topbar-md -->
        <div class="container">
            <div class="d-lg-flex align-items-center justify-content-between">
                <div class="topbar-lg d-none d-lg-block">
                    <div class="site-logo">
                        <a href="./index.php" class="site-brand">
                            <img src="images/logo.png" alt="logo" srcset="images/logo2x.png 2x">
                        </a>
                    </div><!-- .site-logo -->
                </div><!-- .topbar-lg -->

                <div class="topbar-action d-none d-lg-block">
                    <ul class="topbar-action-list">
                        <li class="topbar-action-item topbar-action-link">
                            <a href="./index.php"><em class="ti ti-home"></em> Go to main site</a>
                        </li><!-- .topbar-action-item -->

                        <!-- <li class="dropdown topbar-action-item topbar-action-language">
                            <a href="#" data-toggle="dropdown"> EN <em class="ti ti-angle-down"></em> </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">FR</a></li>
                                <li><a href="#">JY</a></li>
                                <li><a href="#">CH</a></li>
                            </ul>
                        </li> --><!-- .topbar-action-item -->

                        <li class="dropdown topbar-action-item topbar-action-user">
                            <a href="#" data-toggle="dropdown"> <img class="icon" src="images/user-thumb-sm.png" alt="thumb"> </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="user-dropdown">
                                    <div class="user-dropdown-head">
                                        <h6 class="user-dropdown-name"><?php echo($user['nombre_completo']); ?><!-- <span>(IXIA1A105)</span>--></h6>
                                        <span class="user-dropdown-email"><?php echo ($user['email']); ?></span>
                                    </div>
                                   <!--  <div class="user-dropdown-balance">
                                        <h6>ICO TOKEN BALANCE</h6>
                                        <h3>120,000,000 IC0X</h3>
                                        <ul>
                                            <li>1.240 BTC</li>
                                            <li>19.043 ETH</li>
                                            <li>6,500.13 USD</li>
                                        </ul>
                                    </div> -->
                                    <ul class="user-dropdown-links">
                                        <li><a href="./account.php"><i class="ti ti-id-badge"></i>My Profile</a></li>
                                        <li><a href="./security.php"><i class="ti ti-lock"></i>Security</a></li>
                                        <!-- <li><a href="./activity.php"><i class="ti ti-eye"></i>Activity</a></li> -->
                                    </ul>
                                    <ul class="user-dropdown-links">
                                        <li><a href="../../logout.php"><i class="ti ti-power-off"></i>Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li><!-- .topbar-action-item -->
                    </ul><!-- .topbar-action-list -->
                </div><!-- .topbar-action -->
            </div><!-- .d-flex -->
        </div><!-- .container -->
    </div>
    <!-- TopBar End -->
    
    
    <div class="user-wraper">
        <div class="container">
            <div class="d-flex">
            <div class="user-sidebar">
                    <div class="user-sidebar-overlay"></div>
                    <div class="user-box d-none d-lg-block">
                        <div class="user-image">
                            <img src="images/user-thumb-lg.png" alt="thumb">
                        </div>
                        <h6 class="user-name"><?php echo($user['nombre_completo']); ?></h6>
<!--                         <div class="user-uid">Unique ID: <span>IXIA1A105</span></div>
 -->                        <ul class="btn-grp guttar-10px"><!-- 
                            <li><a href="#" class="btn btn-xs btn-warning">Confirm Email</a></li>
                            <li><a href="./kyc.php" class="btn btn-xs btn-warning">KYC Pending</a></li> -->
                        </ul>
                    </div><!-- .user-box -->
                    <ul class="user-icon-nav">
                        <li><a href="./index.php"><em class="ti ti-dashboard"></em>Dashboard</a></li>
                        <li><a href="./kyc.php"><em class="ti ti-files"></em>KYC Application</a></li>
                        <li><a href="./tokens.php"><em class="ti ti-pie-chart"></em>Invest Now!</a></li>
                        <li><a href="./transactions.php"><em class="ti ti-control-shuffle"></em>Transactions</a></li>
                        <li><a href="./referrals.php"><em class="ti ti-infinite"></em>Referral</a></li>
                        <li><a href="./account.php"><em class="ti ti-user"></em>Account</a></li>
                        <li><a href="./security.php"><em class="ti ti-lock"></em>Security</a></li>
                    </ul><!-- .user-icon-nav -->
                    <div class="user-sidebar-sap"></div><!-- .user-sidebar-sap -->
                    <ul class="user-nav">
                        <li><a href="how-to.html">How to buy?</a></li>
                        <li><a href="../main-html/page-faq.php">Faqs</a></li>
                        <li><a href="#">Whitepaper</a></li>
                        <li>Contact Support<span>info@icocrypto.com</span></li>
                    </ul><!-- .user-nav -->
                    <div class="d-lg-none">
                        <div class="user-sidebar-sap"></div>
                        <div class="gaps-1x"></div>
                        <ul class="topbar-action-list">
                            <li class="topbar-action-item topbar-action-link">
                                <a href="./index.php"><em class="ti ti-home"></em> Go to main site</a>
                            </li><!-- .topbar-action-item -->
                            <!-- <li class="dropup topbar-action-item topbar-action-language">
                                <a href="/" data-toggle="dropdown" aria-haspopup="true"> EN <em class="ti ti-angle-up"></em> </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">FR</a></li>
                                    <li><a href="#">JY</a></li>
                                    <li><a href="#">CH</a></li>
                                </ul>
                            </li -->><!-- .topbar-action-item -->
                        </ul><!-- .topbar-action-list -->
                    </div>
                </div><!-- .user-sidebar -->

                <div class="user-content">
                    <div class="user-panel">
                    <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="personal-data">
                                <form action=" " method="post">
                                    <div class="input-item input-with-label">
                                        <label for="title" class="input-item-label">Title</label>
                                        <input class="input-bordered" name="titulo" type="text" id="title" name="title">
                                    </div>
                                    <div class="input-item input-with-label">
                                        <label for="request" class="input-item-label">Your request</label>
                                        <input class="input-bordered" type="text" name="contenido" id="request" name="request">
                                    </div>
                                    <div class="row">
                                    
                                    </div><!-- .row -->
                                    <div class="gaps-1x"></div><!-- 10px gap -->
                                    <div class="d-sm-flex justify-content-between align-items-center">
                                        <button class="btn btn-primary">Update</button>
                                        <div class="gaps-2x d-sm-none"></div>
                                        <!-- <span class="color-success"><em class="ti ti-check-box"></em> All Changes are saved</span> -->
                                    </div>
                                    <h6>The documents in image or pdf format had to be send to: rupanisolutions@protonmail.com</h6>
                                </form><!-- form -->
                            </div>
                            <?php 
                                echo $msg;
                                ?><!-- .tab-pane -->
                        </div>
                        <!-- <h2 class="user-panel-title">Identity Verification - KYC</h2>
                        <p>To comply with regulation each participant will have to go through indentity verification (KYC). So please complete our fast and secure verification process to participate in our token sale. You can proceed from here to verify your indentity and also you can check your application status if you submit already. </p>
                        <div class="gaps-2x"></div> -->
                        <!-- <div class="status status-empty">
                            <div class="status-icon">
                                <em class="ti ti-files"></em>
                                <div class="status-icon-sm">
                                    <em class="ti ti-close"></em>
                                </div>
                            </div>
                            <span class="status-text">You have not submitted your KYC Application</span>
                            <a href="kyc-application.html" class="btn btn-primary">CLick to proceed</a>
                        </div> -->
                        <!-- <div class="note note-md note-info note-plane">
                            <em class="fas fa-info-circle"></em> 
                            <p>Some of contries and regions will not able to pass KYC process and therefore are restricted from token sale.</p>
                        </div> -->

                        <table class="data-table tranx-table">
                            <tbody>
                                <tr>
                                <?php foreach($user1 as $u): ?>
                                    <tr style="width: 100%">
                                        <td class="tranx-token"><span><?php echo($u['titulo']); ?></span></td>
                                        <td class="tranx-no"><span><?php echo($u['fecha']); ?></span></td>
                                        <td class="tranx-amount"><span>id: <?php echo($u['ticket']); ?></span></td>
                                        <td><a onclick="myfunc(<?php echo($u['id']); ?>)" class="btn btn-success" href="chat.php?id=<?php echo $u['id']; ?>" data-toggle="modal" data-target="#solicitud">View</a></td>
                                    </tr>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div><!-- .user-kyc -->
                </div><!-- .user-content -->
            </div><!-- .d-flex -->
        </div><!-- .container -->
    </div>
    <!-- UserWraper End -->
    <!--MODAL-->
    <div class="modal fade" id="solicitud" tabindex="-1">
        <!-- .modal-dialog -->
    </div>
    <!--END MODAL-->
    
    <div class="footer-bar">
        <div class="container">
            <!-- <div class="row">
                <div class="col-md-7">
                    <span class="footer-copyright">Copyright 2018, <a href="#">ICO Crypto</a>.  All Rights Reserved.</span>
                </div>
                <div class="col-md-5 text-md-right">
                    <ul class="footer-links">
                        <li><a href="policy.html">Privacy Policy</a></li>
                        <li><a href="policy.html">Terms of Sales</a></li>
                    </ul>
                </div>
            </div> -->
        </div><!-- .container -->
    </div>
    <!-- FooterBar End -->
    
    
	<!-- JavaScript (include all script here) -->
	<script src="assets/js/jquery.bundle.js?ver=101"></script>
    <script src="assets/js/script.js?ver=101"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".close").click(function(){
            $("#myAlert").alert("close");
            });
        });
    </script>
    <script>
        function myfunc(id){
        var incidencias = <?php echo json_encode($user1); ?>;
        var incidenciaAMostrar = [];
        for(let i = 0; i < incidencias.length; i++){
            if(incidencias[i][0] == id){
                incidenciaAMostrar = incidencias[i]
            }
        }
        var destino = document.getElementById('solicitud')
        var allText = `
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><em class="ti ti-close"></em></a>
                <div class="tranx-popup">
                    <h5>View Message Details</h5>
                    <div class="tranx-purchase-details d-none active">
                        <ul class="tranx-purchase-info">
                            <li>
                                <div class="tranx-purchase-head">Applicant</div>
                                <div class="tranx-purchase-des">${incidenciaAMostrar[4]}</div>
                            </li><!-- li -->
                            <li>
                                <div class="tranx-purchase-head">Date</div>
                                <div class="tranx-purchase-des">${incidenciaAMostrar[5]}</div>
                            </li><!-- li -->
                            <li>
                                <div class="tranx-purchase-head">Request id</div>
                                <div class="tranx-purchase-des">${incidenciaAMostrar[6]}</div>
                            </li><!-- li -->
                            <li>
                                <div class="tranx-purchase-head">Title</div>
                                <div class="tranx-purchase-des">${incidenciaAMostrar[1]}</div>
                            </li><!-- li -->
                            <li>
                                <div class="tranx-purchase-head">Content</div>
                                <div class="tranx-purchase-des">${incidenciaAMostrar[2]}</div>
                            </li><!-- li --><!-- li -->
                        </ul><!-- .tranx-purchase-info -->
                    </div><!-- .tranx-payment-details -->
                </div><!-- .tranx-popup -->
            </div><!-- .modal-content -->
        </div>
        `;
        destino.innerHTML = allText;
        }

    </script>

</body>
</html>
<?php elseif(!empty($user) && $user['rango']==2): ?>
<?php header('Location: ../admin/index.php'); ?>
<?php elseif(empty($user) && $user['rango']==0): ?>
<?php header('Location: /'); ?>
<?php endif; ?>
<?php
ob_end_flush();
?>