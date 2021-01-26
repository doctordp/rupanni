<?php
  ob_start();
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
  }
  $email = strip_tags($user['email']);
  $query = $conn->prepare("SELECT * FROM pagos WHERE email = :email");
  $query->execute([
    'email' => $email
  ]);
  $user1 = $query->fetchAll();
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
	<title>Transaction History | Covidtrade</title>
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
                        <h2 class="user-panel-title">Transactions</h2>
                        
                        <!-- if there is no transaction you can use this code -->
                        <!-- <div class="status status-empty">
                            <div class="status-icon">
                                <em class="ti ti-files"></em>
                                <div class="status-icon-sm">
                                    <em class="ti ti-close"></em>
                                </div>
                            </div>
                            <span class="status-text">You have not contributed yet! You should make some.</span>
                            <a href="tokens.html" class="btn btn-primary">Contribute Now</a>
                        </div> -->

                        <table class="data-table tranx-table">
                            <thead>
                                <tr>
                                    <th class="tranx-token"><span>User</span></th>
                                    <th class="tranx-no"><span>Date</span></th>
                                    <th class="tranx-amount"><span>Amount</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <?php foreach($user1 as $u): ?>
                                    <tr style="width: 100%">
                                        <td class="tranx-token"><span><?php echo($u['user']); ?></span></td>
                                        <td class="tranx-no"><span><?php echo($u['fecha']); ?></span></td>
                                        <td class="tranx-amount"><span>id: <?php echo($u['budget']); ?></span></td>
                                        <td><a onclick="myfunc(<?php echo($u['id']); ?>)" class="btn btn-success" href="chat.php?id=<?php echo $u['id']; ?>" data-toggle="modal" data-target="#solicitud">View</a></td>
                                    </tr>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>

                            <div class="modal fade" id="solicitud" tabindex="-1">
                            <!-- .modal-dialog -->
                            </div>
                        
                        <!-- <table class="data-table tranx-table">
                            <thead>
                                <tr>
                                    <th class="tranx-status"></th>
                                    <th class="tranx-no"><span>TNX NO</span></th>
                                    <th class="tranx-token"><span>Tokens</span></th>
                                    <th class="tranx-amount"><span>Amount</span></th>
                                    <th class="tranx-from"><span>From</span></th>
                                    <th class="tranx-action"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="tranx-status tranx-status-approved"><span class="d-none">Approved</span><em class="ti ti-check"></em></td>
                                    <td class="tranx-no"><span>ICIYOW0102</span>08 Jul, 18  10:20PM</td>
                                    <td class="tranx-token"><span>+5,600</span>ICOX</td>
                                    <td class="tranx-amount"><span>56.00</span>ETH <em class="fas fa-info-circle" data-toggle="tooltip" data-placement="bottom" title="1 ETH = 100 ICOX"></em></td>
                                    <td class="tranx-from"><span>1F1t....4xqX</span>08 Jul, 18  10:20PM</td>
                                    <td class="tranx-action">
                                        <a href="#" data-toggle="modal" data-target="#tranxApproved"><em class="ti ti-more-alt"></em></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tranx-status tranx-status-pending"><span class="d-none">Pending</span><em class="ti ti-alert"></em></td>
                                    <td class="tranx-no"><span>ICIYOW0102</span>08 Jul, 18  10:20PM</td>
                                    <td class="tranx-token"><span>+5,600</span>ICOX</td>
                                    <td class="tranx-amount"><span>56.00</span>ETH <em class="fas fa-info-circle" data-toggle="tooltip" data-placement="bottom" title="1 ETH = 100 ICOX"></em></td>
                                    <td class="tranx-from"><span>1F1t....4xqX</span>08 Jul, 18  10:20PM</td>
                                    <td class="tranx-action">
                                        <a href="#" data-toggle="modal" data-target="#tranxPending"><em class="ti ti-more-alt"></em></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tranx-status tranx-status-cancled"><span class="d-none">Canceled</span><em class="ti ti-close"></em></td>
                                    <td class="tranx-no"><span>ICIYOW0102</span>08 Jul, 18  10:20PM</td>
                                    <td class="tranx-token"><span>+5,600</span>ICOX</td>
                                    <td class="tranx-amount"><span>56.00</span>ETH <em class="fas fa-info-circle" data-toggle="tooltip" data-placement="bottom" title="1 ETH = 100 ICOX"></em></td>
                                    <td class="tranx-from"><span>1F1t....4xqX</span>08 Jul, 18  10:20PM</td>
                                    <td class="tranx-action">
                                        <a href="#" data-toggle="modal" data-target="#tranxApproved"><em class="ti ti-more-alt"></em></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tranx-status tranx-status-approved"><span class="d-none">Approved</span><em class="ti ti-check"></em></td>
                                    <td class="tranx-no"><span>ICIYOW0102</span>08 Jul, 18  10:20PM</td>
                                    <td class="tranx-token"><span>+5,600</span>ICOX</td>
                                    <td class="tranx-amount"><span>56.00</span>ETH <em class="fas fa-info-circle" data-toggle="tooltip" data-placement="bottom" title="1 ETH = 100 ICOX"></em></td>
                                    <td class="tranx-from"><span>1F1t....4xqX</span>08 Jul, 18  10:20PM</td>
                                    <td class="tranx-action">
                                        <a href="#" data-toggle="modal" data-target="#tranxApproved"><em class="ti ti-more-alt"></em></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tranx-status tranx-status-approved"><span class="d-none">Approved</span><em class="ti ti-check"></em></td>
                                    <td class="tranx-no"><span>ICIYOW0102</span>08 Jul, 18  10:20PM</td>
                                    <td class="tranx-token"><span>+5,600</span>ICOX</td>
                                    <td class="tranx-amount"><span>56.00</span>ETH <em class="fas fa-info-circle" data-toggle="tooltip" data-placement="bottom" title="1 ETH = 100 ICOX"></em></td>
                                    <td class="tranx-from"><span>1F1t....4xqX</span>08 Jul, 18  10:20PM</td>
                                    <td class="tranx-action">
                                        <a href="#" data-toggle="modal" data-target="#tranxApproved"><em class="ti ti-more-alt"></em></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tranx-status tranx-status-approved"><span class="d-none">Approved</span><em class="ti ti-check"></em></td>
                                    <td class="tranx-no"><span>ICIYOW0102</span>08 Jul, 18  10:20PM</td>
                                    <td class="tranx-token"><span>+5,600</span>ICOX</td>
                                    <td class="tranx-amount"><span>56.00</span>ETH <em class="fas fa-info-circle" data-toggle="tooltip" data-placement="bottom" title="1 ETH = 100 ICOX"></em></td>
                                    <td class="tranx-from"><span>1F1t....4xqX</span>08 Jul, 18  10:20PM</td>
                                    <td class="tranx-action">
                                        <a href="#" data-toggle="modal" data-target="#tranxApproved"><em class="ti ti-more-alt"></em></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tranx-status tranx-status-approved"><span class="d-none">Approved</span><em class="ti ti-check"></em></td>
                                    <td class="tranx-no"><span>ICIYOW0102</span>08 Jul, 18  10:20PM</td>
                                    <td class="tranx-token"><span>+5,600</span>ICOX</td>
                                    <td class="tranx-amount"><span>56.00</span>ETH <em class="fas fa-info-circle" data-toggle="tooltip" data-placement="bottom" title="1 ETH = 100 ICOX"></em></td>
                                    <td class="tranx-from"><span>1F1t....4xqX</span>08 Jul, 18  10:20PM</td>
                                    <td class="tranx-action">
                                        <a href="#" data-toggle="modal" data-target="#tranxApproved"><em class="ti ti-more-alt"></em></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tranx-status tranx-status-approved"><span class="d-none">Approved</span><em class="ti ti-check"></em></td>
                                    <td class="tranx-no"><span>ICIYOW0102</span>08 Jul, 18  10:20PM</td>
                                    <td class="tranx-token"><span>+5,600</span>ICOX</td>
                                    <td class="tranx-amount"><span>56.00</span>ETH <em class="fas fa-info-circle" data-toggle="tooltip" data-placement="bottom" title="1 ETH = 100 ICOX"></em></td>
                                    <td class="tranx-from"><span>1F1t....4xqX</span>08 Jul, 18  10:20PM</td>
                                    <td class="tranx-action">
                                        <a href="#" data-toggle="modal" data-target="#tranxApproved"><em class="ti ti-more-alt"></em></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tranx-status tranx-status-approved"><span class="d-none">Approved</span><em class="ti ti-check"></em></td>
                                    <td class="tranx-no"><span>ICIYOW0102</span>08 Jul, 18  10:20PM</td>
                                    <td class="tranx-token"><span>+5,600</span>ICOX</td>
                                    <td class="tranx-amount"><span>56.00</span>ETH <em class="fas fa-info-circle" data-toggle="tooltip" data-placement="bottom" title="1 ETH = 100 ICOX"></em></td>
                                    <td class="tranx-from"><span>1F1t....4xqX</span>08 Jul, 18  10:20PM</td>
                                    <td class="tranx-action">
                                        <a href="#" data-toggle="modal" data-target="#tranxApproved"><em class="ti ti-more-alt"></em></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tranx-status tranx-status-approved"><span class="d-none">Approved</span><em class="ti ti-check"></em></td>
                                    <td class="tranx-no"><span>ICIYOW0102</span>08 Jul, 18  10:20PM</td>
                                    <td class="tranx-token"><span>+5,600</span>ICOX</td>
                                    <td class="tranx-amount"><span>56.00</span>ETH <em class="fas fa-info-circle" data-toggle="tooltip" data-placement="bottom" title="1 ETH = 100 ICOX"></em></td>
                                    <td class="tranx-from"><span>1F1t....4xqX</span>08 Jul, 18  10:20PM</td>
                                    <td class="tranx-action">
                                        <a href="#" data-toggle="modal" data-target="#tranxApproved"><em class="ti ti-more-alt"></em></a>
                                    </td>
                                </tr> 
                            </tbody>
                        </table> -->

                    </div><!-- .user-panel -->
                </div><!-- .user-content -->
            </div><!-- .d-flex -->
        </div><!-- .container -->
    </div>
    <!-- UserWraper End -->
    
    
    <div class="modal fade" id="tranxPending" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><em class="ti ti-close"></em></a>
                <div class="tranx-popup">
                    <h5>View Transaction Details</h5>
                    <div class="tranx-purchase-details d-none active">
                        <p>Transaction <strong>ICIYOW0102</strong> was place on <strong>24-Jul-2018, 12:10 am</strong> and <br> is currently <strong>Pending Payment</strong>. <a href="#" class="make-pay">Please Make your payment <em class="ti ti-arrow-right"></em></a></p>
                        <h6>Purchase Details</h6>
                        <ul class="tranx-purchase-info">
                            <li>
                                <div class="tranx-purchase-head">Package Name</div>
                                <div class="tranx-purchase-des">ICO Phace 3</div>
                            </li><!-- li -->
                            <li>
                                <div class="tranx-purchase-head">Payment Method</div>
                                <div class="tranx-purchase-des">ETH</div>
                            </li><!-- li -->
                            <li>
                                <div class="tranx-purchase-head">Your Contribution</div>
                                <div class="tranx-purchase-des">1</div>
                            </li><!-- li -->
                            <li>
                                <div class="tranx-purchase-head">Token (T)</div>
                                <div class="tranx-purchase-des">
                                    <span>4,780.00</span>
                                    <span>(4780 * 1)</span>
                                </div>
                            </li><!-- li -->
                            <li>
                                <div class="tranx-purchase-head">Bonus Tokens (B)</div>
                                <div class="tranx-purchase-des">
                                    <span>956.00</span>
                                    <span>(956 * 1)</span>
                                </div>
                            </li><!-- li -->
                            <li>
                                <div class="tranx-purchase-head">Total Tokens</div>
                                <div class="tranx-purchase-des">
                                    <span>5,736.00</span>
                                    <span>(T+B)</span>
                                </div>
                            </li><!-- li -->
                        </ul><!-- .tranx-purchase-info -->
                        
                        <h6>Payment Deposit From <em class="ti ti-arrow-right"></em> <span>Ethereum Address</span></h6>
                        <div class="tranx-payment-info">
                            <em class="fab fa-ethereum"></em>
                            <input type="text" class="tranx-payment-address" value="0x4156d3342d5c385a87d264f90653733592000581" disabled>
                        </div><!-- .tranx-payment-info -->
                    </div><!-- .tranx-payment-details -->
                    <div class="tranx-payment-details d-none">
                        <p>Hi, Your transaction <strong>ICIYOW0102</strong> is still <strong>Pending Payment</strong><br> You will receive <strong>5,470 ICOX</strong> tokens (incl. bonus of 450 ICOX) once paid.</p>
                        <h6>Please make your Payment to the bellow Address</h6>
                        <div class="tranx-payment-info">
                            <span class="tranx-copy-feedback copy-feedback"></span>
                            <em class="fab fa-ethereum"></em>
                            <input type="text" class="tranx-payment-address copy-address" value="0x4156d3342d5c385a87d264f90653733592000581" disabled>
                            <a href="#" class="tranx-payment-copy copy-trigger"><em class="ti ti-files"></em></a>
                        </div><!-- .tranx-payment-info -->
                        <ul class="tranx-info-list">
                            <li><span>SET GAS LIMIT:</span> 120 000</li>
                            <li><span>SET GAS PRICE:</span> 95 Gwei</li>
                        </ul><!-- .tranx-info-list -->
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="tranx-info-qr">
                                    <span>OR Scan bellow QR Code to pay</span>
                                    <img class="tranx-info-qrimg" src="images/eth-qr.png" alt="qr">
                                    <div class="gaps-4x"></div>
                                    <a href="#" class="btn btn-light pay-done">OK</a>
                                    <div class="gaps-1x"></div>
                                    <a href="#" class="btn btn-xs btn-uline btn-uline-danger">Cancel Payment</a>
                                    <div class="gaps-2x d-sm-none"></div>
                                </div>
                            </div><!-- .col -->
                            <div class="col-sm-7">
                                <div class="note note-info">
                                    <em class="fas fa-info-circle"></em>
                                    <p>Do not make payment through exchange (Kraken, Bitfinex). You can use MetaMask, MayEtherWallet, Mist wallets etc.</p>
                                </div>
                                <div class="gaps-1x"></div>
                                <div class="note note-danger">
                                    <em class="fas fa-info-circle"></em>
                                    <p>In case you send a different amount ETH, the number of ICOX tokens will update accordingly.</p>
                                </div>
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .tranx-payment-details -->
                </div><!-- .tranx-popup -->
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->
    </div>
    <!-- Modal End -->
    
    
    <div class="modal fade" id="tranxApproved" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><em class="ti ti-close"></em></a>
                <div class="tranx-popup">
                    <h5>View Transaction Details</h5>
                    <p>Transaction <strong>ICIYOW0102</strong> was place on <strong>24-Jul-2018, 12:10 am</strong> and <br> it’s  <strong>Successfully Paid.</strong></p>
                    <div class="tranx-purchase-details">
                        <h6>Purchase Details</h6>
                        <ul class="tranx-purchase-info">
                            <li>
                                <div class="tranx-purchase-head">Package Name</div>
                                <div class="tranx-purchase-des">ICO Phace 3</div>
                            </li><!-- li -->
                            <li>
                                <div class="tranx-purchase-head">Payment Method</div>
                                <div class="tranx-purchase-des">ETH</div>
                            </li><!-- li -->
                            <li>
                                <div class="tranx-purchase-head">Your Contribution</div>
                                <div class="tranx-purchase-des">1</div>
                            </li><!-- li -->
                            <li>
                                <div class="tranx-purchase-head">Token (T)</div>
                                <div class="tranx-purchase-des">
                                    <span>4,780.00</span>
                                    <span>(4780 * 1)</span>
                                </div>
                            </li><!-- li -->
                            <li>
                                <div class="tranx-purchase-head">Bonus Tokens (B)</div>
                                <div class="tranx-purchase-des">
                                    <span>956.00</span>
                                    <span>(956 * 1)</span>
                                </div>
                            </li><!-- li -->
                            <li>
                                <div class="tranx-purchase-head">Total Tokens</div>
                                <div class="tranx-purchase-des">
                                    <span>5,736.00</span>
                                    <span>(T+B)</span>
                                </div>
                            </li><!-- li -->
                        </ul><!-- .tranx-purchase-info -->
                        
                        <h6>Payment Deposit From <em class="ti ti-arrow-right"></em> <span>Ethereum Address</span></h6>
                        <div class="tranx-payment-info">
                            <em class="fab fa-ethereum"></em>
                            <input type="text" class="tranx-payment-address" value="0x4156d3342d5c385a87d264f90653733592000581" disabled>
                        </div><!-- .tranx-payment-info -->
                    </div><!-- .tranx-payment-details -->
                </div><!-- .tranx-popup -->
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->
    </div>
    <!-- Modal End -->
    
    
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
        console.log(incidencias)
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
                                <div class="tranx-purchase-des">${incidenciaAMostrar[1]}</div>
                            </li><!-- li -->
                            <li>
                                <div class="tranx-purchase-head">Date</div>
                                <div class="tranx-purchase-des">${incidenciaAMostrar[4]}</div>
                            </li><!-- li -->
                            <li>
                                <div class="tranx-purchase-head">Address</div>
                                <div class="tranx-purchase-des">${incidenciaAMostrar[5]}</div>
                            </li><!-- li -->
                            <li>
                                <div class="tranx-purchase-head">Phone Number</div>
                                <div class="tranx-purchase-des">${incidenciaAMostrar[10]}</div>
                            </li><!-- li -->
                            <li>
                                <div class="tranx-purchase-head">Amount</div>
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
<?php header('Location: /login/paneles/usuario/'); ?>
<?php elseif(empty($user) && $user['rango']==0): ?>
<?php header('Location: /'); ?>
<?php endif; ?>