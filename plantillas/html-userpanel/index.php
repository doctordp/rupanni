<?php
  ob_start();
  session_start();
  error_reporting(0);
  require('../../database.php');

  if(isset($_SESSION['user_id'])){
    $rec = $conn->prepare('SELECT * FROM users WHERE id = :id');
    $rec->bindParam(':id', $_SESSION['user_id']);
    $rec->execute();
    $ss = $rec->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if(count($ss) > 0) {
      $user = $ss;
    }

    $email = strip_tags($user['email']);
    $query = $conn->prepare("SELECT * FROM pagos WHERE email = :email");
    $query->execute([
        'email' => $email
    ]);
    $transactions = $query->fetchAll();
  } else {
    header('Location: ../../');
  }

?>
<?php if(!empty($user) && $user['rango']==1): ?>
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
	<title>User Center - Covidtrade</title>
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
                                    <h6 class="user-dropdown-name"><?php echo($user['nombre_completo']); ?> <!-- <span>(IXIA1A105)</span> --></h6>
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
                        <div class="row">
                            <!-- <div class="col-md-6">
                                <div class="tile-item tile-primary">
                                    <div class="tile-bubbles"></div>
                                    <h6 class="tile-title">ICO TOKEN BALANCE</h6>
                                    <h1 class="tile-info">120,000,000 IC0X</h1>
                                    <ul class="tile-list-inline">
                                        <li>1.240 BTC</li>
                                        <li>19.043 ETH</li>
                                        <li>6,500.13 USD</li>
                                    </ul>
                                </div>
                            </div> --><!-- .col -->
                            <div class="col-md-6">
                                <div class="tile-item tile-light">
                                    <div class="tile-bubbles"></div>
                                    <h6 class="tile-title">YOUR CONTRIBUTION</h6>
                                    <ul class="tile-info-list">
                                        <li><span><?php echo($transactions[0]['budget']); ?></span></li>
                                        <li><span>-></span></li>
                                        <li><span><?php echo($transactions[count($transactions)-1]['budget']); ?></span></li>
                                    </ul>
                                </div>
                            </div><!-- .col -->
                        </div><!-- .row -->
                        <div class="info-card info-card-bordered">
                            <div class="row align-items-center">
                                <div class="col-sm-3">
                                    <div class="info-card-image">
                                        <img src="images/vector-a.png" alt="vector">
                                    </div>
                                    <div class="gaps-2x d-md-none"></div>
                                </div>
                                <div class="col-sm-9">
                                    <h4>Thank you for your interest towards to our ICO Crypto Projects</h4>
                                    <!-- <p>You can contribute ICOX tokens in <a href="#">Contributions</a> section.</p> -->
                                    <p>You can get a quick response to any questions, and chat with the project in our Discord: <a href="https://discord.com/invite/U7NNrHh">https://discord.com/invite/U7NNrHh</a></p>
                                    <p>Don’t hesitate to invite your friends!</p>
                                </div>
                            </div>
                        </div><!-- .info-card -->
                      <!--   <div class="token-card">
                            <div class="token-info">
                                <span class="token-smartag">ICO Phase 2</span>
                                <h2 class="token-bonus">20% <span>Current Bonus</span></h2>
                                <ul class="token-timeline">
                                    <li><span>START DATE</span>14 Jul 2018</li>
                                    <li><span>END DATE</span>25 Aug 2018</li>
                                </ul>
                            </div>
                            <div class="token-countdown">
                                <span class="token-countdown-title">THE BONUS END IN</span>
                                <div class="token-countdown-clock" data-date="2018/09/05"></div>
                            </div>
                        </div> --><!-- .token-card -->
                        <!-- <div class="progress-card">
                            <h4>Token Sale Progress</h4>
                            <ul class="progress-info">
                                <li><span>Raised -</span> 2,758 ICOX</li>
                                <li><span>TOTAL -</span> 1,500,000 ICOX</li>
                            </ul>
                            <div class="progress-bar">
                                <div class="progress-hcap" style="width:90%">
                                    <div>Hard cap <span>1,400,000</span></div>
                                </div>
                                <div class="progress-scap" style="width:34%">
                                    <div>Soft cap <span>40,000</span></div>
                                </div>
                                <div class="progress-psale" style="width:12%">
                                    <div>Pre Sale <span>10,000</span></div>
                                </div>
                                <div class="progress-percent" style="width:25%"></div>
                            </div>
                        </div> -->
                        <!-- <div class="gaps-3x"></div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>PreSale</th>
                                        <th>Sale Stage 1</th>
                                        <th>Sale Stage 2</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><span>Start Date</span>03 July 2018</td>
                                        <td><span>Start Date</span>15 August 2018</td>
                                        <td><span>Start Date</span>28 October 2018</td>
                                    </tr>
                                    <tr>
                                        <td><span>End Date</span>19 July 2018</td>
                                        <td><span>End Date</span>02 September 2018</td>
                                        <td><span>End Date</span>16 November 2018</td>
                                    </tr>
                                    <tr>
                                        <td><span>Bonus</span>30%</td>
                                        <td><span>Bonus</span>20%</td>
                                        <td><span>Bonus</span>10%</td>
                                    </tr>
                                    <tr>
                                        <td><span>Soft Cap</span>$ 20M</td>
                                        <td><span>Hard Cap</span>$ 50M</td>
                                        <td><span>Hard Cap</span>$ 30M</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                         -->
                    </div><!-- .user-panel -->
                </div><!-- .user-content -->
            </div><!-- .d-flex -->
        </div><!-- .container -->
    </div>
    <!-- UserWraper End -->
    
    
    <!-- <div class="footer-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <span class="footer-copyright">Copyright 2018, <a href="#">ICO Crypto</a>.  All Rights Reserved.</span>
                </div>
                <div class="col-md-5 text-md-right">
                    <ul class="footer-links">
                        <li><a href="policy.html">Privacy Policy</a></li>
                        <li><a href="policy.html">Terms of Sales</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> -->
    <!-- FooterBar End -->
    
    
	<!-- JavaScript (include all script here) -->
	<script src="assets/js/jquery.bundle.js?ver=101"></script>
	<script src="assets/js/script.js?ver=101"></script>
</body>
</html>
<?php elseif(!empty($user) && $user['rango']==2): ?>
<?php header('Location: ../admin/index.php');?>
<?php elseif(empty($user) && $user['rango']==0): ?>
<?php header('Location: /'); ?>
<?php endif; ?>